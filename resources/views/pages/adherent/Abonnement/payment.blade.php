@extends('layouts.app')

@section('title', 'Paiement de l\'Abonnement')

@section('content')
<div class="max-w-3xl mx-auto bg-gray-900 p-8 rounded-lg shadow-lg text-white">
    <h2 class="text-2xl font-bold mb-6">Paiement pour {{ $type }}</h2>
    <p class="text-lg mb-4">💳 Montant à payer : <span class="font-semibold">{{ $price }}DH</span></p>

    <form action="{{ route('abonnement.processPayment') }}" method="POST">
        @csrf
        <input type="hidden" name="type_Abonnement" value="{{ $type }}">

        <div class="space-y-4">
            <label class="block text-lg">Méthode de Paiement:</label>
            <select name="payment_method" required  class="w-full p-3 rounded-md bg-gray-800 border border-gray-700 focus:outline- pointer-events-none">
                <option value="Stripe" selected>💰 Stripe</option>
                {{-- <option value="Cash">💵 Espèces</option> --}}
            </select>
        </div>

        <button type="submit" class="mt-6 w-full bg-green-600 py-3 rounded-md text-lg font-semibold hover:bg-green-700 transition duration-200">
            Confirmer et Payer ✅
        </button>
    </form>
</div>
@endsection
