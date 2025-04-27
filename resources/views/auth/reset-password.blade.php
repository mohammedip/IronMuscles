@extends('layouts.app')

@section('title', 'Reset Password')

@section('header', 'Reset Your Password')

@section('content')

@if(session('status'))
    <div class="bg-green-100 text-green-800 border border-green-300 p-4 rounded mb-4 shadow-md animate-fade-in-down">
        {{ session('status') }}
    </div>
@endif
@if(session('error'))
    <div class="bg-red-100 text-red-800 border border-red-300 p-4 rounded mb-4 shadow-md animate-fade-in-down">
        {{ session('error') }}
    </div>
@endif

<div class="relative min-h-screen flex items-center justify-center bg-hero-pattern bg-cover bg-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm"></div>

    <div class="relative max-w-md w-full bg-white/5 backdrop-blur-md border border-gray-700 rounded-xl shadow-xl p-10 z-10 animate-fade-in-up">
        <h2 class="text-center text-3xl font-bold text-white mb-6 tracking-wide uppercase">Réinitialisez votre Mot de Passe</h2>
        <p class="text-center text-gray-400 mb-8">Vous êtes à un pas de récupérer votre mot de passe. Créez un nouveau mot de passe maintenant.</p>

        <form action="{{ route('reset_password.post') }}" method="POST" class="space-y-6">
            @csrf
            <input type="hidden" name="token" value="{{ request()->segment(2) }}">

            <!-- New Password Input -->
            <div class="flex flex-col gap-2">
                <label class="text-sm font-medium text-gray-300">Nouveau Mot de Passe</label>
                <input type="password" name="password" placeholder="Nouveau Mot de Passe"
                    class="w-full pl-10 pr-4 py-3 rounded-lg bg-gray-900 text-white border border-gray-700 focus:ring-2 focus:ring-ff8906 focus:outline-none"
                    required>
                <i class="absolute left-3 top-3.5 tabler--lock text-gray-500 text-xl"></i>
            </div>

            <!-- Confirm Password Input -->
            <div class="flex flex-col gap-2">
                <label class="text-sm font-medium text-gray-300">Confirmer le Mot de Passe</label>
                <input type="password" name="password_confirmation" placeholder="Confirmer le Mot de Passe"
                    class="w-full pl-10 pr-4 py-3 rounded-lg bg-gray-900 text-white border border-gray-700 focus:ring-2 focus:ring-ff8906 focus:outline-none"
                    required>
                <i class="absolute left-3 top-3.5 tabler--lock text-gray-500 text-xl"></i>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="relative w-full bg-ff8906 text-0f0e17 font-bold py-3 rounded-lg hover:bg-f25f4c transition duration-200 transform hover:scale-105 shadow-lg btn-anim">
                <i class="tabler--lock-open mr-2"></i> Réinitialiser le Mot de Passe
            </button>
        </form>

        <!-- OR Divider -->
        <div class="flex items-center gap-4 my-6">
            <hr class="flex-1 border-gray-600">
            <span class="text-gray-400">OU</span>
            <hr class="flex-1 border-gray-600">
        </div>

        <!-- Back Home -->
        <a href="{{ route('home') }}"
            class="w-full flex items-center justify-center gap-2 bg-gray-800 hover:bg-gray-700 text-white font-semibold py-3 rounded-lg transition duration-200 shadow-md">
            <i class="tabler--arrow-back-up text-xl"></i> Retour à l'accueil
        </a>
    </div>
</div>

@endsection

@section('styles')
<style>
    .btn-anim::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: 0.7s;
    }

    .btn-anim:hover::before {
        left: 100%;
    }
</style>
@endsection
