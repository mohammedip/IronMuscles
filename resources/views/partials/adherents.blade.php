@forelse($adherents as $adherent)
<tr>
    <td class="p-3 border border-gray-600">{{ $adherent->name }}</td>
    <td class="p-3 border border-gray-600">{{ $adherent->email }}</td>
    <td class="p-3 border border-gray-600">{{ $adherent->statut_abonnement }}</td>
    <td class="p-3 border border-gray-600">{{ \Carbon\Carbon::parse($adherent->date_Inscription)->format('d/m/Y') }}</td>
    <td class="p-3 text-center border border-gray-600">
        <a href="{{ route('adherent.show', $adherent) }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md">Voir</a>
        
        @if(!$adherent->is_activate)
            <a href="{{ route('adherent.activate', $adherent) }}" class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-md">Activer</a>
        @else
        
        <a href="{{ route('adherent.ban', $adherent) }}" class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-md">Bannir</a>
         @endif
        <form action="{{ route('adherent.destroy', $adherent) }}" method="POST" class="inline-block" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet adhérent ?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-md">Supprimer</button>
        </form>
    </td>
</tr>
@empty
<tr>
    <td colspan="6" class="text-center text-gray-400 p-4">Aucun adherent trouvé.</td>
</tr>
@endforelse