<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Artikel Website') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .auth-image-bg {
            background-image: url('{{ asset('images/foto12.jpeg') }}');
            background-size: cover;
            background-position: center;
            border-top-right-radius: 0.5rem;
            border-bottom-right-radius: 0.5rem;
        }
    </style>
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl w-full flex bg-white rounded-lg overflow-hidden shadow-2xl breeze-card">

            <div class="w-full md:w-1/2 p-8 flex flex-col justify-center">
                {{ $slot }}
            </div>

            <div class="hidden md:block md:w-1/2 auth-image-bg">
            </div>
        </div>
    </div>
</body>

</html>
