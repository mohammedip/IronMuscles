@extends('layouts.app')

@section('title', 'Créer un Entraînement')

@section('content')
<div class="max-w-3xl mx-auto bg-gray-900 p-8 rounded-xl shadow-lg">
    <h2 class="text-2xl font-semibold text-white mb-4">Créer un Entraînement</h2>

    @if (session('success'))
        <div class="bg-green-500 text-white p-3 rounded-md mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('entrainement.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="id_adherent" class="block text-white mb-2">Adhérent</label>
            <select id="id_adherent" name="id_adherent" required class="w-full bg-gray-800 text-white p-2 rounded-md">
                <option value="">Sélectionner un adhérent</option>
                @foreach ($adherents as $adherent)
                    <option value="{{ $adherent->id }}">{{ $adherent->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="date_debut" class="block text-white mb-2">Date de début</label>
            <input type="date" id="date_debut" name="date_debut" required class="w-full bg-gray-800 text-white p-2 rounded-md" min="{{ now()->addDay()->toDateString() }}">
            @error('date_debut') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label for="date_fin" class="block text-white mb-2">Date de fin</label>
            <input type="date" id="date_fin" name="date_fin" required class="w-full bg-gray-800 text-white p-2 rounded-md" min="{{ now()->addDay()->toDateString() }}">
            @error('date_fin') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>     
        
        <div id="programme-container">
            <h3 class="text-xl text-white mb-2">Programme d'entraînement</h3>

            <div class="day-group">
               
                @error('jours.*.exercices') <span class="text-red-500">{{ $message }}</span> @enderror
                @error('jours.*.id_machine') <span class="text-red-500">{{ $message }}</span> @enderror
                @error('jours.*.heure') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition">
            Ajouter Entraînement
        </button>
    </form>
</div>

<script>
   document.getElementById('date_debut').addEventListener('change', generateDays);
    document.getElementById('date_fin').addEventListener('change', generateDays);

    function generateDays() {
        let startDate = document.getElementById('date_debut').value;
        let endDate = document.getElementById('date_fin').value;

        if (startDate && endDate) {

            let container = document.getElementById('programme-container');
            container.innerHTML = '<h3 class="text-xl text-white mb-2">Programme d\'entraînement</h3>'; 

            let currentDate = new Date(startDate);
            let endDateObj = new Date(endDate);
            let dayCount = 1;


            while (currentDate <= endDateObj) {
                let dayInput = document.createElement('div');
                dayInput.classList.add('day-group', 'mb-2');
                let dayName = currentDate.toLocaleDateString('fr-FR', { weekday: 'long' }).toUpperCase();

                dayInput.innerHTML = `
                <label class="text-white font-semibold mb-2 block">Jour ${dayCount} (${dayName}):</label>
                <input type="text" name="jours[${dayCount}][exercices]" class="w-full bg-gray-800 text-white p-3 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-600 transition duration-200" placeholder="Ex: Chest, Triceps">

                <select name="jours[${dayCount}][id_machine]" required class="w-full bg-gray-800 text-white p-3 rounded-lg shadow-md mt-4 focus:outline-none focus:ring-2 focus:ring-blue-600 transition duration-200">
                    <option value="">Sélectionner une machine</option>
                    @foreach ($machines as $machine)
                        <option value="{{ $machine->id }}">{{ $machine->name }}</option>
                    @endforeach
                </select>

                <input type="time" name="jours[${dayCount}][heure]" class="w-full bg-gray-800 text-white p-3 rounded-lg shadow-md mt-4 focus:outline-none focus:ring-2 focus:ring-blue-600 transition duration-200" required>
                `;

                container.appendChild(dayInput);

                currentDate.setDate(currentDate.getDate() + 1);
                dayCount++;
            }
        }
    }

</script>
@endsection
