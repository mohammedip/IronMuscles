@extends('layouts.app')

@section('title', 'Machines')

@section('header', 'Machines')

@section('content')
    <!-- Machine Filters -->
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg mb-6">
        <h3 class="text-lg font-semibold mb-4">Filtrer par</h3>
        <div class="flex space-x-4">
            <div class="w-1/3">
                <label for="status" class="block text-sm text-white">Statut</label>
                <select id="status" class="px-4 py-2 w-full bg-gray-700 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600">
                    <option value="">Tous</option>
                    <option value="available">Disponible</option>
                    <option value="in-use">En Utilisation</option>
                    <option value="maintenance">En Maintenance</option>
                </select>
            </div>

            <div class="w-1/3">
                <label for="type" class="block text-sm text-white">Type de Machine</label>
                <select id="type" class="px-4 py-2 w-full bg-gray-700 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600">
                    <option value="">Tous</option>
                    <option value="cardio">Cardio</option>
                    <option value="strength">Musculation</option>
                    <option value="flexibility">Flexibilité</option>
                    <option value="functional">Fonctionnel</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Machine List -->
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
        <h3 class="text-lg font-semibold mb-4">Liste des Machines</h3>
        <table class="w-full border-collapse border border-gray-700">
            <thead>
                <tr class="bg-gray-700">
                    <th class="p-3 text-left text-sm text-white">Nom de la Machine</th>
                    <th class="p-3 text-left text-sm text-white">Type</th>
                    <th class="p-3 text-left text-sm text-white">Statut</th>
                    <th class="p-3 text-left text-sm text-white">Dernière Maintenance</th>
                    <th class="p-3 text-left text-sm text-white">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example Row 1 -->
                <tr class="text-center">
                    <td class="p-3 border border-gray-600">Tapis de Course</td>
                    <td class="p-3 border border-gray-600">Cardio</td>
                    <td class="p-3 border border-gray-600 text-green-400">Disponible</td>
                    <td class="p-3 border border-gray-600">01/03/2025</td>
                    <td class="p-3 border border-gray-600">
                        <button class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600">Maintenance</button>
                        <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 mt-2">Marquer en Utilisation</button>
                    </td>
                </tr>

                <!-- Example Row 2 -->
                <tr class="text-center">
                    <td class="p-3 border border-gray-600">Presse à Cuisses</td>
                    <td class="p-3 border border-gray-600">Musculation</td>
                    <td class="p-3 border border-gray-600 text-red-400">En Maintenance</td>
                    <td class="p-3 border border-gray-600">15/02/2025</td>
                    <td class="p-3 border border-gray-600">
                        <button class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600">Maintenance</button>
                        <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 mt-2">Marquer en Utilisation</button>
                    </td>
                </tr>

                <!-- More rows can be added here -->
            </tbody>
        </table>
    </div>
@endsection
