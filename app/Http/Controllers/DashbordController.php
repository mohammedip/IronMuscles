<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Machine;
use App\Models\Payment;
use App\Models\Adherent;
use App\Models\Abonnement;
use Illuminate\Http\Request;
use App\Models\EntrainementJours;
use App\Policies\DashboardPolicy;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DashbordController extends Controller
{
    use AuthorizesRequests;
    
    public function index()
    {
        $adherent = Auth::user();

        if ($adherent->role->name != "admin") {
            return redirect()->back()->with('error', 'You do not have permission to perform this action.');
        }

        $adhesionsParMois = User::whereHas('role', function ($query) {
            $query->where('name', 'adherent');
        })->select(DB::raw('MONTH(date_Inscription) as month'), DB::raw('COUNT(*) as count'))
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->toArray();


            $mois = array_fill(1, 12, 0);
        foreach ($adhesionsParMois as $moisNum => $count) {
            $mois[$moisNum] = $count;
        }


        $subscriptionStats = User::whereHas('role', function ($query) {
            $query->where('name', 'adherent');
        })->select('statut_abonnement', DB::raw('COUNT(*) as count'))
            ->groupBy('statut_abonnement')
            ->pluck('count', 'statut_abonnement')
            ->toArray();


            $adherents = User::whereHas('role', function ($query) {
                $query->where('name', 'adherent');
            })->latest()->take(3)->get();
            $adherentCount = User::whereHas('role', function ($query) {
                $query->where('name', 'adherent');
            })->count();
            $activeAbonnementsCount = Abonnement::where('date_Fin', '>',Carbon::now())->count();
            $en_maintenance_machine = Machine::where('statut', 'En-maintenance')->count();
            $totalAmount = Payment::where('status', 'Completed')
    ->whereMonth('created_at', Carbon::now()->month)
    ->whereYear('created_at', Carbon::now()->year)
    ->sum('amount');

    $today = Carbon::today();

    $totalTodayTraining = EntrainementJours::whereRaw('LOWER(exercices) != ?', ['rest'])
        ->whereHas('entrainement', function ($query) use ($today) {
            $query->whereRaw('DATE_ADD(date_debut, INTERVAL (jour_numero - 1) DAY) = ?', [$today->toDateString()]);
        })
        ->count();

        return view('pages.admin.dashbord', compact('mois', 'subscriptionStats', 'adherents','adherentCount',
        'activeAbonnementsCount','en_maintenance_machine','totalAmount','totalTodayTraining'));
    }
}
