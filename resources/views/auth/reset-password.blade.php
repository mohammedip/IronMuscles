@extends('layouts.app')

@section('title', 'Reset Password')

@section('header', 'Reset Your Password')

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
    <p class="my-4 text-start text-sm font-medium text-gray-400">
        You are only one step away from your new password. Recover your password now.
    </p>

    <form action="{{ route('reset_password.post') }}" method="POST" class="space-y-6">
        @csrf  {{-- CSRF Protection --}}
        <input type="hidden" name="token" value="{{ request()->segment(2) }}"> 

        <!-- Password Input -->
        <div>
            <label class="text-sm font-medium text-gray-300">New Password</label>
            <input type="password" name="password" placeholder="New Password" 
                class="w-full p-3 border border-gray-600 bg-gray-900 text-white rounded focus:outline-none focus:border-blue-500" 
                required>
        </div>

        <!-- Confirm Password Input -->
        <div>
            <label class="text-sm font-medium text-gray-300">Confirm Password</label>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" 
                class="w-full p-3 border border-gray-600 bg-gray-900 text-white rounded focus:outline-none focus:border-blue-500" 
                required>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full bg-blue-600 p-3 rounded text-white font-semibold hover:bg-blue-700">
            Reset Password
        </button>
    </form>
</div>

@endsection
