@extends('layouts.app')

@section('title', 'Ajouter un Coach')

@section('header', 'Ajouter un Coach')

@section('content')

@if(session('status'))
    <div class="bg-red-100 text-red-800 border border-red-300 p-4 rounded mb-4">
        {{ session('status') }}
    </div>
@endif

<div class="max-w-md mx-auto bg-gray-800 p-6 rounded shadow-md">
    <h2 class="text-center text-xl font-semibold mb-4">Ajouter un Coach</h2>

    <form action="{{ route('Coach.store') }}" method="POST" class="space-y-6">
        @csrf  {{-- CSRF protection --}}


        <!-- Nom Input -->
        <div class="flex flex-col gap-2">
            <label class="text-sm font-medium text-gray-300">Nom</label>
            <input type="text" name="Nom" placeholder="Nom du coach"
                class="w-full p-3 border border-gray-600 bg-gray-900 text-white rounded focus:outline-none focus:border-blue-500"
                required>
        </div>

        <!-- Prénom Input -->
        <div class="flex flex-col gap-2">
            <label class="text-sm font-medium text-gray-300">Prénom</label>
            <input type="text" name="Prenom" placeholder="Prénom du coach"
                class="w-full p-3 border border-gray-600 bg-gray-900 text-white rounded focus:outline-none focus:border-blue-500"
                required>
        </div>

          <!-- Email Input -->
          <div class="flex flex-col gap-2">
            <label class="text-sm font-medium text-gray-300">Email</label>
            <input type="email" name="Email" placeholder="Adresse email"
                class="w-full p-3 border border-gray-600 bg-gray-900 text-white rounded focus:outline-none focus:border-blue-500"
                required>
        </div>

        <!-- Spécialité Input -->
        <div class="flex flex-col gap-2">
            <label class="text-sm font-medium text-gray-300">Spécialité</label>
            <select name="Specialite" id="" class="w-full p-3 border border-gray-600 bg-gray-900 text-white rounded focus:outline-none focus:border-blue-500"
                required>
                <option value="" disabled selected>Selectioner une Specialite</option>
                <option value="">Musculation</option>
                <option value="">Nutrition</option>
                <option value="">Entraînement personnalisé</option>
            </select>
        </div>

        <!-- Numéro Téléphone Input -->
        <div class="flex flex-col gap-2">
            <label class="text-sm font-medium text-gray-300">Numéro Téléphone</label>
            <input type="tel" name="Numero_Telephone" placeholder="Numéro de téléphone"
                class="w-full p-3 border border-gray-600 bg-gray-900 text-white rounded focus:outline-none focus:border-blue-500"
                required>
        </div>

        <!-- Ajouter Button -->
        <button type="submit" class="w-full bg-blue-600 p-3 rounded text-white font-semibold hover:bg-blue-700">
            <i class="tabler--plus"></i> Ajouter
        </button>
    </form>

    <!-- Retour Link -->
    <p class="text-gray-400 text-center mt-4">
        Retourner à la liste des coaches? 
        <a href="{{ route('Coach.index') }}" class="text-blue-500 hover:underline">Voir la liste</a>
    </p>
</div>

@endsection
