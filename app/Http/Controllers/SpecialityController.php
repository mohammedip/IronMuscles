<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Speciality;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SpecialityController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Speciality::class);

        $specialities = Speciality::paginate(10);
        return view('pages/admin/Specialite.index', compact('specialities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Speciality::class);
        return view('pages/admin/Specialite.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $this->authorize('create', Speciality::class);
        Speciality::create( $request->validate([
            'name' => 'required|string|max:255|unique:specialities,name',
        ]));

        return redirect()->route('speciality.index')->with('status', 'Speciality created statusfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Speciality $speciality)
    {
        $this->authorize('viewAny', Speciality::class);
        return view('pages/admin/Specialite.show', compact('speciality'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Speciality $speciality)
    {
        $this->authorize('update', Speciality::class);
        return view('pages/admin/Specialite.edit', compact('speciality'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Speciality $speciality)
    {
        $this->authorize('update', Speciality::class);
        $speciality->update($request->validate([
            'name' => 'sometimes|string|max:255|unique:specialities,name,',
        ]));

        return redirect()->route('speciality.index')->with('status', 'Speciality updated statusfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Speciality $speciality)
    {
        $this->authorize('delete', Speciality::class);
        $speciality->delete();

        return redirect()->route('speciality.index')->with('status', 'Speciality deleted statusfully.');
    }
}
