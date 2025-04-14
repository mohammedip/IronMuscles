@extends('layouts.app')

@section('title', 'Modifier Entraînement')

@section('content')
<div class="max-w-3xl mx-auto bg-gray-900 p-8 rounded-xl shadow-lg">
    <h2 class="text-2xl font-semibold text-white mb-4">Modifier un Entraînement</h2>

    <form action="{{ route('entrainement.update', $entrainement->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-white mb-2">Adhérent</label>
            <select name="id_adherent" class="w-full bg-gray-800 text-white p-2 rounded-md">
                @foreach ($adherents as $adherent)
                    <option value="{{ $adherent->id }}" {{ $adherent->id == $entrainement->id_adherent ? 'selected' : '' }}>
                        {{ $adherent->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-white mb-2">Date de début</label>
            <input type="date" name="date_debut" id="date_debut" value="{{ $entrainement->date_debut }}" class="w-full bg-gray-800 text-white p-2 rounded-md" required>
        </div>

        <div class="mb-4">
            <label class="block text-white mb-2">Date de fin</label>
            <input type="date" name="date_fin" id="date_fin" value="{{ $entrainement->date_fin }}" class="w-full bg-gray-800 text-white p-2 rounded-md" required>
        </div>

        <div id="programme-container">
            <h3 class="text-xl text-white mb-2">Programme d'entraînement</h3>
            <!-- Dynamic Days Content -->
            <div id="dynamic-days">
                @foreach ($entrainement->jours as $jour)
                    <div class="day-group mb-4" id="day-{{ $jour->jour_numero }}">
                        <label class="text-white font-semibold block mb-2">Jour {{ $jour->jour_numero }}</label>
                        
                        <input type="text" name="jours[{{ $jour->jour_numero }}][exercices]" value="{{ $jour->exercices }}" class="w-full bg-gray-800 text-white p-2 rounded-md mb-2">

                        <select name="jours[{{ $jour->jour_numero }}][id_machine]" class="w-full bg-gray-800 text-white p-2 rounded-md mb-2">
                            @foreach ($machines as $machine)
                                <option value="{{ $machine->id }}" {{ $machine->id == $jour->id_machine ? 'selected' : '' }}>{{ $machine->name }}</option>
                            @endforeach
                        </select>

                        <input type="time" name="jours[{{ $jour->jour_numero }}][heure]" value="{{ $jour->heure }}" class="w-full bg-gray-800 text-white p-2 rounded-md">
                    </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition">
            Mettre à jour
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
            let dynamicContainer = document.getElementById('dynamic-days');
            dynamicContainer.innerHTML = ''; 

            let currentDate = new Date(startDate);
            let endDateObj = new Date(endDate);
            let dayCount = 1;

            while (currentDate <= endDateObj) {
                let dayInput = document.createElement('div');
                dayInput.classList.add('day-group', 'mb-4');
                let dayName = currentDate.toLocaleDateString('fr-FR', { weekday: 'long' }).toUpperCase();

                let daySection = `
                    <button class="w-full text-left bg-gray-800 text-white p-2 rounded-md mb-2" onclick="toggleDay(${dayCount})">
                        Jour ${dayCount} (${dayName}) <span id="toggle-icon-${dayCount}">+</span>
                    </button>
                    <div id="day-${dayCount}" class="day-details hidden bg-gray-700 p-4 rounded-md">
                        <label class="text-white font-semibold mb-2 block">Exercices:</label>
                        <input type="text" name="jours[${dayCount}][exercices]" class="w-full bg-gray-800 text-white p-3 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-600 transition duration-200" placeholder="Ex: Chest, Triceps">

                        <select name="jours[${dayCount}][id_machine]" class="w-full bg-gray-800 text-white p-3 rounded-lg shadow-md mt-4 focus:outline-none focus:ring-2 focus:ring-blue-600 transition duration-200">
                            <option value="">Sélectionner une machine</option>
                            @foreach ($machines as $machine)
                                <option value="{{ $machine->id }}">{{ $machine->name }}</option>
                            @endforeach
                        </select>

                        <input type="time" name="jours[${dayCount}][heure]" class="w-full bg-gray-800 text-white p-3 rounded-lg shadow-md mt-4 focus:outline-none focus:ring-2 focus:ring-blue-600 transition duration-200" required>
                    </div>
                `;

                dynamicContainer.innerHTML += daySection;

                currentDate.setDate(currentDate.getDate() + 1);
                dayCount++;
            }
        }
    }

    function toggleDay(dayCount) {
        const dayDetails = document.getElementById(`day-${dayCount}`);
        const toggleIcon = document.getElementById(`toggle-icon-${dayCount}`);
        if (dayDetails.classList.contains('hidden')) {
            dayDetails.classList.remove('hidden');
            toggleIcon.textContent = '-';
        } else {
            dayDetails.classList.add('hidden');
            toggleIcon.textContent = '+';
        }
    }

    generateDays();
</script>
@endsection
