<aside class="w-64 bg-gray-800 min-h-screen p-5 rounded">
    <h1 class="text-xl font-bold mb-5">IronMuscles</h1>
    <nav>
        <ul>
            <li class="mb-3"><a href="{{ url('dashbord') }}" class="block p-2 bg-gray-700 rounded">Tableau de Bord</a></li>
            <li class="mb-3"><a href="{{ route('Adherent.index') }}" class="block p-2 bg-gray-700 rounded">Adhérents</a></li>
            <li class="mb-3"><a href="{{ route('Abonnement.index') }}" class="block p-2 bg-gray-700 rounded">Abonnements</a></li>
            <li class="mb-3"><a href="{{ route('Planning.index') }}" class="block p-2 bg-gray-700 rounded">Plannings</a></li>
            <li class="mb-3"><a href="{{ route('Machine.index') }}" class="block p-2 bg-gray-700 rounded">Machines</a></li>      
            <li class="mb-3"><a href="{{ route('Coach.index') }}" class="block p-2 bg-gray-700 rounded">Coach</a></li>                  
            <li class="mb-3"><a href="{{ url('404') }}" class="block p-2 bg-gray-700 rounded">404 Page</a></li>
        </ul>
    </nav>
</aside>
