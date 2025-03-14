@extends('layouts.app')

@section('title', 'Liste des Coaches')

@section('header', 'Liste des Coaches')

@section('content')

<div class="max-w-5xl mx-auto bg-gray-800 p-6 rounded shadow-md">
    <h2 class="text-center text-xl font-semibold mb-4">Liste des Coaches</h2>

    <!-- Coaches Table -->
    <table class="w-full table-auto border-collapse border border-gray-600 text-white">
        <thead>
            <tr class="bg-gray-700">
                <th class="border border-gray-600 p-3">ID</th>
                <th class="border border-gray-600 p-3">Nom</th>
                <th class="border border-gray-600 p-3">Prénom</th>
                <th class="border border-gray-600 p-3">Spécialité</th>
                <th class="border border-gray-600 p-3">Numéro Téléphone</th>
                <th class="border border-gray-600 p-3">Email</th>
                <th class="border border-gray-600 p-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Exemple de données statiques -->
            <tr class="bg-gray-900 hover:bg-gray-700">
                <td class="border border-gray-600 p-3 text-center">C001</td>
                <td class="border border-gray-600 p-3">Doe</td>
                <td class="border border-gray-600 p-3">John</td>
                <td class="border border-gray-600 p-3">Musculation</td>
                <td class="border border-gray-600 p-3">06 12 34 56 78</td>
                <td class="border border-gray-600 p-3">john.doe@example.com</td>
                <td class="border border-gray-600 p-3 text-center">
                    <a href="#" class="text-blue-500 hover:underline">Modifier</a> |
                    <a href="#" class="text-red-500 hover:underline">Supprimer</a>
                </td>
            </tr>
            <tr class="bg-gray-900 hover:bg-gray-700">
                <td class="border border-gray-600 p-3 text-center">C002</td>
                <td class="border border-gray-600 p-3">Smith</td>
                <td class="border border-gray-600 p-3">Jane</td>
                <td class="border border-gray-600 p-3">Entraînement personnalisé</td>
                <td class="border border-gray-600 p-3">07 89 01 23 45</td>
                <td class="border border-gray-600 p-3">jane.smith@example.com</td>
                <td class="border border-gray-600 p-3 text-center">
                    <a href="#" class="text-blue-500 hover:underline">Modifier</a> |
                    <a href="#" class="text-red-500 hover:underline">Supprimer</a>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Add New Coach Button -->
    <div class="text-center mt-6">
        <a href="{{ route('Coach.create') }}" 
           class="bg-blue-600 px-4 py-2 rounded text-white font-semibold hover:bg-blue-700">
           Ajouter un Coach
        </a>
    </div>
</div>

@endsection
