@extends('layouts.app')

@section('title', 'Mon Profil')

@section('header', 'Mon Profil')

@section('content')

<!-- Profile Section -->
<div class="bg-gray-800 p-6 rounded-lg shadow-lg mb-6">
    <div class="flex items-center space-x-4">
        <!-- Profile Picture -->
        <div class="w-24 h-24 bg-gray-700 rounded-full overflow-hidden">
            <img src="{{ asset('images/profile-picture.jpg') }}" alt="User Profile Picture" class="w-full h-full object-cover">
        </div>

        <!-- User Info -->
        <div class="text-white">
            <h3 class="text-2xl font-semibold">{{auth()->user()->name}}</h3>
            <p class="text-lg">Email: {{auth()->user()->email}}</p>
            <p class="text-lg">Adhésion: Annuelle</p>
            <p class="text-lg">Date d'adhésion: 15 Janvier 2023</p>
            <p class="text-lg text-green-400">Statut: Actif</p>
        </div>
    </div>
</div>

<!-- Membership Details Section -->
<div class="bg-gray-800 p-6 rounded-lg shadow-lg mb-6">
    <h3 class="text-xl font-semibold text-white mb-4">Détails de l'Abonnement</h3>
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
    </div>
</div>

<!-- Workout Plan Section (Optional) -->
<div class="bg-gray-800 p-6 rounded-lg shadow-lg mb-6">
    <h3 class="text-xl font-semibold text-white mb-4">Mon Plan d'Entraînement</h3>
    <div class="space-y-4">
        <div class="flex justify-between">
            <span class="text-lg text-white">Plan</span>
            <span class="text-lg text-white">Hypertrophie Musculaire</span>
        </div>
        <div class="flex justify-between">
            <span class="text-lg text-white">Fréquence</span>
            <span class="text-lg text-white">4 jours / semaine</span>
        </div>
        <div class="flex justify-between">
            <span class="text-lg text-white">Prochain entraînement</span>
            <span class="text-lg text-white">Lundi 6 Mars 2025</span>
        </div>
    </div>
</div>

<!-- Edit Profile Button -->
<div class="flex justify-end">
    <a href="" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition duration-200">Modifier le Profil</a>
</div>

@endsection
