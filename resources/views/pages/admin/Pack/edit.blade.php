@extends('layouts.app')

@section('title', 'Modifier la pack')

@section('header', 'Modifier la pack')

@section('content')
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
        <form action="{{ route('pack.update',  $pack) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-white">Nom de la pack</label>
                <input type="text" name="name" value="{{ old('name', $pack->name) }}" 
                    class="w-full px-4 py-2 bg-gray-700 text-white rounded-md focus:ring-2 focus:ring-blue-600 @error('name') border-red-500 @enderror">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-white">Type de pack</label>
                <input type="text" name="type_pack" value="{{ old('type_pack', $pack->type_pack) }}" 
                    class="w-full px-4 py-2 bg-gray-700 text-white rounded-md focus:ring-2 focus:ring-blue-600 @error('type_pack') border-red-500 @enderror">
                @error('type_pack')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-white">Statut</label>
                <select name="statut" class="w-full px-4 py-2 bg-gray-700 text-white rounded-md focus:ring-2 focus:ring-blue-600 @error('statut') border-red-500 @enderror">
                    <option value="Disponible" {{ old('statut', $pack->statut) == 'Disponible' ? 'selected' : '' }}>Disponible</option>
                    <option value="Occupee" {{ old('statut', $pack->statut) == 'Occupee' ? 'selected' : '' }}>Occupée</option>
                    <option value="En-maintenance" {{ old('statut', $pack->statut) == 'En-maintenance' ? 'selected' : '' }}>En Maintenance</option>
                </select>
                @error('statut')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Mettre à Jour</button>
        </form>
    </div>
@endsection
