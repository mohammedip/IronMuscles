@forelse($abonnements as $abonnement)
<tr>
    <td class="p-3 border border-gray-600">{{ $abonnement->adherent->name ?? 'Inconnu' }}</td>
    {{-- <td class="p-3 border border-gray-600">{{ $abonnement->type_Abonnement }}</td> --}}
    <td class="p-3 border border-gray-600">{{ $abonnement->getFormattedStartDate() }}</td>
    <td class="p-3 border border-gray-600">{{ $abonnement->getFormattedEndDate() }}</td>
    <td class="p-3 border border-gray-600">{{ $abonnement->prix }}€</td>
    <td class="p-3 text-center border border-gray-600">
        <a href="{{ route('abonnement.edit', $abonnement->id) }}" 
           class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-md">Modifier</a>

        <form action="{{ route('abonnement.destroy', $abonnement->id) }}" method="POST" 
              class="inline-block" onsubmit="return confirm('Confirmer la suppression ?')">
            @csrf
            @method('DELETE')
            <button type="submit" 
                    class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-md">Supprimer</button>
        </form>
    </td>
</tr>
@empty
<tr>
    <td colspan="6" class="text-center text-gray-400 p-4">Aucun abonnement trouvé.</td>
</tr>
@endforelse