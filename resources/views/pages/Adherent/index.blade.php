@extends('layouts.app')

@section('title', 'Adhérents')

@section('header', 'Liste des Adhérents')

@section('content')
    <!-- Members Table -->
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg mb-6">
        <h3 class="text-lg mb-4 font-semibold">Liste des Adhérents</h3>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-gray-800 text-white border-collapse">
                <thead>
                    <tr class="bg-gray-700">
                        <th class="p-3 text-left border border-gray-600">Nom</th>
                        <th class="p-3 text-left border border-gray-600">Email</th>
                        <th class="p-3 text-left border border-gray-600">Abonnement</th>
                        <th class="p-3 text-left border border-gray-600">Date d'adhésion</th>
                        <th class="p-3 text-center border border-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="p-3 border border-gray-600">Jean Dupont</td>
                        <td class="p-3 border border-gray-600">jean.dupont@mail.com</td>
                        <td class="p-3 border border-gray-600">Annuel</td>
                        <td class="p-3 border border-gray-600">12/05/2023</td>
                        <td class="p-3 text-center border border-gray-600">
                            <a href="#" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md">Voir</a>
                            <a href="#" class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-md">Modifier</a>
                            <a href="#" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-md">Supprimer</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="p-3 border border-gray-600">Sophie Martin</td>
                        <td class="p-3 border border-gray-600">sophie.martin@mail.com</td>
                        <td class="p-3 border border-gray-600">Mensuel</td>
                        <td class="p-3 border border-gray-600">01/06/2023</td>
                        <td class="p-3 text-center border border-gray-600">
                            <a href="#" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md">Voir</a>
                            <a href="#" class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-md">Modifier</a>
                            <a href="#" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-md">Supprimer</a>
                        </td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
    </div>
@endsection
