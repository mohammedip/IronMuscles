@extends('layouts.app')

@section('title', 'Liste des Coaches')

@section('header', 'Liste des Coaches')

@section('content')

    @if (session('success'))
        <div class="bg-green-500 text-white p-3 mb-4 rounded-md">
            {{ session('success') }}
        </div>
    @endif

<div class="max-w-5xl mx-auto bg-gray-800 p-6 rounded shadow-md">
    <div class="flex justify-between mb-4">
        <h2 class="text-center text-xl font-semibold mb-4">Liste des Coaches</h2>
        @include('components.searchInput', ['action' => route('coachs.search')])
        <select 
        class="table-filter bg-gray-700 text-white border border-gray-600 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
       id="coach-filter" data-endpoint="{{ route('coachs.filter') }}" name="filter"
        data-target="#coach-table-body"
    >            <option value="">All</option>
            @forEach ($specialities as $speciality)
                <option value="{{ $speciality->id }}">{{ $speciality->name }}</option>
            @endforEach
        </select>
    </div>

    <!-- Coaches Table -->
    <table class="w-full table-auto border-collapse border border-gray-600 text-white">
        <thead>
            <tr class="bg-gray-700">
                <th class="border border-gray-600 p-3">ID</th>
                <th class="border border-gray-600 p-3">Nom</th>
                <th class="border border-gray-600 p-3">Spécialité</th>
                <th class="border border-gray-600 p-3">Numéro Téléphone</th>
                <th class="border border-gray-600 p-3">Email</th>
                <th class="border border-gray-600 p-3">Date de recrutement</th>
                <th class="border border-gray-600 p-3">Actions</th>
            </tr>
        </thead>
        <tbody id="coach-table-body">
            @forelse ($coaches as $coach)
                <tr class="bg-gray-800">
                    <td class="border border-gray-600 p-3 text-center">{{ $coach->id }}</td>
                    <td class="border border-gray-600 p-3">{{ $coach->name }}</td>
                    <td class="border border-gray-600 p-3">{{ $coach->speciality->name }}</td>
                    <td class="border border-gray-600 p-3">{{ $coach->numero_telephone }}</td>
                    <td class="border border-gray-600 p-3">{{ $coach->email }}</td>
                    <td class="border border-gray-600 p-3">{{ $coach->date_recrutement }}</td>
                    <td class="border border-gray-600 p-3 text-center">
                        <form action="{{ route('coach.destroy', $coach->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Voulez-vous vraiment supprimer ce coach ?');">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-gray-400 p-4">Aucun coach trouvé.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $coaches->links() }}
    <!-- Add New Coach Button -->
    <div class="text-center mt-6">
        <a href="{{ route('coach.create') }}" 
           class="bg-blue-600 px-4 py-2 rounded text-white font-semibold hover:bg-blue-700">
           Ajouter un Coach
        </a>
    </div>
</div>

@endsection
