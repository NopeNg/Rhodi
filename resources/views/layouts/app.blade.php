<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <!-- Vite -->
    @vite(['resources/js/app.js'])
</head>
<body>
    <div id="app">
        @yield('content')
    </div>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</body>
</html>
