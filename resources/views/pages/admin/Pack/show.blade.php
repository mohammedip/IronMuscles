@extends('layouts.app')

@section('title', 'Détails de la pack')

@section('header', 'Détails de la pack')

@section('content')
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-white mb-4">{{ $pack->name }}</h2>

        <div class="mb-4">
            <label class="block text-gray-400">Type de pack :</label>
            <p class="text-white">{{ $pack->type_pack }}</p>
        </div>

        <div class="mb-4">
            <label class="block text-gray-400">Statut :</label>
            <p class="text-white">
                @if ($pack->statut == 'Disponible')
                    <span class="text-green-400">Disponible</span>
                @elseif ($pack->statut == 'Occupee')
                    <span class="text-yellow-400">Occupée</span>
                @else
                    <span class="text-red-400">En Maintenance</span>
                @endif
            </p>
        </div>

        <div class="flex space-x-4">
            {{-- <a href="{{ route('pack.edit', $pack) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Modifier</a> --}}
            {{-- <form action="{{ route('pack.destroy', $pack) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Supprimer</button>
            </form> --}}
        </div>

        <a href="{{ route('pack.index') }}" class="block mt-6 text-blue-400 hover:underline">Retour à la liste</a>
    </div>
@endsection
