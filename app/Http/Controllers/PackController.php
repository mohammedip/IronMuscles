<?php

namespace App\Http\Controllers;

use App\Models\Pack;
use Illuminate\Http\Request;

class PackController extends Controller
{
    public function index(Request $request)
    {
        // $this->authorize('viewAny', Pack::class);

        $packs = Pack::paginate(10);
        // return view('pages.admin.Pack.index', compact('Packs'));
    }

    public function create()
    {
        // $this->authorize('create', Pack::class);

        // return view('pages.admin.Pack.create');
    }

    public function store(Request $request)
    {
        // $this->authorize('create', Pack::class);

        Pack::create($request->validated());

        // return redirect()->route('Pack.index')->with('status', 'Pack added successfully');
    }

    public function show(Pack $pack)
    {
        // $this->authorize('viewAny', Pack::class);

        // return view('pages.admin.Pack.show', compact('Pack'));
    }

    public function edit(Pack $pack)
    {
        // $this->authorize('update', Pack::class);

        // return view('pages.admin.Pack.edit', compact('Pack'));
    }

    public function update(Request $request, Pack $pack)
    {
        // $this->authorize('update', Pack::class);

        $pack->update($request->validated());

        // return redirect()->route('Pack.index')->with('status', 'Pack updated successfully');
    }

    public function destroy(Pack $pack)
    {
        // $this->authorize('delete', Pack::class);

        $pack->delete();

        // return redirect()->route('Pack.index')->with('status', 'Pack deleted successfully');
    }
}
