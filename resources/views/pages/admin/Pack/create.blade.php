@extends('layouts.app')

@section('title', 'Ajouter une pack')

@section('header', 'Ajouter une pack')

@section('content')
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
        <form action="{{ route('pack.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-white">Nom de la pack</label>
                <input type="text" name="name" value="{{ old('name') }}" 
                    class="w-full px-4 py-2 bg-gray-700 text-white rounded-md focus:ring-2 focus:ring-blue-600 @error('name') border-red-500 @enderror">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-white">Type de pack</label>
                <input type="text" name="type_pack" value="{{ old('type_pack') }}" 
                    class="w-full px-4 py-2 bg-gray-700 text-white rounded-md focus:ring-2 focus:ring-blue-600 @error('type_pack') border-red-500 @enderror">
                @error('type_pack')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-white">Statut</label>
                <select name="statut" class="w-full px-4 py-2 bg-gray-700 text-white rounded-md focus:ring-2 focus:ring-blue-600 @error('statut') border-red-500 @enderror">
                    <option value="Disponible" {{ old('statut') == 'Disponible' ? 'selected' : '' }}>Disponible</option>
                    <option value="Occupee" {{ old('statut') == 'Occupee' ? 'selected' : '' }}>Occupée</option>
                    <option value="En-maintenance" {{ old('statut') == 'En-maintenance' ? 'selected' : '' }}>En Maintenance</option>
                </select>
                @error('statut')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Ajouter</button>
        </form>
    </div>
@endsection
