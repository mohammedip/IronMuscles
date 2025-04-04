@extends('layouts.app')

@section('title', 'Mon Profil')

@section('header', 'Mon Profil')

@section('content')

<div class="bg-gray-900 p-8 rounded-xl shadow-lg mb-6">
    <div class="flex items-center space-x-6">
        <!-- Profile Picture -->
        <div class="w-28 h-28 bg-gray-700 rounded-full overflow-hidden border-4 border-blue-500">
            <img src="{{ asset('images/profile-picture.jpg') }}" alt="User Profile Picture" class="w-full h-full object-cover">
        </div>

        <!-- User Info -->
        <div class="text-white">
            <h3 class="text-3xl font-semibold">{{ $user->name }}</h3>
            <p class="text-lg text-gray-300">Email: {{ $user->email }}</p>

            @role('adherent')
                <p class="text-lg text-gray-300">Téléphone: {{ $adherent->numero_telephone }}</p>
                <p class="text-lg text-gray-300">Adresse: {{ $adherent->adresse }}</p>
            @endrole    
            @role('coach')
                <p class="text-lg text-gray-300">Téléphone: {{ $coach->numero_telephone }}</p>
                <p class="text-lg text-gray-300">Spécialité: {{ $coach->speciality->name }}</p>
                <p class="text-lg text-gray-300">Date de recrutement: {{ \Carbon\Carbon::parse($coach->date_recrutement)->format('d M Y') }}</p>
            @endrole
            @role('admin')
                <p class="text-lg text-gray-300">Rôle: {{ $user->role->name }}</p>
            @endrole
        </div>
      
    </div>
      <div class="mt-6 text-center">
            <a href="{{route('profil.edit')}}" 
               class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition duration-200">
               Modifier le Profil
            </a>
        </div>
</div>

@role( 'adherent')
    <!-- Membership Details Section -->
    <div class="bg-gray-900 p-8 rounded-xl shadow-lg mb-6">
        <h3 class="text-2xl font-semibold text-white mb-4">Détails de l'Abonnement</h3>
        @if ($abonnement)
            <div class="space-y-4 text-gray-300">
                <div class="flex justify-between">
                    <span class="text-lg">Type d'Abonnement</span>
                    <span class="text-lg font-semibold text-blue-400">
                        {{ $abonnement->type_Abonnement }}
                    </span>
                </div>
                <div class="flex justify-between">
                    <span class="text-lg">Date de début</span>
                    <span class="text-lg">
                        {{ \Carbon\Carbon::parse($abonnement->date_Debut)->format('d M Y') }}
                    </span>
                </div>
                <div class="flex justify-between">
                    <span class="text-lg">Date d'expiration</span>
                    <span class="text-lg">
                        {{ \Carbon\Carbon::parse($abonnement->date_Fin)->format('d M Y') }}
                    </span>
                </div>
                <div class="flex justify-between">
                    <span class="text-lg">Prix</span>
                    <span class="text-lg font-semibold text-green-400">
                        {{ number_format($abonnement->prix, 2, ',', ' ') }} DH
                    </span>
                </div>
                <div class="flex justify-between">
                    <span class="text-lg">Statut</span>
                    <span class="text-lg font-semibold {{ $abonnementStatus == 'Actif' ? 'text-green-400' : 'text-red-400' }}">
                        {{ $abonnementStatus }}
                    </span>
                </div>
            </div>

            <!-- Historique Abonnement Button -->
            <div class="mt-6 text-center">
                <a href="{{ route('abonnement.index') }}" 
                   class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition duration-200">
                    Historique Abonnement
                </a>
            </div>

        @else
            <p class="text-red-400 text-lg">Aucun abonnement actif</p>
        @endif
    </div>

    <!-- Workout Plan Section -->
    <div class="bg-gray-900 p-8 rounded-xl shadow-lg mb-6">
        <h3 class="text-2xl font-semibold text-white mb-4">Mon Plan d'Entraînement</h3>
        @if ($entrainement)
            <div class="space-y-4 text-gray-300">
                <div class="flex justify-between">
                    <span class="text-lg">Plan</span>
                    <span class="text-lg"> {{$entrainement->coach->speciality->name}}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-lg">Coach</span>
                    <span class="text-lg">{{$entrainement->coach->name}}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-lg">Prochain entraînement</span>
                    <span class="text-lg">{{ $nextTrainingDay }}</span>
                </div>
            </div>
            <div class="mt-6 text-center">
                <a href="{{ route('planning.index') }}" 
                class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition duration-200">
                Mon plan d'entrainement
                </a>
            </div>
        @else
        <p class="text-red-400 text-lg">Aucun entrainement</p>
        @endif
    </div>
@endrole


@endsection
