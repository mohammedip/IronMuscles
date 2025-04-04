@extends('layouts.app')

@section('title', 'Tableau de Bord')

@section('header', 'Tableau de Bord')

@section('content')
    <!-- Stats Cards -->
    @include('components.stats-cards')

    <!-- Charts -->
    <div class="grid grid-cols-2 gap-6 mb-6">
        <div class="bg-gray-800 p-6 rounded">
            <h3 class="text-lg mb-3">Adhésions par Mois</h3>
            <canvas id="barChart"></canvas>
        </div>
        <div class="bg-gray-800 p-6 rounded">
            <h3 class="text-lg mb-3">Statut des Abonnements</h3>
            <div class="relative h-58">
                <canvas id="doughnutChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Table: Adhérents -->
    <div class="bg-gray-800 p-6 rounded mb-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg">Quelques adhérents</h3>
            <a href="{{ route('adherent.index') }}" 
               class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-md">
                List des Adhérents
            </a>
        </div>
        <table class="w-full border-collapse border border-gray-700">
            <thead>
                <tr class="bg-gray-700">
                    <th class="p-2 border border-gray-600">Nom</th>
                    <th class="p-2 border border-gray-600">Email</th>
                    <th class="p-2 border border-gray-600">Abonnement</th>
                    <th class="p-2 border border-gray-600">Statut</th>
                </tr>
            </thead>
            <tbody>
                @foreach($adherents as $adherent)
                <tr class="text-center">
                    <td class="p-2 border border-gray-600">{{ $adherent->name }}</td>
                    <td class="p-2 border border-gray-600">{{ $adherent->email }}</td>
                    <td class="p-2 border border-gray-600 
                        {{ $adherent->statut_abonnement ? 'text-green-400' : 'text-red-400' }}">
                        {{ $adherent->statut_abonnement ? 'Actif' : 'Inactif' }}
                    </td>
                    <td class="p-2 border border-gray-600 
                        {{ $adherent->is_activate ? 'text-green-400' : 'text-red-400' }}">
                        {{ $adherent->is_activate ? 'Actif' : 'Expiré' }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('chartScripts')
    <script>
       
        const ctxBar = document.getElementById('barChart').getContext('2d');
        new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc'],
                datasets: [{
                    label: 'Adhésions',
                    data: @json(array_values($mois)), 
                    backgroundColor: 'rgba(54, 162, 235, 0.5)'
                }]
            }
        });


        const ctxDoughnut = document.getElementById('doughnutChart').getContext('2d');
        new Chart(ctxDoughnut, {
            type: 'doughnut',
            data: {
                labels: @json(array_keys($subscriptionStats)), 
                datasets: [{
                    data: @json(array_values($subscriptionStats)), 
                    backgroundColor: ['#4CAF50', '#F44336', '#FF9800']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });
    </script>
@endsection
