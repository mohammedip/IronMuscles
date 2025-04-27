@extends('layouts.app')

@section('title', 'IronMuscle - Register')

@section('header', 'Créer un Compte')

@section('content')
<div class="relative min-h-screen flex items-center justify-center bg-hero-pattern bg-cover bg-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm"></div>

    <div class="relative max-w-3xl w-full bg-white/5 backdrop-blur-md border border-gray-700 rounded-xl shadow-xl p-10 z-10 animate-fade-in-up">
        <h2 class="text-center text-3xl font-bold text-white mb-6 tracking-wide uppercase">Create Your Account</h2>
        <p class="text-center text-gray-400 mb-8">Join the IronMuscle community</p>

        <form id="registerForm" action="{{ route('register.post') }}" method="POST" class="space-y-6" novalidate>
            @csrf  

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Full Name</label>
                    <input type="text" name="name" id="name" placeholder="Full Name"
                        class="w-full p-3 rounded-lg bg-gray-900 text-white border border-gray-700 focus:ring-2 focus:ring-ff8906 focus:outline-none"
                        required>
                    <span id="nameError" class="text-red-500 text-sm hidden"></span>
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Email</label>
                    <input type="email" name="email" id="email" placeholder="you@example.com"
                        class="w-full p-3 rounded-lg bg-gray-900 text-white border border-gray-700 focus:ring-2 focus:ring-ff8906 focus:outline-none"
                        required>
                    <span id="emailError" class="text-red-500 text-sm hidden"></span>
                    @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <!-- Address -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Address</label>
                    <input type="text" name="adresse" id="adresse" placeholder="Your Address"
                        class="w-full p-3 rounded-lg bg-gray-900 text-white border border-gray-700 focus:ring-2 focus:ring-ff8906 focus:outline-none"
                        required>
                    <span id="adresseError" class="text-red-500 text-sm hidden"></span>
                </div>

                <!-- Phone -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Phone Number</label>
                    <input type="tel" name="numero_telephone" id="numero_telephone" placeholder="Your Phone Number"
                        class="w-full p-3 rounded-lg bg-gray-900 text-white border border-gray-700 focus:ring-2 focus:ring-ff8906 focus:outline-none"
                        required>
                    <span id="phoneError" class="text-red-500 text-sm hidden"></span>
                </div>

                <!-- Date of Birth -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Date of Birth</label>
                    <input type="date" name="date_naissance" id="date_naissance"
                        class="w-full p-3 rounded-lg bg-gray-900 text-white border border-gray-700 focus:ring-2 focus:ring-ff8906 focus:outline-none"
                        required>
                    <span id="dobError" class="text-red-500 text-sm hidden"></span>
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Password</label>
                    <input type="password" name="password" id="password" placeholder="••••••••"
                        class="w-full p-3 rounded-lg bg-gray-900 text-white border border-gray-700 focus:ring-2 focus:ring-ff8906 focus:outline-none"
                        required>
                    <span id="passwordError" class="text-red-500 text-sm hidden"></span>
                    @error('password') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••"
                        class="w-full p-3 rounded-lg bg-gray-900 text-white border border-gray-700 focus:ring-2 focus:ring-ff8906 focus:outline-none"
                        required>
                    <span id="confirmPasswordError" class="text-red-500 text-sm hidden"></span>
                </div>
            </div>

            <!-- Terms & Conditions -->
            <div class="flex items-center mt-4 text-sm text-gray-400">
                <input type="checkbox" name="accept_terms" id="accept_terms" class="accent-ff8906 mr-2" required>
                <span>I accept the <a href="#" class="text-ff8906 hover:underline">Terms and Conditions</a></span>
            </div>
            <span id="termsError" class="text-red-500 text-sm hidden"></span>

            <!-- Register Button -->
            <button type="submit"
                class="relative w-full bg-ff8906 text-0f0e17 font-bold py-3 rounded-lg hover:bg-f25f4c transition duration-200 transform hover:scale-105 shadow-lg btn-anim">
                <i class="tabler--user-plus mr-2"></i> Register
            </button>
        </form>

        <!-- OR Divider -->
        <div class="flex items-center gap-4 my-6">
            <hr class="flex-1 border-gray-600">
            <span class="text-gray-400">OR</span>
            <hr class="flex-1 border-gray-600">
        </div>

        <!-- Back to Home -->
        <a href="{{ route('home') }}"
            class="w-full flex items-center justify-center gap-2 bg-gray-800 hover:bg-gray-700 text-white font-semibold py-3 rounded-lg transition duration-200 shadow-md">
            <i class="tabler--arrow-back-up text-xl"></i> Back to Home
        </a>

        <!-- Login Link -->
        <p class="text-center text-sm text-gray-400 mt-6">
            Already have an account?
            <a href="{{ url('/login') }}" class="text-ff8906 hover:underline">Login</a>
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

@section('scripts')
<script>
document.getElementById('registerForm').addEventListener('submit', function(event) {
    event.preventDefault();
    let isValid = true;

    document.querySelectorAll('.text-red-500').forEach(el => {
        if (el.id.endsWith('Error')) {
            el.classList.add('hidden');
            el.textContent = '';
        }
    });

    const nameRegex = /^[A-Za-z\s]{2,50}$/;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const phoneRegex = /^\+?[\d\s-]{10,15}$/;
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    const addressRegex = /^[\w\s,.-]{5,100}$/;
    const dobRegex = /^\d{4}-\d{2}-\d{2}$/;

    const name = document.getElementById('name').value.trim();
    if (!nameRegex.test(name)) {
        document.getElementById('nameError').textContent = 'Name must be 2-50 characters, letters and spaces only';
        document.getElementById('nameError').classList.remove('hidden');
        isValid = false;
    }

    const email = document.getElementById('email').value.trim();
    if (!emailRegex.test(email)) {
        document.getElementById('emailError').textContent = 'Please enter a valid email address';
        document.getElementById('emailError').classList.remove('hidden');
        isValid = false;
    }

    const address = document.getElementById('adresse').value.trim();
    if (!addressRegex.test(address)) {
        document.getElementById('adresseError').textContent = 'Address must be 5-100 characters, letters, numbers, and basic punctuation';
        document.getElementById('adresseError').classList.remove('hidden');
        isValid = false;
    }

    const phone = document.getElementById('numero_telephone').value.trim();
    if (!phoneRegex.test(phone)) {
        document.getElementById('phoneError').textContent = 'Phone number must be 10-15 digits, may include +, spaces, or dashes';
        document.getElementById('phoneError').classList.remove('hidden');
        isValid = false;
    }

    const dob = document.getElementById('date_naissance').value;
    if (!dobRegex.test(dob)) {
        document.getElementById('dobError').textContent = 'Please select a valid date';
        document.getElementById('dobError').classList.remove('hidden');
        isValid = false;
    } else {
        const today = new Date();
        const birthDate = new Date(dob);
        const age = today.getFullYear() - birthDate.getFullYear();
        if (age < 13) {
            document.getElementById('dobError').textContent = 'You must be at least 13 years old';
            document.getElementById('dobError').classList.remove('hidden');
            isValid = false;
        }
    }

    const password = document.getElementById('password').value;
    if (!passwordRegex.test(password)) {
        document.getElementById('passwordError').textContent = 'Password must be 8+ characters with uppercase, lowercase, number, and special character';
        document.getElementById('passwordError').classList.remove('hidden');
        isValid = false;
    }

    const confirmPassword = document.getElementById('password_confirmation').value;
    if (password !== confirmPassword) {
        document.getElementById('confirmPasswordError').textContent = 'Passwords do not match';
        document.getElementById('confirmPasswordError').classList.remove('hidden');
        isValid = false;
    }

    const terms = document.getElementById('accept_terms').checked;
    if (!terms) {
        document.getElementById('termsError').textContent = 'You must accept the Terms and Conditions';
        document.getElementById('termsError').classList.remove('hidden');
        isValid = false;
    }

    if (isValid) {
        this.submit();
    }
});
</script>
@endsection