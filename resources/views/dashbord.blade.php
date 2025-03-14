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
            <!-- Add a container with a specific height to control chart size -->
            <div class="relative h-58">
                <canvas id="doughnutChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Table: Adhérents -->
    <div class="bg-gray-800 p-6 rounded mb-6">
        <h3 class="text-lg mb-3">Liste des Adhérents</h3>
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
                <tr class="text-center">
                    <td class="p-2 border border-gray-600">Jean Dupont</td>
                    <td class="p-2 border border-gray-600">jean.dupont@mail.com</td>
                    <td class="p-2 border border-gray-600">Annuel</td>
                    <td class="p-2 border border-gray-600 text-green-400">Actif</td>
                </tr>
                <tr class="text-center">
                    <td class="p-2 border border-gray-600">Sophie Martin</td>
                    <td class="p-2 border border-gray-600">sophie.martin@mail.com</td>
                    <td class="p-2 border border-gray-600">Mensuel</td>
                    <td class="p-2 border border-gray-600 text-red-400">Expiré</td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection

@section('chartScripts')
    <script>
        // Bar Chart - Adhésions par Mois
        const ctxBar = document.getElementById('barChart').getContext('2d');
        new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc'],
                datasets: [{
                    label: 'Adhésions',
                    data: [40, 55, 60, 80, 75, 90, 110, 95, 85, 100, 120, 130],
                    backgroundColor: 'rgba(54, 162, 235, 0.5)'
                }]
            }
        });

        // Doughnut Chart - Statut des Abonnements
        const ctxDoughnut = document.getElementById('doughnutChart').getContext('2d');
        new Chart(ctxDoughnut, {
            type: 'doughnut',
            data: {
                labels: ['Actifs', 'Expirés', 'Suspendus'],
                datasets: [{
                    data: [60, 25, 15],
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
