@extends('layouts.app')

@section('title', 'Liste des Spécialités')

@section('content')

@if (session('success'))
    <div class="bg-green-500 text-white p-3 mb-4 rounded-md">
        {{ session('success') }}
    </div>
@endif

<div class="max-w-4xl mx-auto bg-gray-800 p-6 rounded shadow-md">
    <div class="flex justify-between mb-4">
        <h2 class="text-center text-xl font-semibold mb-4">Liste des Spécialités</h2>
        @include('components.searchInput')
    </div>

    <table class="w-full table-auto border-collapse border border-gray-600 text-white">
        <thead>
            <tr class="bg-gray-700">
                <th class="border border-gray-600 p-3">ID</th>
                <th class="border border-gray-600 p-3">Nom</th>
                <th class="border border-gray-600 p-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($specialities as $speciality)
                <tr class="bg-gray-800 ">
                    <td class="border border-gray-600 p-3 text-center">{{ $speciality->id }}</td>
                    <td class="border border-gray-600 p-3">{{ $speciality->name }}</td>
                    <td class="border border-gray-600 p-3 text-center">
                        <a href="{{ route('speciality.edit', $speciality->id) }}" class="text-blue-500 hover:underline">Modifier</a> |
                        <form action="{{ route('speciality.destroy', $speciality->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Voulez-vous vraiment supprimer cette spécialité ?');">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center text-gray-400 p-4">Aucune spécialité trouvée.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $specialities->links() }}
    <div class="text-center mt-6">
        <a href="{{ route('speciality.create') }}" class="bg-blue-600 px-4 py-2 rounded text-white font-semibold hover:bg-blue-700">Ajouter une Spécialité</a>
    </div>
</div>

@endsection
