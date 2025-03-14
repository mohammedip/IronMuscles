<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'IronMuscles Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-900 text-white">
    @include('components.topbar')
    <div class="flex">
        <!-- Sidebar -->
        @auth
            @include('components.sidebar')
        @endauth


        <!-- Main Content -->
        <main class="flex-1 p-6">
            
            
                @yield('content')
        </main>
    </div>

    @yield('chartScripts')
    @yield('topbarScripts')
</body>
</html>
