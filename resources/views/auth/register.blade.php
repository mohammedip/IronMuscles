@extends('layouts.app')

@section('title', 'Register')

@section('header', 'Créer un Compte')

@section('content')

<div class="max-w-md mx-auto bg-gray-800 p-6 rounded shadow-md">
    <h2 class="text-center text-xl font-semibold mb-4">Register</h2>

    <form action="{{ route('register.post') }}" method="POST" class="space-y-6">
        @csrf  
 <!-- Name Fields -->
                <div>
                    <label class="text-sm font-medium text-gray-300">Full Name</label>
                    <input type="text" name="name" placeholder="Full Name"
                        class="w-full p-3 border border-gray-600 bg-gray-900 text-white rounded focus:outline-none focus:border-blue-500"
                        required>
                </div>
        <div class="grid grid-cols-2 gap-4">

            <!-- Right Column: Name, Address, Date of Birth, Phone Number -->
            
               
            <div class="space-y-4">
                <!-- Address Input -->
                <div>
                    <label class="text-sm font-medium text-gray-300">Address</label>
                    <input type="text" name="adresse" placeholder="Your Address"
                        class="w-full p-3 border border-gray-600 bg-gray-900 text-white rounded focus:outline-none focus:border-blue-500"
                        required>
                </div>

                <!-- Date of Birth Input -->
                <div>
                    <label class="text-sm font-medium text-gray-300">Date of Birth</label>
                    <input type="date" name="date_naissance"
                        class="w-full p-3 border border-gray-600 bg-gray-900 text-white rounded focus:outline-none focus:border-blue-500"
                        required>
                </div>

                <!-- Phone Number Input -->
                <div>
                    <label class="text-sm font-medium text-gray-300">Phone Number</label>
                    <input type="tel" name="numero_telephone" placeholder="Your Phone Number"
                        class="w-full p-3 border border-gray-600 bg-gray-900 text-white rounded focus:outline-none focus:border-blue-500"
                        required>
                </div>
            </div>

            <div class="space-y-4">
                <!-- Email Input -->

                <div>
                    <label class="text-sm font-medium text-gray-300">Email</label>
                    <input type="email" name="email" placeholder="Email address"
                        class="w-full p-3 border border-gray-600 bg-gray-900 text-white rounded focus:outline-none focus:border-blue-500"
                        required>
                    @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <!-- Password Input -->
                <div>
                    <label class="text-sm font-medium text-gray-300">Password</label>
                    <input type="password" name="password" placeholder="Password"
                        class="w-full p-3 border border-gray-600 bg-gray-900 text-white rounded focus:outline-none focus:border-blue-500"
                        required>
                    @error('password') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <!-- Confirm Password Input -->
                <div>
                    <label class="text-sm font-medium text-gray-300">Confirm Password</label>
                    <input type="password" name="password_confirmation" placeholder="Confirm Password"
                        class="w-full p-3 border border-gray-600 bg-gray-900 text-white rounded focus:outline-none focus:border-blue-500"
                        required>
                </div>
            </div>
        </div>

        <!-- Terms & Conditions -->
        <div class="flex items-center mt-4">
            <input type="checkbox" name="accept_terms" class="mr-2">
            <span class="text-gray-400">
                I accept the
                <a href="#" class="text-blue-500 hover:underline">Terms and Conditions</a>
            </span>
        </div>

        <!-- Register Button -->
        <button type="submit" class="w-full bg-blue-600 p-3 rounded text-white font-semibold hover:bg-blue-700">
            <i class="tabler--user-plus"></i> Register
        </button>
    </form>

    <!-- OR Separator -->
    <div class="flex items-center justify-center gap-2 my-4">
        <span class="h-px w-20 bg-gray-500"></span>
        <span>OR</span>
        <span class="h-px w-20 bg-gray-500"></span>
    </div>

    <!-- Social Register -->
    <a href="#" class="w-full flex items-center justify-center bg-gray-900 p-3 rounded text-white font-semibold hover:bg-gray-700">
        <i class="tabler--brand-github mr-2"></i> Register using Google
    </a>

    <!-- Login Link -->
    <p class="text-gray-400 text-center mt-4">
        Already have an account? 
        <a href="{{ url('login') }}" class="text-blue-500 hover:underline">Login</a>
    </p>
</div>

@endsection