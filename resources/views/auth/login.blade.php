@extends('layouts.app')

@section('title', 'Login')

@section('header', 'Se Connecter')

@section('content')

@if(session('status'))
    <div class="bg-green-100 text-green-800 border border-green-300 p-4 rounded mb-4">
        {{ session('status') }}
    </div>
@endif
@if(session('error'))
    <div class="bg-red-100 text-red-800 border border-red-300 p-4 rounded mb-4">
        {{ session('error') }}
    </div>
@endif


<div class="max-w-md mx-auto bg-gray-800 p-6 rounded shadow-md">
    <h2 class="text-center text-xl font-semibold mb-4">Login</h2>

    <form action="{{ route('login.post') }}" method="POST" class="space-y-6">
        @csrf  {{-- CSRF protection --}}

        <!-- Email Input -->
        <div class="flex flex-col gap-2">
            <label class="text-sm font-medium text-gray-300">Email</label>
            <input type="email" name="email" placeholder="Email address"
                class="w-full p-3 border border-gray-600 bg-gray-900 text-white rounded focus:outline-none focus:border-blue-500"
                required>
        </div>

        <!-- Password Input -->
        <div class="flex flex-col gap-2">
            <label class="text-sm font-medium text-gray-300">Password</label>
            <input type="password" name="password" placeholder="Password"
                class="w-full p-3 border border-gray-600 bg-gray-900 text-white rounded focus:outline-none focus:border-blue-500"
                required>
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between">
            <label class="flex items-center text-gray-400">
                <input type="checkbox" name="remember" class="mr-2"> Remember me
            </label>
            <a href="{{ route('forgot_password') }}" class="text-blue-500 hover:underline">Forgot Password?</a>
        </div>

        <!-- Login Button -->
        <button type="submit" class="w-full bg-blue-600 p-3 rounded text-white font-semibold hover:bg-blue-700">
            <i class="tabler--login"></i> Log in
        </button>
    </form>

    <!-- OR Separator -->
    <div class="flex items-center justify-center gap-2 my-4">
        <span class="h-px w-20 bg-gray-500"></span>
        <span>OR</span>
        <span class="h-px w-20 bg-gray-500"></span>
    </div>

    <!-- Social Login -->
    <a href="#" class="w-full flex items-center justify-center bg-gray-900 p-3 rounded text-white font-semibold hover:bg-gray-700">
        <i class="tabler--brand-github mr-2"></i> Login with GitHub
    </a>

    <!-- Register Link -->
    <p class="text-gray-400 text-center mt-4">
        Don't have an account yet? 
        <a href="{{ url('/register') }}" class="text-blue-500 hover:underline">Register</a>
    </p>
</div>

@endsection
