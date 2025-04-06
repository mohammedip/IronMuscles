<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Coach;
use App\Models\Adherent;
use App\Models\Abonnement;
use App\Models\Speciality;
use App\Models\Entrainement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateProfileRequest;

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
            
                $nextTrainingDate =$closestDate->format('l d M Y');
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
    
        $user->update($data);
    
        if ($adherent = Adherent::where('email', $user->email)->first()) {
            $adherent->update($data);
        }
    
        if ($coach = Coach::where('email', $user->email)->first()) {
            $coach->update($data);
        }
    
        return redirect()->route('profil.index')->with('success', 'Profil mis à jour avec succès');
    }
    
}
