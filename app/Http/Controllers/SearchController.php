<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Coach;
use App\Models\Machine;
use App\Models\Adherent;
use App\Models\Abonnement;
use App\Models\Speciality;
use App\Models\Entrainement;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function machines(Request $request)
    {
        $query = $request->input('query');
        $machines = Machine::where('name', 'LIKE', "%{$query}%")->get();

        return view('pages.admin.Machine.index', compact('machines', 'query'));
    }

    public function adherents(Request $request)
    {
        $query = $request->input('query');
        $adherents = User::whereHas('role', function ($query) {
            $query->where('name', 'adherent');
        })->where('name', 'LIKE', "%{$query}%")->get();

        return view('pages.admin.Adherent.index', compact('adherents', 'query'));
    }

    public function coaches(Request $request)
    {
        $query = $request->input('query');
        $specialities = Speciality::get();
        $coaches = User::whereHas('role', function ($query) {
            $query->where('name', 'coach');
        })->where('name', 'LIKE', "%{$query}%")->get();

        return view('pages.admin.Coach.index', compact('coaches', 'query','specialities'));
    }

    public function entrainements(Request $request)
    {
        $query = $request->input('query');
        $entrainements = Entrainement::whereHas('adherent', function ($q) use ($query) {
            $q->where('name', 'LIKE', "%{$query}%");
        })->get();

        return view('pages.admin.Entrainement.index', compact('entrainements', 'query'));
    }

    public function abonnements(Request $request)
    {
        $query = $request->input('query');
        $abonnements = Abonnement::where('type_Abonnement', 'LIKE', "%{$query}%")->get();

        return view('pages.admin.Abonnement.index', compact('abonnements', 'query'));
    }
}

