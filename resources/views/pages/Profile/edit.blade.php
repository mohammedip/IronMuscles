@extends('layouts.app')

@section('title', 'Modifier Mon Profil')

@section('header', 'Modifier Mon Profil')

@section('content')

<div class="bg-gray-900 p-8 rounded-xl shadow-lg mb-6">
    <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="flex items-center space-x-6 mb-4">
            <div class="w-28 h-28 bg-gray-700 rounded-full overflow-hidden border-4 border-blue-500">
                <img src="{{ $user->img ? asset('storage/' . $user->img) : asset('images/profile-picture.jpg') }}" alt="User Profile Picture" class="w-full h-full object-cover">
            </div>

            <div class="text-white">
                <h3 class="text-3xl font-semibold">{{ $user->name }}</h3>
                <p class="text-lg text-gray-300">Email: {{ $user->email }}</p>
            </div>
        </div>

        <!-- Profile Fields -->
        <div class="space-y-4 text-gray-300">
            <div class="flex justify-between">
                <label for="name" class="text-lg">Nom</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="bg-gray-800 text-white p-2 rounded-md" required>
                @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="flex items-center justify-between text-white">
                <label for="img" class="mr-4 whitespace-nowrap">Modifier la photo de profil</label>
                <input type="file" name="img" id="img" accept="image/*" class="bg-gray-800 text-white p-2 rounded-md w-1/6">
            </div>                                 

            <div class="flex justify-between">
                <label for="email" class="text-lg">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="bg-gray-800 text-white p-2 rounded-md" required>
                @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="flex justify-between">
                <label for="password" class="text-lg">Mot de passe (optionnel)</label>
                <input type="password" id="password" name="password" class="bg-gray-800 text-white p-2 rounded-md">
                @error('password') 
                    <span class="text-red-500">{{ $message }}</span> 
                @enderror
            </div>
            
            <div class="flex justify-between">
                <label for="password_confirmation" class="text-lg">Confirmer le mot de passe</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="bg-gray-800 text-white p-2 rounded-md">
            </div>   

            @role('adherent')
                <div class="flex justify-between">
                    <label for="numero_telephone" class="text-lg">Téléphone</label>
                    <input type="text" id="numero_telephone" name="numero_telephone" value="{{ old('numero_telephone', $adherent->numero_telephone) }}" class="bg-gray-800 text-white p-2 rounded-md">
                    @error('numero_telephone') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="flex justify-between">
                    <label for="adresse" class="text-lg">Adresse</label>
                    <input type="text" id="adresse" name="adresse" value="{{ old('adresse', $adherent->adresse) }}" class="bg-gray-800 text-white p-2 rounded-md">
                    @error('adresse') <span class="text-red-500">{{ $message }}</span> @enderror

                </div>
            @endrole

            @role('coach')
                <div class="flex justify-between">
                    <label for="numero_telephone" class="text-lg">Téléphone</label>
                    <input type="text" id="numero_telephone" name="numero_telephone" value="{{ old('numero_telephone', $coach->numero_telephone) }}" class="bg-gray-800 text-white p-2 rounded-md">
                    @error('numero_telephone') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="flex justify-between">
                    <label for="id_specialite" class="text-lg">Spécialité</label>
                    <select name="id_specialite" id="id_specialite" class="bg-gray-800 text-white px-12 py-2 rounded-md">
                        @foreach($specialties as $specialty)
                            <option value="{{ $specialty->id }}" 
                                    {{ $coach->id_specialite == $specialty->id ? 'selected' : '' }}>
                                {{ $specialty->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            @endrole
        </div>

        <div class="mt-6 text-center">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition duration-200">
                Mettre à jour le Profil
            </button>
        </div>
    </form>
</div>

@endsection
