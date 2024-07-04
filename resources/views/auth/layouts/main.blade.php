<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Employee Benefits</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-roboto text-gray-900 antialiased">
    <div class="flex min-h-screen flex-col items-center justify-center bg-gray-100 pt-0">
        <div class="w-full max-w-md overflow-hidden rounded-lg bg-white px-6 py-4 shadow-md">
            @yield('content')
        </div>
    </div>

    @stack('scripts')
</body>

</html>
