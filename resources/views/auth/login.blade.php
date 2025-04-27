@extends('layouts.app')

@section('title', 'IronMuscle - Connexion')

@section('header', 'Se Connecter')

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
        <h2 class="text-center text-3xl font-bold text-white mb-6 tracking-wide uppercase">Welcome Back</h2>
        <p class="text-center text-gray-400 mb-8">Log into your IronMuscle account</p>

        <form action="{{ route('login.post') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Email Input -->
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1">Email</label>
                <div class="relative">
                    <input type="email" name="email" placeholder="you@example.com"
                        class="w-full pl-10 pr-4 py-3 rounded-lg bg-gray-900 text-white border border-gray-700 focus:ring-2 focus:ring-ff8906 focus:outline-none"
                        required>
                    <i class="absolute left-3 top-3.5 tabler--mail text-gray-500 text-xl"></i>
                </div>
            </div>

            <!-- Password Input -->
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1">Password</label>
                <div class="relative">
                    <input type="password" name="password" placeholder="••••••••"
                        class="w-full pl-10 pr-4 py-3 rounded-lg bg-gray-900 text-white border border-gray-700 focus:ring-2 focus:ring-ff8906 focus:outline-none"
                        required>
                    <i class="absolute left-3 top-3.5 tabler--lock text-gray-500 text-xl"></i>
                </div>
            </div>

            <!-- Remember & Forgot -->
            <div class="flex items-center justify-between text-sm text-gray-400">
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="remember" class="accent-ff8906"> Remember me
                </label>
                <a href="{{ route('forgot_password') }}" class="hover:text-ff8906 transition">Forgot password?</a>
            </div>

            <!-- Login Button -->
            <button type="submit"
                class="w-full bg-ff8906 text-0f0e17 font-bold py-3 rounded-lg hover:bg-f25f4c transition duration-200 transform hover:scale-105 shadow-lg btn-anim">
                <i class="tabler--login mr-2"></i> Log In
            </button>
        </form>

        <!-- OR Divider -->
        <div class="flex items-center gap-4 my-6">
            <hr class="flex-1 border-gray-600">
            <span class="text-gray-400">OR</span>
            <hr class="flex-1 border-gray-600">
        </div>

        <!-- Back Home -->
        <a href="{{ route('home') }}"
            class="w-full flex items-center justify-center gap-2 bg-gray-800 hover:bg-gray-700 text-white font-semibold py-3 rounded-lg transition duration-200 shadow-md">
            <i class="tabler--arrow-back-up text-xl"></i> Back to Home
        </a>

        <!-- Register Link -->
        <p class="text-center text-sm text-gray-400 mt-6">
            Don’t have an account?
            <a href="{{ url('/register') }}" class="text-ff8906 hover:underline">Register now</a>
        </p>
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