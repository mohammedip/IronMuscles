<div class="relative">
    <form action="{{ $action ?? request()->url() }}" method="GET" >
        <input 
            type="text" 
            name="query" 
            value="{{ request('query') }}" 
            placeholder="Rechercher..."
            class="px-4 py-2 rounded-md bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
        >
        <button 
            type="submit" 
            class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600"
        >Rechercher</button>
    </form>
</div>