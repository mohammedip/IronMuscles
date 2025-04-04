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

    <form action="{{ route('coach.store') }}" method="POST" class="space-y-6">
        @csrf  {{-- CSRF protection --}}


        <!-- Nom Input -->
        <div class="flex flex-col gap-2">
            <label class="text-sm font-medium text-gray-300">Nom</label>
            <input type="text" name="name" placeholder="Nom du coach"
                class="w-full p-3 border border-gray-600 bg-gray-900 text-white rounded focus:outline-none focus:border-blue-500"
                required>
                @error('name') <span class="text-red-500">{{ $message }}</span> @enderror

        </div>

          <!-- Email Input -->
          <div class="flex flex-col gap-2">
            <label class="text-sm font-medium text-gray-300">Email</label>
            <input type="email" name="email" placeholder="Adresse email"
                class="w-full p-3 border border-gray-600 bg-gray-900 text-white rounded focus:outline-none focus:border-blue-500"
                required>
                @error('email') <span class="text-red-500">{{ $message }}</span> @enderror

        </div>

        <div>
            <label class="text-sm font-medium text-gray-300">Password</label>
            <input type="password" name="password" placeholder="Password"
                class="w-full p-3 border border-gray-700 bg-gray-900 text-white rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                required>
            @error('password') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Spécialité Input -->
        <div class="flex flex-col gap-2">
            <label class="text-sm font-medium text-gray-300">Spécialité</label>
            <select name="id_specialite" id="" class="w-full p-3 border border-gray-600 bg-gray-900 text-white rounded focus:outline-none focus:border-blue-500"
                required>
                <option value="" disabled selected>Selectioner une Specialite</option>
                @forEach ($specialities as $speciality)
                    <option value="{{ $speciality->id }}">{{ $speciality->name }}</option>
                @endforEach
            </select>
        </div>

        <!-- Numéro Téléphone Input -->
        <div class="flex flex-col gap-2">
            <label class="text-sm font-medium text-gray-300">Numéro Téléphone</label>
            <input type="tel" name="numero_telephone" placeholder="Numéro de téléphone"
                class="w-full p-3 border border-gray-600 bg-gray-900 text-white rounded focus:outline-none focus:border-blue-500"
                required>
        </div>

        <!-- Date de Recrutement Input -->
        <div class="flex flex-col gap-2">
            <label class="text-sm font-medium text-gray-300">Date de Recrutement</label>
            <input type="date" name="date_recrutement" 
                class="w-full p-3 border border-gray-600 bg-gray-900 text-white rounded focus:outline-none focus:border-blue-500"
                value="{{ old('date_recrutement', now()->toDateString()) }}" required>
            @error('date_recrutement') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>


        <!-- Ajouter Button -->
        <button type="submit" class="w-full bg-blue-600 p-3 rounded text-white font-semibold hover:bg-blue-700">
            <i class="tabler--plus"></i> Ajouter
        </button>
    </form>

    <!-- Retour Link -->
    <p class="text-gray-400 text-center mt-4">
        Retourner à la liste des coaches? 
        <a href="{{ route('coach.index') }}" class="text-blue-500 hover:underline">Voir la liste</a>
    </p>
</div>

@endsection
