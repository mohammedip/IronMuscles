<?php

namespace App\Http\Controllers;

use App\Models\Adherent;
use Illuminate\Http\Request;

class AdherentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adherents = Adherent::get(); 
        return view('pages.Adherent.index', compact('adherents'));
    }

    public function show(Adherent $adherent)
    {
        return view('pages.Adherent.show', compact('adherent'));
    }


    public function activate(Adherent $adherent)
    {
        $adherent->update(['is_activate' => 1]);
    
        return redirect()->back()->with('status', 'Utilisateur activé avec succès.');
    }
    
    public function ban(Adherent $adherent)
    {
        $adherent->update(['is_activate' => 0]);
    
        return redirect()->back()->with('status', 'Utilisateur banni avec succès.');
    }

    public function destroy(Adherent $adherent)
    {
        $adherent->delete(); 

        return redirect()->route('adherent.index')->with('status', 'Adhérent supprimé avec succès.');
    }
    
}
