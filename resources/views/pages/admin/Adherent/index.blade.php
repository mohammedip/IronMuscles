@extends('layouts.app')

@section('title', 'Adhérents')

@section('header', 'Liste des Adhérents')

@section('content')
@if (session('success'))
    <div class="bg-green-500 text-white p-3 mb-4 rounded-md">
        {{ session('success') }}
    </div>
@endif

<!-- Members Table -->
<div class="bg-gray-800 p-6 rounded-lg shadow-lg mb-6">
    <div class="flex justify-between mb-4">
        <h3 class="text-lg mb-4 font-semibold">Liste des Adhérents</h3>
        @include('components.searchInput', ['action' => route('adherents.search')])
        <select 
        class="table-filter bg-gray-700 text-white border border-gray-600 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition" 
        id="adherent-filter" data-endpoint="{{ route('adherents.filter') }}" name="filter"
        data-target="#adherent-table-body"
    >            <option value="">All</option>
            <option value="Actif">Actif</option>
            <option value="Inactif">Inactif</option>
            <option value="Expiré">Expiré</option>
        </select>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-gray-800 text-white border-collapse">
            <thead>
                <tr class="bg-gray-700">
                    <th class="p-3 text-left border border-gray-600">Nom</th>
                    <th class="p-3 text-left border border-gray-600">Email</th>
                    <th class="p-3 text-left border border-gray-600">Abonnement</th>
                    <th class="p-3 text-left border border-gray-600">Date d'adhésion</th>
                    <th class="p-3 text-center border border-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody id="adherent-table-body">
                @forelse($adherents as $adherent)
                <tr>
                    <td class="p-3 border border-gray-600">{{ $adherent->name }}</td>
                    <td class="p-3 border border-gray-600">{{ $adherent->email }}</td>
                    <td class="p-3 border border-gray-600">{{ $adherent->statut_abonnement }}</td>
                    <td class="p-3 border border-gray-600">{{ \Carbon\Carbon::parse($adherent->date_Inscription)->format('d/m/Y') }}</td>
                    <td class="p-3 text-center border border-gray-600">
                        <a href="{{ route('adherent.show', $adherent) }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md">Voir</a>
                        
                        @if(!$adherent->is_activate)
                            <a href="{{ route('adherent.activate', $adherent) }}" class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-md">Activer</a>
                        @else
                        
                        <a href="{{ route('adherent.ban', $adherent) }}" class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-md">Bannir</a>
                         @endif
                        <form action="{{ route('adherent.destroy', $adherent) }}" method="POST" class="inline-block" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet adhérent ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-md">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-gray-400 p-4">Aucun adherent trouvé.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $adherents->links() }}
    </div>
</div>
@endsection
