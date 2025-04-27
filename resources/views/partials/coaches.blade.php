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