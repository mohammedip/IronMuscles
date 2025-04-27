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
        $abonnement = null;
        $abonnementStatus = null;
        $adherentEntrainement = null;
        $coachEntrainement = null;
        $nextTrainingDate = 'Aucun entraînement prévu';
    
        // Check if user has role adherent
        if ($user->role && $user->role->name === 'adherent') {
            $abonnement = Abonnement::where('id_adherent', $user->id)
                ->orderBy('date_Debut', 'desc')
                ->first();
    
            $abonnementStatus = ($abonnement && $abonnement->date_Fin <= now()) ? 'Expiré' : 'Actif';
    
            $adherentEntrainement = Entrainement::where('id_adherent', $user->id)
                ->with('coach.speciality', 'jours')
                ->orderBy('date_Debut', 'desc')
                ->first();
    
            if ($adherentEntrainement) {
                $dateDebut = Carbon::parse($adherentEntrainement->date_debut);
                $jours = $adherentEntrainement->jours;
                $closestDate = null;
    
                foreach ($jours as $jour) {
                    $trainingDate = $dateDebut->copy()->addDays($jour->jour_numero - 1);
    
                    if ($trainingDate >= now()) {
                        if (!$closestDate || $trainingDate < $closestDate) {
                            $closestDate = $trainingDate;
                        }
                    }
                }
    
                $nextTrainingDate = $closestDate
                    ? $closestDate->format('l d M Y')
                    : "Non entraînement prévu !";
            }
        }
    
        return view('pages.profile.index', [
            'user' => $user,
            'abonnement' => $abonnement,
            'abonnementStatus' => $abonnementStatus,
            'adherentEntrainement' => $adherentEntrainement,
            'coachEntrainement' => $coachEntrainement,
            'nextTrainingDay' => $nextTrainingDate,
        ]);
    }  


    public function edit()
    {
        $user = Auth::user();

        $specialties = Speciality::get();

        return view('pages.profile.edit', [
            'user' => $user,
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

        $user->update($data);

        return redirect()->route('profil.index')->with('status', 'Profil mis à jour avec succès');
    }


    public function downloadBadge()
    {
        $user = Auth::user();
    
        if(empty($use->img)){

            $imagePath = public_path('images/profile-picture.jpg'); 

        }else{
            $imagePath = public_path('storage/'.$user->img); 
            
        }
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
