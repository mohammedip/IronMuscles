<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use Stripe\Stripe;
use App\Models\Payment;
use App\Models\Adherent;
use App\Models\Abonnement;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\Log;
use Srmklive\PayPal\Facades\PayPal;
use Illuminate\Support\Facades\Auth;


class AbonnementController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        $adherent = Adherent::where('email', $user->email)->first();

        if (!$adherent) {
            return redirect()->route('home')->with('error', 'Vous n\'avez pas d\'abonnement enregistré.');
        }

        $abonnements = Abonnement::where('id_adherent', $adherent->id)
            ->orderBy('date_Debut', 'desc')
            ->get();

        $latestAbonnement = $abonnements->first();

        $payment=null;
        if($latestAbonnement){

            $payment = Payment::where('abonnement_id', $latestAbonnement->id)->first();
        }

        $abonnementStatus = ($latestAbonnement && $latestAbonnement->date_Fin > now()) ? 'Actif' : 'Expiré';

        return view('pages.Abonnement.index', compact('abonnements', 'latestAbonnement', 'abonnementStatus','payment'));
    }


    public function showPaymentForm(Request $request)
    {
        $user = Auth::user();

        $adherent = Adherent::where('email', $user->email)->first();

        if (!$adherent) {
            return redirect()->route('home')->with('error', 'Vous devez etre un adherent pour afectuer une abonnement.');
        }

        $abonnement = Abonnement::where('id_adherent', $adherent->id)
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
    
        return view('pages/Abonnement.payment', compact('type', 'price'));
    }

    public function processPayment(Request $request)
    {
        $validated = $request->validate([
            'type_Abonnement' => 'required|in:Mensuel,Trimestriel,Semi-annuel,Annuel',
        ]);
    
        $adherent = Adherent::where('email', Auth::user()->email)->first();
    
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
    
        $price = $prices[$validated['type_Abonnement']];
        $startDate = now();
        $endDate = now()->modify($durations[$validated['type_Abonnement']]);
    
        return $this->createStripePayment($price, $validated['type_Abonnement'], $adherent->id, $startDate, $endDate);
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

                $adherent=Adherent::where('id',$metadata->adherent_id);

                $adherent->update(['statut_abonnement'=> 'Actif']);
                
                Payment::create([
                    'abonnement_id' => $abonnement->id,
                    'amount' => $metadata->price,
                    'payment_method' => 'Stripe',
                    'status' => 'Completed',
                ]);
    
                return redirect()->route('abonnement.success')->with('success', 'Paiement réussi!');
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
        return view('pages/Abonnement.success');
    }
}

