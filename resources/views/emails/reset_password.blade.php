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

@if(session('status'))
    <div class="bg-green-100 text-green-800 border border-green-300 p-4 rounded mb-4">
        {{ session('status') }}
    </div>
@endif

<h1>Hello, {{ $name }}</h1>
    <p>We received a request to reset your password. Click the link below to reset your password:</p>
    <a href="{{ url('reset_password', $token) }}">Reset Password</a>
</div>


</body>
</html>
