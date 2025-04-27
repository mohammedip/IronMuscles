@extends('layouts.app')

@section('title', 'Abonnements')

@section('header', 'Liste des Abonnements')

@section('content')
@if (session('success'))
    <div class="bg-green-500 text-white p-3 mb-4 rounded-md">
        {{ session('success') }}
    </div>
@endif

<!-- Abonnements Table -->
<div class="bg-gray-800 p-6 rounded-lg shadow-lg mb-6">
    <div class="flex justify-between mb-4">
        <h3 class="text-lg mb-4 font-semibold text-white">Liste des Abonnements</h3>
        @include('components.searchInput', ['action' => route('abonnements.search')])
        <select 
        class="table-filter bg-gray-700 text-white border border-gray-600 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition" 
        id="abonnement-filter" data-endpoint="{{ route('abonnements.filter') }}" name="filter"
        data-target="#abonnement-table-body"
    >            <option value="">All</option>
            <option value="Mensuel">Mensuel</option>
            <option value="Trimestriel">Trimestriel</option>
            <option value="Semi-annuel">Semi-annuel</option>
            <option value="Annuel">Annuel</option>
        </select>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-gray-800 text-white border-collapse">
            <thead>
                <tr class="bg-gray-700">
                    <th class="p-3 text-left border border-gray-600">Adhérent</th>
                    <th class="p-3 text-left border border-gray-600">Type d'Abonnement</th>
                    <th class="p-3 text-left border border-gray-600">Date de Début</th>
                    <th class="p-3 text-left border border-gray-600">Date de Fin</th>
                    <th class="p-3 text-left border border-gray-600">Prix</th>
                    <th class="p-3 text-center border border-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody id="abonnement-table-body">
                @forelse($abonnements as $abonnement)
                <tr>
                    <td class="p-3 border border-gray-600">{{ $abonnement->adherent->name ?? 'Inconnu' }}</td>
                    <td class="p-3 border border-gray-600">{{ $abonnement->type_Abonnement }}</td>
                    <td class="p-3 border border-gray-600">{{ $abonnement->getFormattedStartDate() }}</td>
                    <td class="p-3 border border-gray-600">{{ $abonnement->getFormattedEndDate() }}</td>
                    <td class="p-3 border border-gray-600">{{ $abonnement->prix }}€</td>
                    <td class="p-3 text-center border border-gray-600">
                        
                        <a href="{{ route('abonnement.edit', $abonnement) }}" 
                           class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-md">Modifier</a>

                        <form action="{{ route('abonnement.destroy', $abonnement) }}" method="POST" 
                              class="inline-block" onsubmit="return confirm('Confirmer la suppression ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-md">Supprimer</button>
                        </form>
                    </td>
                </tr>
                
                @empty
                <tr>
                    <td colspan="6" class="text-center text-gray-400 p-4">Aucun abonnement trouvé.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{ $abonnements->links() }}
    </div>
</div>

@endsection
