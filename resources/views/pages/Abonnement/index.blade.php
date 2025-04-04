@extends('layouts.app')

@section('title', 'Mes Abonnements')

@section('header', 'Mes Abonnements')

@section('content')

@if($latestAbonnement)
<!-- Subscription Information Section -->
<div class="bg-gray-800 p-6 rounded-lg shadow-lg mb-6">
    <h3 class="text-xl font-semibold text-white mb-4">Informations de l'Abonnement Actuel</h3>
    <div class="space-y-4">
        <div class="flex justify-between">
            <span class="text-lg text-white">Type d'Abonnement</span>
            <span class="text-lg text-white">{{ $latestAbonnement->type_Abonnement }}</span>
        </div>
        <div class="flex justify-between">
            <span class="text-lg text-white">Date de début</span>
            <span class="text-lg text-white">{{ \Carbon\Carbon::parse($latestAbonnement->date_Debut)->format('d M Y') }}</span>
        </div>
        <div class="flex justify-between">
            <span class="text-lg text-white">Date d'expiration</span>
            <span class="text-lg text-white">{{ \Carbon\Carbon::parse($latestAbonnement->date_Fin)->format('d M Y') }}</span>
        </div>
        <div class="flex justify-between">
            <span class="text-lg text-white">Statut de l'Abonnement</span>
            <span class="text-lg font-semibold {{ $abonnementStatus == 'Actif' ? 'text-green-400' : 'text-red-400' }}">
                {{ $abonnementStatus }}
            </span>
        </div>
    </div>
</div>
@endif

<!-- Subscription History Section -->
<div class="bg-gray-800 p-6 rounded-lg shadow-lg mb-6">
    <h3 class="text-xl font-semibold text-white mb-4">Historique des Abonnements</h3>
    @if($abonnements->isEmpty())
        <p class="text-lg text-gray-400">Aucun abonnement enregistré.</p>
    @else
        <table class="w-full border-collapse border border-gray-700">
            <thead>
                <tr class="bg-gray-700">
                    <th class="p-2 border border-gray-600">Type</th>
                    <th class="p-2 border border-gray-600">Date de début</th>
                    <th class="p-2 border border-gray-600">Date d'expiration</th>
                    <th class="p-2 border border-gray-600">Statut</th>
                </tr>
            </thead>
            <tbody>
                @foreach($abonnements as $abonnement)
                <tr class="text-center">
                    <td class="p-2 border border-gray-600">{{ $abonnement->type_Abonnement }}</td>
                    <td class="p-2 border border-gray-600">{{ \Carbon\Carbon::parse($abonnement->date_Debut)->format('d M Y') }}</td>
                    <td class="p-2 border border-gray-600">{{ \Carbon\Carbon::parse($abonnement->date_Fin)->format('d M Y') }}</td>
                    <td class="p-2 border border-gray-600 {{ $abonnement->date_Fin > now() ? 'text-green-400' : 'text-red-400' }}">
                        {{ $abonnement->date_Fin > now() ? 'Active' : 'Expiré' }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

<!-- Subscription Management Section -->
<div class="bg-gray-800 p-6 rounded-lg shadow-lg mb-6">
    <h3 class="text-xl font-semibold text-white mb-4">Gérer mon Abonnement</h3>
    
    <div class="flex justify-between items-center mb-4">
        <span class="text-lg text-white">Prolonger mon Abonnement</span>
        <a href="{{ route('home') }}#abonnementForm" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition duration-200">
            Renouveler
        </a>
    </div>

</div>

<!-- Payment Information Section -->
<div class="bg-gray-800 p-6 rounded-lg shadow-lg mb-6">
    <h3 class="text-xl font-semibold text-white mb-4">Informations de Paiement</h3>
    <div class="space-y-4">
        @if($payment)
        <div class="flex justify-between">
            <span class="text-lg text-white">Mode de Paiement</span>
            <span class="text-lg text-white">{{$payment->payment_method}}</span>
        </div>
        <div class="flex justify-between">
            <span class="text-lg text-white">Date Paiement</span>
            <span class="text-lg text-white">{{$payment->created_at()}}</span>
        </div>
        <div class="flex justify-between">
            <span class="text-lg text-white">Montant</span>
            <span class="text-lg text-white">{{$payment->amount}}DH</span>
        </div>
        @else
        <p class="text-lg text-gray-400">Aucun payment enregistré.</p>
        @endif
    </div>
</div>

@endsection
