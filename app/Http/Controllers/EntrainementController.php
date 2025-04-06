<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Coach;
use App\Models\Machine;
use App\Models\Adherent;
use App\Models\Entrainement;
use Illuminate\Http\Request;
use App\Models\EntrainementJours;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreEnrainementRequest;

class EntrainementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function planning()
    {
        $user = Auth::user();
        $adherent = \App\Models\Adherent::where('email', $user->email)->first();

        if (!$adherent) {
            return view('pages.Planning.index', ['entrainements' => []]);
        }

        $entrainements = Entrainement::where('id_adherent', $adherent->id)
            ->with(['coach.speciality', 'jours.machine'])
            ->get();

        return view('pages.Planning.index', ['entrainements' => $entrainements]);
    }

    public function getEvents()
    {
        $user = Auth::user();
        $adherent = \App\Models\Adherent::where('email', $user->email)->first();

        if (!$adherent) {
            return response()->json([]);
        }

        $entrainements = Entrainement::where('id_adherent', $adherent->id)
            ->with(['coach.speciality', 'jours.machine'])
            ->get();

        $events = [];

        foreach ($entrainements as $entrainement) {
            foreach ($entrainement->jours as $jour) {
                $trainingDate = Carbon::parse($entrainement->date_debut)
                    ->addDays($jour->jour_numero - 1);
                    
                    $trainingDate = $trainingDate->setTimeFromTimeString($jour->heure);

                    $events[] = [
                        'title' => "{$entrainement->coach->speciality->name}",
                        'start' => $trainingDate->toDateTimeString(),
                        'color' => '#1D4ED8',
                        'extendedProps' => [ 
                            'programme' => $entrainement->coach->speciality->name,
                            'coach' => $entrainement->coach->name,
                        ]
                    ];    
            }
        }

        return response()->json($events);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $adherents = Adherent::get(); 
        $machines = Machine::get();
        return view('pages/Entrainement.create', compact('adherents','machines'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEnrainementRequest $request)
    {
    
        $coach= Coach::where('email',Auth::user()->email)->first();

        $entrainement = Entrainement::create(array_merge($request->validated(), ['id_coach' => $coach->id]));

        foreach ($request->jours as $day => $data) {
            EntrainementJours::create([
                'id_entrainement' => $entrainement->id,
                'jour_numero' => $day,
                'exercices' => $data['exercices'], 
                'id_machine' => $data['id_machine'], 
                'heure' => $data['heure'],
            ]);
        }
        

        return redirect()->route('entrainement.create')->with('success', 'Entraînement ajouté avec succès!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
