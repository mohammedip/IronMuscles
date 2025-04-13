<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Coach;
use App\Models\Adherent;
use PDF;
use App\Models\Abonnement;
use App\Models\Speciality;
use App\Models\Entrainement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateProfileRequest;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $adherent = Adherent::where('email', $user->email)->first();
        if ($adherent) {
            $abonnement = Abonnement::where('id_adherent', $adherent->id)
                ->orderBy('date_Debut', 'desc')
                ->first();

            $abonnementStatus = ($abonnement && $abonnement->date_Fin <= now()) ? 'Expiré' : 'Actif';

            $entrainement = Entrainement::where('id_adherent', $adherent->id)->with('coach.speciality', 'jours')->orderBy('date_Debut', 'desc')
            ->first();

            $nextTrainingDate ='Aucun entraînement prévu';
            if ($entrainement) {
                $dateDebut = Carbon::parse($entrainement->date_debut);
                $jours = $entrainement->jours; 
            
                $closestDay = null;
                $closestDate = null;
                $currentDate = Carbon::now(); 
            
                foreach ($jours as $jour) {
                    $trainingDate = $dateDebut->copy()->addDays($jour->jour_numero-1);
            
                    if ($trainingDate >= $currentDate) {
                        if (!$closestDate || $trainingDate < $closestDate) {
                            $closestDate = $trainingDate;
                            $closestDay = $jour;
                        }
                    }
                }
                if($closestDate){

                    $nextTrainingDate =$closestDate->format('l d M Y');
                }else{
                    $nextTrainingDate = "Non entrainement prevus !";
                }

                
            }
            

            return view('pages.profile.index', [
                'user' => $user,
                'adherent' => $adherent,
                'abonnement' => $abonnement,
                'abonnementStatus' => $abonnementStatus,
                'entrainement' => $entrainement, 
                'nextTrainingDay' => $nextTrainingDate,
            ]);
        }

        $coach = Coach::where('email', $user->email)->first();
        if ($coach) {
            $entrainement = Entrainement::where('id_coach', $coach->id)->get();

            return view('pages.profile.index', [
                'user' => $user,
                'coach' => $coach,
                'entrainement' => $entrainement,
            ]);
        }

        return view('pages.profile.index', [
            'user' => $user,
        ]);
    }


    public function edit()
    {
        $user = Auth::user();

        $adherent = Adherent::where('email', $user->email)->first();
        $coach = Coach::where('email', $user->email)->first();

        $specialties = Speciality::get();

        return view('pages.profile.edit', [
            'user' => $user,
            'adherent' => $adherent,
            'coach' => $coach,
            'specialties' => $specialties, 
        ]);
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = Auth::user();
        $data = $request->validated();
    
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']); 
        }

        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->store('profiles', 'public');
            $data['img'] = $imagePath;
        }
    
        if ($adherent = Adherent::where('email', $user->email)->first()) {
            $adherent->update($data);
        }
    
        if ($coach = Coach::where('email', $user->email)->first()) {
            $coach->update($data);
        }

        $user->update($data);

        return redirect()->route('profil.index')->with('status', 'Profil mis à jour avec succès');
    }


    public function downloadBadge()
    {
        $user = Auth::user();
    
        $imagePath = public_path('storage/'.$user->img); 
        $imageData = base64_encode(file_get_contents($imagePath));
        $imageType = pathinfo($imagePath, PATHINFO_EXTENSION);
        $imageSrc = 'data:image/' . $imageType . ';base64,' . $imageData;
    
        $data = [
            'id' => $user->id,
            'name' => $user->name,
            'role' => $user->role->name,
            'photo' => $imageSrc,
        ];
    
        $pdf = PDF::loadView('pages.Profile.pdf', $data);
        return $pdf->download('badge-' . $user->name . '.pdf');
    }
    
    
    
}
