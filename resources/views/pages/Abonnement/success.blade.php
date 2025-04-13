@extends('layouts.app')

@section('title', 'Abonnement Réussi')

@section('content')
<div class="max-w-3xl mx-auto bg-gray-900 p-8 rounded-lg shadow-lg text-white text-center">
    <h2 class="text-3xl font-bold text-green-400 mb-6">🎉 Félicitations !</h2>
    <p class="text-lg mb-4">Votre abonnement <span class="font-semibold">{{ session('type_Abonnement') }}</span> a été activé avec succès.</p>
    
    <div class="flex justify-center space-x-4">
        <a href="{{ route('abonnement.index') }}" class="bg-blue-600 px-6 py-3 rounded-md text-lg font-semibold hover:bg-blue-700 transition duration-200">
            Voir mes abonnements 📋
        </a>
        <a href="{{ route('home') }}" class="bg-gray-700 px-6 py-3 rounded-md text-lg font-semibold hover:bg-gray-800 transition duration-200">
            Retour à l'accueil 🏠
        </a>
    </div>
</div>
@endsection
