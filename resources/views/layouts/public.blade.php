<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Artikel Website') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Anda bisa menambahkan gaya CSS kustom di sini jika diperlukan,
           atau lebih baik di resources/css/app.css */
        body {
            background-color: #f7fafc;
            /* Warna latar belakang ringan untuk keseluruhan halaman */
        }
    </style>
</head>

<body class="font-sans antialiased text-gray-900">

    {{-- Navbar terpisah --}}
    @include('layouts.partials._navbar')

    {{-- Page Heading (opsional, jika Anda ingin judul halaman di bawah navbar,
        gunakan @section('header') di view spesifik) --}}
    @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    {{-- Konten Utama dari view spesifik --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-gray-800 text-white py-8 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p>&copy; {{ date('Y') }} {{ config('app.name', 'Artikel Website') }}. All rights reserved.</p>
            <div class="mt-4 text-sm text-gray-400">
                {{-- Pastikan rute ini sudah didefinisikan di routes/web.php --}}
                <a href="{{ route('policy.show') }}" class="hover:underline mx-2">Kebijakan Privasi</a> |
                <a href="{{ route('terms.show') }}" class="hover:underline mx-2">Syarat Penggunaan</a>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('success'))
                toastr.success("{{ session('success') }}");
            @endif
            @if (session('error'))
                toastr.error("{{ session('error') }}");
            @endif
            @if (session('warning'))
                toastr.warning("{{ session('warning') }}");
            @endif
            @if (session('info'))
                toastr.info("{{ session('info') }}");
            @endif
        });
    </script>
</body>

</html>
