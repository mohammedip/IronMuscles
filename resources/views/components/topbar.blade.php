<!-- resources/views/components/topbar.blade.php -->
<header class="flex justify-between items-center bg-gray-900 p-4 rounded-lg shadow-md">
    <!-- Logo Section -->
    <div class="flex items-center space-x-3">
        <img src="{{ asset('images/logo.jpg') }}" alt="IronMuscles Logo" class="w-12 h-12 rounded-full"> 
        <h2 class="text-2xl font-semibold text-white">IronMuscles</h2> 
    </div>

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
            <div class="relative">
                <button id="profileButton" class="text-white px-6 py-2 rounded-md bg-gray-600 hover:bg-gray-700 transition duration-200">
                    Profile
                </button>

                <!-- Profile Dropdown List -->
                <div id="profileDropdown" class="absolute right-0 mt-2 w-48 bg-gray-800 text-white rounded-lg shadow-lg hidden">
                    <ul>
                        @auth
                        <li>
                            <a href="{{ url('profile') }}" class="block px-4 py-2 text-sm hover:bg-gray-700 rounded-t-lg">Profile</a>
                        </li>
                        @endauth
                        <li>
                            @auth
                                <a href="{{ url('logout') }}" class="block px-4 py-2 text-sm text-red-500 hover:bg-gray-700 rounded-b-lg">Logout</a>
                            @endauth
                            @guest
                                <a href="{{ url('login') }}" class="block px-4 py-2 text-sm text-blue-500 hover:bg-gray-700 rounded-b-lg">Login</a>
                                <a href="{{ url('register') }}" class="block px-4 py-2 text-sm text-green-500 hover:bg-gray-700 rounded-b-lg">Register</a>
                            @endguest
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>

@section('topbarScripts')
<script>
    const profileButton = document.getElementById('profileButton');
    const profileDropdown = document.getElementById('profileDropdown');

    profileButton.addEventListener('click', function() {
        profileDropdown.classList.toggle('hidden');
    });

    window.addEventListener('click', function(event) {
        if (!event.target.closest('#profileButton') && !event.target.closest('#profileDropdown')) {
            profileDropdown.classList.add('hidden');
        }
    });
</script>
@endsection
