<!-- resources/views/components/topbar.blade.php -->
<header class="flex justify-between items-center bg-gray-900 p-4 rounded-lg shadow-md">
    <!-- Logo Section -->
    <div class="flex items-center space-x-3">
        <img src="{{ asset('images/logo.jpg') }}" alt="IronMuscles Logo" class="w-12 h-12 rounded-full"> 
        <a href="/"><h2 class="text-2xl font-semibold text-white">IronMuscles</h2> </a>
    </div>

@if(session('status'))
    <div id="statusMessage" class="bg-green-100 text-green-800 border border-green-300 p-4 rounded mb-4">
        {{ session('status') }}
        <button class="ml-4 bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 transition duration-200" onclick="dismissMessage('statusMessage')">X</button>
    </div>
@endif
@if(session('error'))
    <div id="errorMessage" class="bg-red-100 text-red-800 border border-red-300 p-4 rounded mb-4">
        {{ session('error') }}
        <button class="ml-4 bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 transition duration-200" onclick="dismissMessage('errorMessage')">X</button>
    </div>
@endif

    <!-- Navigation and Actions -->
    <div class="flex items-center space-x-6">
        @auth
            <div class="relative">
                <input type="text" placeholder="Search..." class="px-4 py-2 bg-gray-800 text-white rounded-full focus:outline-none focus:ring-2 focus:ring-blue-600 w-40 sm:w-72 transition duration-300">
            </div>
        @endauth    

        <!-- Profile & Buttons -->
        <div class="flex items-center space-x-4">

            <!-- Profile Button with Dropdown -->
            <div class="flex space-x-2">
                <a href="{{ route('profil.index') }}" id="profile" 
                   class="flex items-center justify-center text-white px-4 py-2 rounded-md bg-gray-600 hover:bg-gray-700 transition duration-200">
                    <i class="fa-solid fa-user text-white text-lg "></i>
                </a>
            
                <a href="{{ url('logout') }}" id="logout" 
                   class="flex items-center justify-center text-white px-4 py-2 rounded-md bg-red-600 hover:bg-red-700 transition duration-200">
                    <i class="fa-solid fa-right-from-bracket text-white text-lg "></i>
                </a>
            </div>            
        </div>
    </div>
</header>

@section('topbarScripts')
<script>

    function dismissMessage(id) {
        const messageElement = document.getElementById(id);
        if (messageElement) {
            messageElement.classList.add('hidden'); 
        }
    }

</script>
@endsection
