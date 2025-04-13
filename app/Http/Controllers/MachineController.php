<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMachineRequest;
use App\Http\Requests\UpdateMachineRequest;

class MachineController extends Controller
{
    public function index()
    {
        $machines = Machine::get();
        return view('pages.Machine.index', compact('machines'));
    }

    public function create()
    {
        return view('pages.Machine.create');
    }

    public function store(StoreMachineRequest $request)
    {

        Machine::create($request->validated());

        return redirect()->route('machine.index')->with('success', 'Machine added successfully');
    }

    public function show(Machine $machine)
    {
        return view('pages.Machine.show', compact('machine'));
    }

    public function edit(Machine $machine)
    {
        return view('pages.Machine.edit', compact('machine'));
    }

    public function update(UpdateMachineRequest $request, Machine $machine)
    {

        $machine->update($request->validated());

        return redirect()->route('machine.index')->with('success', 'Machine updated successfully');
    }

    public function destroy(Machine $machine)
    {
        $machine->delete();

        return redirect()->route('machine.index')->with('success', 'Machine deleted successfully');
    }
}
