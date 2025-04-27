@extends('layouts.app')

@section('title', 'Détails de l\'Adhérent')

@section('header', 'Détails de l\'Adhérent')

@section('content')
<div class="bg-gray-800 p-6 rounded-lg shadow-lg text-white">
    <h3 class="text-lg mb-4 font-semibold">Informations de l'Adhérent</h3>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div><strong>Nom:</strong> {{ $adherent->name }}</div>
        <div><strong>Date de Naissance:</strong> {{ \Carbon\Carbon::parse($adherent->date_naissance)->format('d/m/Y') }}</div>
        <div><strong>Adresse:</strong> {{ $adherent->adresse }}</div>
        <div><strong>Numéro de Téléphone:</strong> {{ $adherent->numero_telephone }}</div>
        <div><strong>Email:</strong> {{ $adherent->email }}</div>
        <div><strong>Date d'Inscription:</strong> {{ \Carbon\Carbon::parse($adherent->date_Inscription)->format('d/m/Y') }}</div>
        <div><strong>Statut d'Abonnement:</strong> {{ $adherent->statut_abonnement }}</div>
        <div><strong>État:</strong> 
            @if($adherent->is_activate)
                <span class="text-green-500">Actif</span>
            @else
                <span class="text-red-500">Inactif</span>
            @endif
        </div>
    </div>

    <div class="mt-6 flex space-x-4">
        <!-- Back Button -->
        <a href="{{ route('adherent.index') }}" class="px-4 py-2 bg-gray-600 hover:bg-gray-700 rounded-md">Retour</a>

        <!-- Activate/Deactivate Button -->
        @if(!$adherent->is_activate)
            <a href="{{ route('adherent.activate', $adherent) }}" class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 rounded-md">Activer</a>
        @else
            <a href="{{ route('adherent.ban', $adherent) }}" class="px-4 py-2 bg-gray-600 hover:bg-gray-700 rounded-md">Bannir</a>
        @endif

        <!-- Delete Button -->
        <form action="{{ route('adherent.destroy', $adherent) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet adhérent ?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-700 rounded-md">Supprimer</button>
        </form>
    </div>
</div>
@endsection
