@forelse ($machines as $machine)
<tr>
    <td class="p-3 border border-gray-600">{{ $machine->name }}</td>
    <td class="p-3 border border-gray-600">{{ $machine->type_machine }}</td>
    <td class="p-3 border border-gray-600">{{ $machine->statut }}</td>
    <td class="p-3 border border-gray-600">
        <a href="{{ route('machine.edit', $machine->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600">Modifier</a>
        <form action="{{ route('machine.destroy', $machine) }}" method="POST" class="inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600">Supprimer</button>
        </form>
        <a href="{{ route('machine.show', $machine) }}" class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600">Show</a>
    </td>
</tr>
@empty
<tr>
    <td colspan="6" class="text-center text-gray-400 p-4">Aucune machine trouvée.</td>
</tr>
@endforelse