@extends('layouts.app')

@section('title', 'Créer un Entraînement')

@section('content')
<div class="max-w-3xl mx-auto bg-gray-900 p-8 rounded-xl shadow-lg">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-semibold text-white mb-4">Créer un Entraînement</h2>
        <a href="{{ route('entrainement.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white py-2 px-4 rounded-md transition">
            Retour
        </a>

    </div>

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
                <option value="" disabled selected hidden>Sélectionner un adhérent</option>
                @foreach ($adherents as $adherent)
                    <option value="{{ $adherent->id }}">{{ $adherent->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="date_debut" class="block text-white mb-2">Date de début</label>
            <input type="date" id="date_debut" name="date_debut" required class="w-full bg-gray-800 text-white p-2 rounded-md" min="{{ now()->addDay()->toDateString() }}" value="{{ now()->addDay()->toDateString() }}">
            @error('date_debut') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>    

        <div id="programme-container" >
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl text-white">Programme d'entraînement</h3>
                <button type="button" onclick="addJour()" class="bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-md transition">
                    Ajouter un jour
                </button>
            </div> 

            <div id="dynamic-days" class="max-h-96 overflow-y-auto"></div>
            <input type="hidden" id="lastJour" value="0">

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

let jourCounter=0;
    function addJour() {
        const container = document.getElementById('dynamic-days');
         jourCounter++;
        document.getElementById('lastJour').value = jourCounter;

        const html = `
            <div id="day-wrapper-${jourCounter}">
               <div class="flex justify-between items-center">
                    <button type="button" class="w-full text-left bg-gray-800 text-white p-2 rounded-md mb-2" onclick="toggleDay(${jourCounter})">
                        Jour ${jourCounter} <span id="toggle-icon-${jourCounter}">+</span>
                    </button>
                    <button type="button" onclick="deleteJour(${jourCounter})" class="text-red-500 hover:text-red-700 ml-2 text-lg">X</button>
                </div>
                <div id="day-${jourCounter}" class="day-details hidden bg-gray-700 p-4 rounded-md">
                    <label class="text-white font-semibold mb-2 block">Exercices :</label>
                    <input type="text" name="jours[${jourCounter}][exercices]" class="w-full bg-gray-800 text-white p-2 rounded-md mb-2" placeholder="Ex: Chest, Triceps">

                    <label class="text-white font-semibold mb-2 block">Machine :</label>
                    <select name="jours[${jourCounter}][id_machine]" class="w-full bg-gray-800 text-white p-2 rounded-md mb-2">
                        <option value="">Sélectionner une machine</option>
                        @foreach ($machines as $machine)
                            <option value="{{ $machine->id }}">{{ $machine->name }}</option>
                        @endforeach
                    </select>

                    <label class="text-white font-semibold mb-2 block">Heure :</label>
                    <input type="time" name="jours[${jourCounter}][heure]" class="w-full bg-gray-800 text-white p-2 rounded-md" required  min="09:00" 
    max="18:00">
                </div>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', html);
    }

    function toggleDay(dayCount) {
        const details = document.getElementById(`day-${dayCount}`);
        const icon = document.getElementById(`toggle-icon-${dayCount}`);
        if (details.classList.contains('hidden')) {
            details.classList.remove('hidden');
            icon.textContent = '-';
        } else {
            details.classList.add('hidden');
            icon.textContent = '+';
        }
    }

    function deleteJour(jourNumber) {
        const dayBlock = document.getElementById(`day-wrapper-${jourNumber}`);
        if (dayBlock) {
            dayBlock.remove();
        }
    }
</script>
@endsection
