<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.scss')
    <title>Laravel</title>

</head>

<body class="flex flex-col min-h-screen">
    <x-header />

    <main class="grow flex flex-col">
        @yield('content')
    </main>

    <x-footer />
    @vite('resources/js/app.js')
</body>

</html>
