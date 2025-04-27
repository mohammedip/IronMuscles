<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AdherentController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', User::class);
        $adherents = User::whereHas('role', function ($query) {
            $query->where('name', 'adherent');
        })->paginate(10); 
        return view('pages.admin.Adherent.index', compact('adherents'));
    }

    public function show(User $adherent)
    {
        return view('pages.admin.Adherent.show', compact('adherent'));
    }


    public function activate(User $adherent)
    {
        $adherent->update(['is_activate' => 1]);
    
        return redirect()->back()->with('status', 'Utilisateur activé avec succès.');
    }
    
    public function ban(User $adherent)
    {
        $adherent->update(['is_activate' => 0]);
    
        return redirect()->back()->with('status', 'Utilisateur banni avec succès.');
    }

    public function destroy(User $adherent)
    {
        $this->authorize('delete', User::class);
        $adherent->delete(); 

        return redirect()->route('adherent.index')->with('status', 'Adhérent supprimé avec succès.');
    }

    public function filter(Request $request)
    {
        $filter = $request->input('filter');

        if($filter){
            $adherents = User::whereHas('role', function ($query) {
                $query->where('name', 'adherent');
            })->where('statut_abonnement', $filter)->get();

        }else{
            $adherents = User::whereHas('role', function ($query) {
                $query->where('name', 'adherent');
            })->get();
        }

        return view('partials.adherents', compact('adherents'))->render();
    }
    
}
