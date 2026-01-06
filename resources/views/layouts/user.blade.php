<!DOCTYPE html>
<html lang="en" class="overflow-x-hidden">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Warung Salsabila')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('fonts/poppins.css') }}">
    <style>
        .curve-bottom {
            clip-path: ellipse(100% 100% at 50% 0%);
        }
    </style>
    @stack('styles')
</head>

<body class="bg-gray-50 text-gray-900 w-full overflow-x-hidden">
    @yield('content')
    @stack('scripts')
</body>

</html>