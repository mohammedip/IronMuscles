<?php

namespace App\Http\Controllers;

use App\Models\Adherent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashbordController extends Controller
{
    public function index()
    {

        $adhesionsParMois = Adherent::select(DB::raw('MONTH(date_Inscription) as month'), DB::raw('COUNT(*) as count'))
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->toArray();


            $mois = array_fill(1, 12, 0);
        foreach ($adhesionsParMois as $moisNum => $count) {
            $mois[$moisNum] = $count;
        }


        $subscriptionStats = Adherent::select('statut_abonnement', DB::raw('COUNT(*) as count'))
            ->groupBy('statut_abonnement')
            ->pluck('count', 'statut_abonnement')
            ->toArray();


            $adherents = Adherent::latest()->take(3)->get();

        return view('dashbord', compact('mois', 'subscriptionStats', 'adherents'));
    }
}
