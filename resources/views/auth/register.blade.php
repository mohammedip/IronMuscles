@extends('layouts.app')

@section('title', 'Register')

@section('header', 'Créer un Compte')

@section('content')

<div class="max-w-md mx-auto bg-gray-800 p-8 rounded-lg shadow-lg">
    <h2 class="text-center text-2xl font-bold text-white mb-6">Register</h2>

    <form action="{{ route('register.post') }}" method="POST" class="space-y-6">
        @csrf  
        
        <!-- Full Name Input -->
        <div>
            <label class="text-sm font-medium text-gray-300">Full Name</label>
            <input type="text" name="name" placeholder="Full Name"
                class="w-full p-3 border border-gray-700 bg-gray-900 text-white rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                required>
        </div>
        
        <div class="grid grid-cols-2 gap-4">
            <!-- Left Column: Address, Date of Birth, Phone Number -->
            <div class="space-y-4">
                <div>
                    <label class="text-sm font-medium text-gray-300">Address</label>
                    <input type="text" name="adresse" placeholder="Your Address"
                        class="w-full p-3 border border-gray-700 bg-gray-900 text-white rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required>
                </div>

                <div>
                    <label class="text-sm font-medium text-gray-300">Date of Birth</label>
                    <input type="date" name="date_naissance"
                        class="w-full p-3 border border-gray-700 bg-gray-900 text-white rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required>
                </div>

                <div>
                    <label class="text-sm font-medium text-gray-300">Phone Number</label>
                    <input type="tel" name="numero_telephone" placeholder="Your Phone Number"
                        class="w-full p-3 border border-gray-700 bg-gray-900 text-white rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required>
                </div>
            </div>

            <!-- Right Column: Email, Password, Confirm Password -->
            <div class="space-y-4">
                <div>
                    <label class="text-sm font-medium text-gray-300">Email</label>
                    <input type="email" name="email" placeholder="Email address"
                        class="w-full p-3 border border-gray-700 bg-gray-900 text-white rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
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

                <div>
                    <label class="text-sm font-medium text-gray-300">Confirm Password</label>
                    <input type="password" name="password_confirmation" placeholder="Confirm Password"
                        class="w-full p-3 border border-gray-700 bg-gray-900 text-white rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required>
                </div>
            </div>
        </div>

        <!-- Terms & Conditions -->
        <div class="flex items-center mt-4">
            <input type="checkbox" name="accept_terms" class="mr-2 accent-blue-500">
            <span class="text-gray-400">
                I accept the <a href="#" class="text-blue-500 hover:underline">Terms and Conditions</a>
            </span>
        </div>

        <!-- Register Button -->
        <button type="submit" class="w-full bg-blue-600 p-3 rounded-lg text-white font-semibold hover:bg-blue-700 transition duration-200">
            <i class="tabler--user-plus"></i> Register
        </button>
    </form>

    <!-- OR Separator -->
    <div class="flex items-center justify-center gap-2 my-6">
        <span class="h-px w-24 bg-gray-500"></span>
        <span class="text-gray-400">OR</span>
        <span class="h-px w-24 bg-gray-500"></span>
    </div>

    <!-- Social Register -->
    <a href="{{route('home')}}" class="w-full flex items-center justify-center bg-gray-900 p-4 rounded-lg text-white font-semibold hover:bg-gray-700 focus:ring-4 focus:ring-blue-500 transition duration-200 ease-in-out shadow-md transform hover:scale-105">
        <i class="tabler--brand-google mr-3 text-lg"></i> Home page
    </a>
    
    <!-- Login Link -->
    <p class="text-gray-400 text-center mt-6">
        Already have an account? <a href="{{ url('login') }}" class="text-blue-500 hover:underline">Login</a>
    </p>
</div>


@endsection