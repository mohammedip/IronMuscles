<!-- resources/views/auth/forgot-password.blade.php -->
@extends('layouts.app')

@section('title', 'Request New Password')

@section('header', 'Mot de Passe Oublié')

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
    <h1 class="text-xl font-semibold mb-4 text-center">Request New Password</h1>

    <p class="text-sm text-gray-400 text-center mb-4">
        You forgot your password? Here you can easily retrieve a new password.
    </p>

    <form action="{{ route('forgot_password.post') }}" method="POST" class="space-y-6">
        @csrf  {{-- CSRF protection for form submission --}}

        <div class="flex flex-col gap-2">
            <label class="text-sm font-medium text-gray-300">Email</label>

            <input type="email" name="email" placeholder="Email address"
                class="w-full p-3 border border-gray-600 bg-gray-900 text-white rounded focus:outline-none focus:border-blue-500"
                required>
        </div>

        <button type="submit" class="w-full bg-blue-600 p-3 rounded text-white font-semibold hover:bg-blue-700">
            <i class="tabler--mail-fast"></i> Request new password
        </button>
    </form>

</div>

@endsection
