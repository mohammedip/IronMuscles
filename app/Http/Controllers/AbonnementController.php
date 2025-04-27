<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use Stripe\Stripe;
use App\Models\User;
use App\Models\Payment;
use App\Models\Abonnement;
use App\Models\Entrainement;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\Log;
use Srmklive\PayPal\Facades\PayPal;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateAbonnementRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AbonnementController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        
        $user = Auth::user();

        if ($user->role->name == "admin") {
            $abonnements = Abonnement::with('adherent')->orderBy('date_Debut', 'desc')->paginate(10);
            return view('pages.admin.Abonnement.index', compact('abonnements'));
        }


        if ($user->role->name != "adherent") {
            return redirect()->route('home')->with('error', 'Vous n\'avez pas d\'abonnement enregistré.');
        }

        $abonnements = Abonnement::where('id_adherent', $user->id)
            ->orderBy('date_Debut', 'desc')
            ->get();

        $latestAbonnement = $abonnements->first();

        $payment=null;
        if($latestAbonnement){

            $payment = Payment::where('abonnement_id', $latestAbonnement->id)->first();
        }

        $abonnementStatus = ($latestAbonnement && $latestAbonnement->date_Fin > now()) ? 'Actif' : 'Expiré';

        return view('pages.adherent.Abonnement.index', compact('abonnements', 'latestAbonnement', 'abonnementStatus','payment'));
    }

    public function edit(Abonnement $abonnement){
        $this->authorize('update', Abonnement::class);
        return view('pages.admin.Abonnement.edit', compact('abonnement'));
    }

    public function update(UpdateAbonnementRequest $request, Abonnement $abonnement)
    {
        $this->authorize('update', Abonnement::class);
        $request->validated();

        $abonnement->update([
            'type_Abonnement' => $request->type_Abonnement,
            'prix' => $request->prix,
            'date_Debut' => $request->date_Debut,
            'date_Fin' => $request->date_Fin,
        ]);
        $payment = Payment::where('abonnement_id',$abonnement->id)->first();

        $payment->update(['amount' => $request->prix]);

        return redirect()->route('abonnement.index')->with('status', 'Abonnement mis à jour avec succès.');
    }


    public function destroy(Abonnement $abonnement){

        $this->authorize('delete', Abonnement::class);

        $abonnement->delete();
        $adherent = User::where('id',$abonnement->id_adherent)->first();
        $adherent->update(['statut_abonnement' => 'Inactif']);
        $entrainement = Entrainement::where('id_adherent',$abonnement->id_adherent)->first();
        if($entrainement){

            $entrainement->delete();
        }


        return redirect()->route('abonnement.index')->with('status', 'Abonnement deleted.');

    }


    public function showPaymentForm(Request $request)
    {
        $user = Auth::user();

        if ($user->role->name != "adherent") {
            return redirect()->route('home')->with('error', 'Vous devez etre un adherent pour afectuer une abonnement.');
        }

        $abonnement = Abonnement::where('id_adherent', $user->id)
            ->where('date_Fin', '>', Carbon::now())
            ->first();

        if($abonnement){
            return redirect()->route('home')->with('status', 'Vous etes deja abonnée.');

        }    


        $validated = $request->validate([
            'type_Abonnement' => 'required|in:Mensuel,Trimestriel,Semi-annuel,Annuel',
        ]);
    
        $prices = [
            'Mensuel' => 150.00,
            'Trimestriel' => 400.00,
            'Semi-annuel' => 800.00,
            'Annuel' => 1500.00,
        ];
    
        $type = $validated['type_Abonnement'];
        $price = $prices[$type];
    
        return view('pages/adherent/Abonnement.payment', compact('type', 'price'));
    }

    public function processPayment(Request $request)
    {
    
        $user = Auth::user();
    
        $prices = [
            'Mensuel' => 150.00,
            'Trimestriel' => 400.00,
            'Semi-annuel' => 800.00,
            'Annuel' => 1500.00,
        ];
    
        $durations = [
            'Mensuel' => '+1 month',
            'Trimestriel' => '+3 months',
            'Semi-annuel' => '+6 months',
            'Annuel' => '+1 year',
        ];
    
        $price = $prices[$request->type_Abonnement];
        $startDate = now();
        $endDate = now()->modify($durations[$request->type_Abonnement]);
    
        return $this->createStripePayment($price, $request->type_Abonnement, $user->id, $startDate, $endDate);
    }
    
    
    public function createStripePayment($price, $type, $adherentId, $startDate, $endDate)
    {
        Stripe::setApiKey(config('services.stripe.secret'));
    
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'mad',
                    'product_data' => [
                        'name' => "Abonnement: " . $type,
                    ],
                    'unit_amount' => $price * 100, 
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'metadata' => [  
                'price' => $price,
                'type' => $type,
                'adherent_id' => $adherentId,
                'start_date' => $startDate->toDateString(),
                'end_date' => $endDate->toDateString(),
            ],
            'success_url' => route('payment.success') . '?session_id={CHECKOUT_SESSION_ID}', // Pass session ID
            'cancel_url' => route('abonnement.index'),
        ]);
    
        return redirect($session->url);
    }

    public function paymentSuccess(Request $request)
    {
        $sessionId = $request->query('session_id'); 
    
        if (!$sessionId) {
            return redirect()->route('abonnement.index');
        }
    
        Stripe::setApiKey(config('services.stripe.secret'));
    
        try {
            $session = \Stripe\Checkout\Session::retrieve($sessionId);
            
            
            
            if ($session->payment_status === 'paid') {

                $metadata = $session->metadata;

                
                    $abonnement = Abonnement::create([
                        'type_Abonnement' => $metadata->type,
                        'date_Debut' => $metadata->start_date,
                        'date_Fin' => $metadata->end_date,
                        'prix' => $metadata->price,
                        'id_adherent' => $metadata->adherent_id,
                    ]);
               

                $adherent=User::where('id',$metadata->adherent_id);

                $adherent->update(['statut_abonnement'=> 'Actif']);
                
                Payment::create([
                    'abonnement_id' => $abonnement->id,
                    'amount' => $metadata->price,
                    'payment_method' => 'Stripe',
                    'status' => 'Completed',
                ]);
    
                return redirect()->route('abonnement.success')->with('status', 'Paiement réussi!');
            }
        } catch (\Exception $e) {
            Log::error('Stripe Payment Error: ' . $e->getMessage());
            return redirect()->route('abonnement.index')->with('error', 'Une erreur est survenue.');
        }
    
        return redirect()->route('abonnement.index')->with('error', 'Paiement non approuvé.');
    }
    


    // public function paymentCancel()
    // {
    //     return redirect()->route('abonnement.index');
    // }


    public function success()
    {
        return view('pages/adherent/Abonnement.success');
    }

    public function filter(Request $request){

        $filter = $request->input('filter');
    
        if($filter){
            $abonnements = Abonnement::where('type_Abonnement', $filter)->get();
        }else{
            $abonnements = Abonnement::get();
        }
            return view('partials.abonnements', compact('abonnements'))->render();
    }  

}

