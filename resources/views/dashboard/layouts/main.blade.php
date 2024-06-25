<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee Benefits</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap"
        rel="stylesheet">

    @stack('styles')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-roboto antialiased">

    @include('dashboard.layouts.navbar')
    @include('dashboard.layouts.sidebar')

    <div class="min-h-screen bg-[#ebebeb] p-4 pt-20 sm:ml-56 md:ml-64">
        @yield('content')
    </div>

    @stack('scripts')
</body>

</html>
