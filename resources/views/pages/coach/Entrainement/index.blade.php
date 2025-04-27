@extends('layouts.app')

@section('title', 'Mes Entraînements')

@section('content')
<div class="max-w-5xl mx-auto bg-gray-900 p-8 rounded-xl shadow-lg">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-2xl font-semibold text-white">Liste des Entraînements</h2>
        @include('components.searchInput')
        <a href="{{ route('entrainement.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md transition">
            + Créer un Entraînement
        </a>
    </div>    

    @if (session('success'))
        <div class="bg-green-500 text-white p-3 rounded-md mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full table-auto text-white">
        <thead>
            <tr class="bg-gray-800">
                <th class="p-3 text-left">Adhérent</th>
                <th class="p-3 text-left">Date Début</th>
                <th class="p-3 text-left">Jours</th>
                <th class="p-3 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($entrainements as $entrainement)
                <tr class="border-t border-gray-700">
                    <td class="p-3">{{ $entrainement->adherent->name }}</td>
                    <td class="p-3">{{ $entrainement->date_debut }}</td>
                    <td class="p-3 ">{{ $entrainement->jours_count }} jours</td>
                    <td class="p-3">
                        <a href="{{ route('entrainement.edit', $entrainement->id) }}" class="text-blue-400 hover:underline">Modifier</a>
                        <form action="{{ route('entrainement.destroy', $entrainement->id) }}" method="POST" class="inline-block ml-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Confirmer la suppression ?')" class="text-red-400 hover:underline">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
