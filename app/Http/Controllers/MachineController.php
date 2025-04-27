<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Models\Abonnement;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMachineRequest;
use App\Http\Requests\UpdateMachineRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class MachineController extends Controller
{
    use AuthorizesRequests;
    
    public function index(Request $request)
    {
        $this->authorize('viewAny', Machine::class);

        $machines = Machine::paginate(10);
        return view('pages.admin.Machine.index', compact('machines'));
    }

    public function create()
    {
        $this->authorize('create', Machine::class);

        return view('pages.admin.Machine.create');
    }

    public function store(StoreMachineRequest $request)
    {
        $this->authorize('create', Machine::class);

        Machine::create($request->validated());

        return redirect()->route('machine.index')->with('status', 'Machine added successfully');
    }

    public function show(Machine $machine)
    {
        $this->authorize('viewAny', Machine::class);

        return view('pages.admin.Machine.show', compact('machine'));
    }

    public function edit(Machine $machine)
    {
        $this->authorize('update', Machine::class);

        return view('pages.admin.Machine.edit', compact('machine'));
    }

    public function update(UpdateMachineRequest $request, Machine $machine)
    {
        $this->authorize('update', Machine::class);

        $machine->update($request->validated());

        return redirect()->route('machine.index')->with('status', 'Machine updated successfully');
    }

    public function destroy(Machine $machine)
    {
        $this->authorize('delete', Machine::class);

        $machine->delete();

        return redirect()->route('machine.index')->with('status', 'Machine deleted successfully');
    }

    public function filter(Request $request)
    {
        $filter = $request->input('filter');
    
        if($filter){
            $machines = Machine::where('statut', $filter)->get();
        
        }else{
            $machines = Machine::get();
        }    
    
        return view('partials.machines', compact('machines'))->render();
    }    

}
