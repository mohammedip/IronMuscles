@extends('layouts.app')

@section('title', 'Ajouter une Spécialité')

@section('content')

<div class="max-w-2xl mx-auto bg-gray-800 p-6 rounded shadow-md">
    <h2 class="text-center text-xl font-semibold mb-4">Ajouter une Spécialité</h2>

    <form action="{{ route('speciality.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-white font-semibold mb-2">Nom de la spécialité</label>
            <input type="text" name="name" class="w-full p-2 border rounded bg-gray-700 text-white" value="{{ old('name') }}" required>
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="text-center">
            <button type="submit" class="bg-green-600 px-4 py-2 rounded text-white font-semibold hover:bg-green-700">Ajouter</button>
        </div>
    </form>
</div>

@endsection
