<!DOCTYPE html>
<html>

<head class="bg-gray-100">
    <meta charset="utf-8">
    <title>Projet réservations - @yield('title')</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="container mx-auto">
        @yield('content')
    </div>
</body>

</html>