@extends('layouts.app')

@section('title', 'Mes Abonnements')

@section('header', 'Mes Abonnements')

@section('content')

<!-- Subscription Information Section -->
<div class="bg-gray-800 p-6 rounded-lg shadow-lg mb-6">
    <h3 class="text-xl font-semibold text-white mb-4">Informations de l'Abonnement</h3>
    <div class="space-y-4">
        <div class="flex justify-between">
            <span class="text-lg text-white">Type d'Abonnement</span>
            <span class="text-lg text-white">Annuelle</span>
        </div>
        <div class="flex justify-between">
            <span class="text-lg text-white">Date de début</span>
            <span class="text-lg text-white">01 Janvier 2023</span>
        </div>
        <div class="flex justify-between">
            <span class="text-lg text-white">Date d'expiration</span>
            <span class="text-lg text-white">01 Janvier 2024</span>
        </div>
        <div class="flex justify-between">
            <span class="text-lg text-white">Statut de l'Abonnement</span>
            <span class="text-lg text-green-400">Actif</span>
        </div>
    </div>
</div>

<!-- Subscription History Section (Optional) -->
<div class="bg-gray-800 p-6 rounded-lg shadow-lg mb-6">
    <h3 class="text-xl font-semibold text-white mb-4">Historique des Abonnements</h3>
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
            <tr>
                <td class="p-2 border border-gray-600">Annuelle</td>
                <td class="p-2 border border-gray-600">01 Janvier 2022</td>
                <td class="p-2 border border-gray-600">01 Janvier 2023</td>
                <td class="p-2 border border-gray-600 text-green-400">Renouvelé</td>
            </tr>
            <tr>
                <td class="p-2 border border-gray-600">Mensuelle</td>
                <td class="p-2 border border-gray-600">01 Février 2023</td>
                <td class="p-2 border border-gray-600">01 Mars 2023</td>
                <td class="p-2 border border-gray-600 text-red-400">Expiré</td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Subscription Management Section -->
<div class="bg-gray-800 p-6 rounded-lg shadow-lg mb-6">
    <h3 class="text-xl font-semibold text-white mb-4">Gérer mon Abonnement</h3>
    
    <div class="flex justify-between items-center mb-4">
        <span class="text-lg text-white">Prolonger mon Abonnement</span>
        <a href="#" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition duration-200">Renouveler</a>
    </div>

    <div class="flex justify-between items-center mb-4">
        <span class="text-lg text-white">Changer mon Abonnement</span>
        <a href="#" class="bg-green-600 text-white px-6 py-2 rounded-md hover:bg-green-700 transition duration-200">Modifier</a>
    </div>
</div>

<!-- Payment Information Section (Optional) -->
<div class="bg-gray-800 p-6 rounded-lg shadow-lg mb-6">
    <h3 class="text-xl font-semibold text-white mb-4">Informations de Paiement</h3>
    <div class="space-y-4">
        <div class="flex justify-between">
            <span class="text-lg text-white">Mode de Paiement</span>
            <span class="text-lg text-white">Carte de Crédit</span>
        </div>
        <div class="flex justify-between">
            <span class="text-lg text-white">Dernier Paiement</span>
            <span class="text-lg text-white">15 Février 2023</span>
        </div>
        <div class="flex justify-between">
            <span class="text-lg text-white">Montant</span>
            <span class="text-lg text-white">€59.99</span>
        </div>
    </div>
</div>

@endsection
