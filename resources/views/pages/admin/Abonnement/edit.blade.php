@extends('layouts.app')

@section('title', 'Modifier l\'Abonnement')

@section('header', 'Modifier l\'Abonnement')

@section('content')
<!-- Success message -->
@if (session('success'))
    <div class="bg-green-500 text-white p-3 mb-4 rounded-md">
        {{ session('success') }}
    </div>
@endif


<!-- Update Abonnement Form -->
<div class="bg-gray-800 p-6 rounded-lg shadow-lg mb-6">
    <form action="{{ route('abonnement.update', $abonnement) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- Type Abonnement -->
            <div class="flex flex-col">
                <label for="type_Abonnement" class="text-white font-semibold mb-2">Type d'Abonnement</label>
                <select 
                    name="type_Abonnement" 
                    id="type_Abonnement"
                    class="bg-gray-700 text-white border border-gray-600 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition" 
                    required
                >
                    <option value="Mensuel" {{ old('type_Abonnement', $abonnement->type_Abonnement) === 'Mensuel' ? 'selected' : '' }}>Mensuel</option>
                    <option value="Trimestriel" {{ old('type_Abonnement', $abonnement->type_Abonnement) === 'Trimestriel' ? 'selected' : '' }}>Trimestriel</option>
                    <option value="Semi-annuel" {{ old('type_Abonnement', $abonnement->type_Abonnement) === 'Semi-annuel' ? 'selected' : '' }}>Semi-annuel</option>
                    <option value="Annuel" {{ old('type_Abonnement', $abonnement->type_Abonnement) === 'Annuel' ? 'selected' : '' }}>Annuel</option>
                </select>
                
                @error('type_Abonnement')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror                
            </div>

            <!-- Prix -->
            <div class="flex flex-col">
                <label for="prix" class="text-white font-semibold mb-2">Prix (DH)</label>
                <input type="number" name="prix" id="prix" value="{{ old('prix', $abonnement->prix) }}" 
                       class="bg-gray-700 text-white border border-gray-600 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition" required>
                @error('prix')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Date Début -->
            <div class="flex flex-col">
                <label for="date_Debut" class="text-white font-semibold mb-2">Date de Début</label>
                <input type="date" name="date_Debut" id="date_Debut" value="{{ old('date_Debut', $abonnement->date_Debut) }}" 
                       class="bg-gray-700 text-white border border-gray-600 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition" required>
                @error('date_Debut')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Date Fin -->
            <div class="flex flex-col">
                <label for="date_Fin" class="text-white font-semibold mb-2">Date de Fin</label>
                <input type="date" name="date_Fin" id="date_Fin" value="{{ old('date_Fin', $abonnement->date_Fin) }}" 
                       class="bg-gray-700 text-white border border-gray-600 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition" required>
                @error('date_Fin')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

        </div>

        <!-- Submit Button -->
        <div class="flex justify-end mt-6">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md">
                Mettre à jour
            </button>
        </div>
    </form>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const typeAbonnement = document.getElementById('type_Abonnement');
        const dateDebut = document.getElementById('date_Debut');
        const dateFin = document.getElementById('date_Fin');
        const prix = document.getElementById('prix');
    
        function updateDateFin() {
            const startDate = new Date(dateDebut.value);
            if (!dateDebut.value) return; 
    
            let endDate = new Date(startDate);
            const type = typeAbonnement.value;
    
            if (type === 'Mensuel') {
                endDate.setMonth(startDate.getMonth() + 1);
                prix.value = 150;
            } else if (type === 'Trimestriel') {
                endDate.setMonth(startDate.getMonth() + 3);
                prix.value = 400;
            } else if (type === 'Semi-annuel') {
                endDate.setMonth(startDate.getMonth() + 6);
                prix.value = 800;
            } else if (type === 'Annuel') {
                endDate.setFullYear(startDate.getFullYear() + 1);
                prix.value = 1500;
            }
    
            const year = endDate.getFullYear();
            const month = String(endDate.getMonth() + 1).padStart(2, '0');
            const day = String(endDate.getDate()).padStart(2, '0');
            dateFin.value = `${year}-${month}-${day}`;
        }
    
        typeAbonnement.addEventListener('change', updateDateFin);
        dateDebut.addEventListener('change', updateDateFin);
    
        if (dateDebut.value) {
            updateDateFin();
        }
    });
    </script>
@endsection
