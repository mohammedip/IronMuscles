<aside id="sidebar" class="w-64 bg-gray-800 min-h-screen p-5 rounded-lg shadow-lg transition-all duration-300">
    <!-- Toggle Button -->
    <button id="toggleSidebar" class="mb-4 p-2 bg-gray-700 text-white rounded-lg hover:bg-blue-600 focus:outline-none">
        ☰
    </button>

    <!-- Navigation -->
    <nav>
        <ul>
            <!-- Dashboard -->
            @role('admin')
            <li class="mb-3">
                <a href="{{ route('dashbord.index') }}" class="flex items-center p-3 bg-gray-700 text-white rounded-lg transition duration-300 hover:bg-blue-600 hover:text-white transform hover:translate-x-2">
                    <i class="fas fa-tachometer-alt"></i> 
                    <span class="sidebar-text ml-3">Tableau de Bord</span>
                </a>
            </li>

            <!-- Adhérents -->
            <li class="mb-3">
                <a href="{{ route('adherent.index') }}" class="flex items-center p-3 bg-gray-700 text-white rounded-lg transition duration-300 hover:bg-blue-600 hover:text-white transform hover:translate-x-2">
                    <i class="fas fa-users"></i> 
                    <span class="sidebar-text ml-3">Adhérents</span>
                </a>
            </li>

            <!-- Abonnements -->
            <li class="mb-3">
                <a href="{{ route('abonnement.index') }}" class="flex items-center p-3 bg-gray-700 text-white rounded-lg transition duration-300 hover:bg-blue-600 hover:text-white transform hover:translate-x-2">
                    <i class="fas fa-credit-card"></i> 
                    <span class="sidebar-text ml-3">Abonnements</span>
                </a>
            </li>
            @endrole
            <!-- Plannings -->
            @role('coach')
            <li class="mb-3">
                <a href="{{ route('entrainement.create') }}" class="flex items-center p-3 bg-gray-700 text-white rounded-lg transition duration-300 hover:bg-blue-600 hover:text-white transform hover:translate-x-2">
                    <i class="fas fa-calendar-alt"></i> 
                    <span class="sidebar-text ml-3">Entrainement</span>
                </a>
            </li>
            @endrole
            <!-- Machines -->
            @role('admin')
            <li class="mb-3">
                <a href="{{ route('machine.index') }}" class="flex items-center p-3 bg-gray-700 text-white rounded-lg transition duration-300 hover:bg-blue-600 hover:text-white transform hover:translate-x-2">
                    <i class="fas fa-cogs"></i> 
                    <span class="sidebar-text ml-3">Machines</span>
                </a>
            </li>

            <li class="mb-3">
                <a href="{{ route('speciality.index') }}" class="flex items-center p-3 bg-gray-700 text-white rounded-lg transition duration-300 hover:bg-blue-600 hover:text-white transform hover:translate-x-2">
                    <i class="fas fa-cogs"></i> 
                    <span class="sidebar-text ml-3">Specialities</span>
                </a>
            </li>

            <!-- Coach (Conditionally Rendered) -->
            
            <li class="mb-3">
                <a href="{{ route('coach.index') }}" class="flex items-center p-3 bg-gray-700 text-white rounded-lg transition duration-300 hover:bg-blue-600 hover:text-white transform hover:translate-x-2">
                    <i class="fas fa-chalkboard-teacher"></i> 
                    <span class="sidebar-text ml-3">Coach</span>
                </a>
            </li>
            @endrole
        </ul>
    </nav>
</aside>

@section('sidebarScripts')
<script>
    document.getElementById('toggleSidebar').addEventListener('click', function() {
        let sidebar = document.getElementById('sidebar');
        let textElements = document.querySelectorAll('.sidebar-text');

        if (sidebar.classList.contains('w-64')) {
            sidebar.classList.remove('w-64');
            sidebar.classList.add('w-20');
            textElements.forEach(el => el.classList.add('hidden'));
        } else {
            sidebar.classList.remove('w-20');
            sidebar.classList.add('w-64');
            textElements.forEach(el => el.classList.remove('hidden'));
        }
    });
</script>
@endsection

<!-- Include FontAwesome for Icons -->
