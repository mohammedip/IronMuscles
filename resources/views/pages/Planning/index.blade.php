@extends('layouts.app')

@section('title', 'Planning')

@section('header', 'Planning des Cours')

@section('content')
    <!-- Planning Filters -->
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg mb-6">
        <h3 class="text-lg font-semibold mb-4">Filtrer par</h3>
        <div class="flex space-x-4">
            <div class="w-1/3">
                <label for="trainer" class="block text-sm text-white">Enseignant</label>
                <select id="trainer" class="px-4 py-2 w-full bg-gray-700 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600">
                    <option value="">Tous</option>
                    <option value="trainer1">Jean Dupont</option>
                    <option value="trainer2">Sophie Martin</option>
                    <option value="trainer3">Michel Leblanc</option>
                </select>
            </div>

            <div class="w-1/3">
                <label for="course" class="block text-sm text-white">Type de Cours</label>
                <select id="course" class="px-4 py-2 w-full bg-gray-700 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600">
                    <option value="">Tous</option>
                    <option value="yoga">Yoga</option>
                    <option value="fitness">Fitness</option>
                    <option value="crossfit">Crossfit</option>
                    <option value="zumba">Zumba</option>
                </select>
            </div>

            <div class="w-1/3">
                <label for="date" class="block text-sm text-white">Date</label>
                <input type="date" id="date" class="px-4 py-2 w-full bg-gray-700 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600">
            </div>
        </div>
    </div>

    <!-- Weekly Schedule -->
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
        <h3 class="text-lg font-semibold mb-4">Planning des Cours</h3>
        <div class="grid grid-cols-7 gap-4">
            <div class="text-center text-white font-semibold">Lundi</div>
            <div class="text-center text-white font-semibold">Mardi</div>
            <div class="text-center text-white font-semibold">Mercredi</div>
            <div class="text-center text-white font-semibold">Jeudi</div>
            <div class="text-center text-white font-semibold">Vendredi</div>
            <div class="text-center text-white font-semibold">Samedi</div>
            <div class="text-center text-white font-semibold">Dimanche</div>

            <!-- Sample class for each day -->
            <div class="bg-gray-700 p-4 text-center rounded-lg">
                <h4 class="text-sm font-semibold">Yoga</h4>
                <p class="text-xs text-gray-300">9:00 AM - 10:00 AM</p>
                <p class="text-xs text-gray-400">Enseignant: Jean Dupont</p>
            </div>

            <div class="bg-gray-700 p-4 text-center rounded-lg">
                <h4 class="text-sm font-semibold">Fitness</h4>
                <p class="text-xs text-gray-300">10:30 AM - 11:30 AM</p>
                <p class="text-xs text-gray-400">Enseignant: Sophie Martin</p>
            </div>

            <div class="bg-gray-700 p-4 text-center rounded-lg">
                <h4 class="text-sm font-semibold">Zumba</h4>
                <p class="text-xs text-gray-300">1:00 PM - 2:00 PM</p>
                <p class="text-xs text-gray-400">Enseignant: Michel Leblanc</p>
            </div>

            <div class="bg-gray-700 p-4 text-center rounded-lg">
                <h4 class="text-sm font-semibold">Crossfit</h4>
                <p class="text-xs text-gray-300">4:00 PM - 5:00 PM</p>
                <p class="text-xs text-gray-400">Enseignant: Jean Dupont</p>
            </div>

            <!-- Repeat for each day as needed -->

        </div>
    </div>
@endsection
