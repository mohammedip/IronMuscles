@extends('layouts.app')

@section('title', 'Modifier une Spécialité')

@section('content')

<div class="max-w-2xl mx-auto bg-gray-800 p-6 rounded shadow-md">
    <h2 class="text-center text-xl font-semibold mb-4">Modifier la Spécialité</h2>

    <form action="{{ route('speciality.update', $speciality->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label class="block text-white font-semibold mb-2">Nom de la spécialité</label>
            <input type="text" name="name" class="w-full p-2 border rounded bg-gray-700 text-white" value="{{ old('name', $speciality->name) }}" required>
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="text-center">
            <button type="submit" class="bg-blue-600 px-4 py-2 rounded text-white font-semibold hover:bg-blue-700">Mettre à jour</button>
        </div>
    </form>
</div>

@endsection
