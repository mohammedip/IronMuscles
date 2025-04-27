<header class="flex justify-between items-center bg-gray-900 p-4 rounded-lg shadow-md">
    <!-- Logo Section -->
    <div class="flex items-center space-x-3">
        <img src="{{ asset('images/logo.jpg') }}" alt="IronMuscles Logo" class="w-12 h-12 rounded-full">
        <a href="/"><h2 class="text-2xl font-semibold text-white">IronMuscles</h2></a>
    </div>

    <!-- Middle Flair (Quote + Mini Widgets) -->
    <div class="hidden md:flex items-center space-x-6">

        <div class="bg-gray-800 border border-blue-500 px-4 py-1 rounded-lg shadow-md">
            <span class="text-sm font-medium text-blue-400 italic tracking-wide">
                “Discipline is doing it when you don't feel like it.”
            </span>
            
        </div>

    </div>
    

    <!-- Profile & Logout -->
    <div class="flex items-center space-x-4">
        <a href="{{ route('profil.index') }}"
           class="flex items-center justify-center text-white px-4 py-2 rounded-md bg-gray-600 hover:bg-gray-700 transition duration-200">
            <i class="fa-solid fa-user text-lg"></i>
        </a>

        <a href="{{ url('logout') }}"
           class="flex items-center justify-center text-white px-4 py-2 rounded-md bg-red-600 hover:bg-red-700 transition duration-200">
            <i class="fa-solid fa-right-from-bracket text-lg"></i>
        </a>
    </div>
</header>


<!-- Toast Notifications -->
@if(session('status'))
    <div id="statusMessage" 
         class="fixed bottom-5 right-5 w-80 max-w-sm bg-green-100 text-green-800 border border-green-300 p-4 rounded shadow-lg z-50 flex items-center space-x-4 opacity-0 translate-y-4 transition-all duration-700 ease-out">
        <span>{{ session('status') }}</span>
        <button class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700 transition" 
                onclick="dismissMessage('statusMessage')">X</button>
    </div>
@endif

@if(session('error'))
    <div id="errorMessage" 
         class="fixed bottom-5 right-5 w-80 max-w-sm bg-red-100 text-red-800 border border-red-300 p-4 rounded shadow-lg z-50 flex items-center space-x-4 mt-2 opacity-0 translate-y-4 transition-all duration-700 ease-out">
        <span>{{ session('error') }}</span>
        <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition" 
                onclick="dismissMessage('errorMessage')">X</button>
    </div>
@endif


@section('topbarScripts')
<script>

    function dismissMessage(id) {
        const messageElement = document.getElementById(id);
        if (messageElement) {
            messageElement.classList.add('hidden'); 
        }
    }
    document.addEventListener('DOMContentLoaded', () => {

    const status = document.getElementById('statusMessage');
    const error = document.getElementById('errorMessage');

    [status, error].forEach(e => {
        if (e) {
            setTimeout(() => {
                e.classList.remove('opacity-0', 'translate-y-4');
                e.classList.add('opacity-100', 'translate-y-0');
            }, 100); 
        }
    });
});



</script>
@endsection
