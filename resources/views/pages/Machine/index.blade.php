@extends('layouts.app')

@section('title', 'Machines')

@section('header', 'Machines')

@section('content')

@if (session('success'))
        <div class="bg-green-500 text-white p-3 mb-4 rounded-md">
            {{ session('success') }}
        </div>
    @endif
    <div class="flex justify-between mb-4">
        <h2 class="text-2xl font-bold">Liste des Machines</h2>
        <a href="{{ route('machine.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Ajouter une Machine</a>
    </div>

    <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
        <table class="w-full border-collapse border border-gray-700">
            <thead>
                <tr class="bg-gray-700">
                    <th class="p-3 text-left text-sm text-white">Nom</th>
                    <th class="p-3 text-left text-sm text-white">Type</th>
                    <th class="p-3 text-left text-sm text-white">Statut</th>
                    <th class="p-3 text-left text-sm text-white">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($machines as $machine)
                    <tr>
                        <td class="p-3 border border-gray-600">{{ $machine->name }}</td>
                        <td class="p-3 border border-gray-600">{{ $machine->type_machine }}</td>
                        <td class="p-3 border border-gray-600">{{ $machine->statut }}</td>
                        <td class="p-3 border border-gray-600">
                            <a href="{{ route('machine.edit', $machine->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600">Modifier</a>
                            <form action="{{ route('machine.destroy', $machine) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600">Supprimer</button>
                            </form>
                            <a href="{{ route('machine.show', $machine) }}" class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600">Show</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-gray-400 p-4">Aucune machine trouvé.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
