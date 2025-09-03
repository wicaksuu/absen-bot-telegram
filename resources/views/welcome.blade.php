<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Absen Bot</title>
    @if (file_exists(public_path('build/manifest.json')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="antialiased">
    <div class="relative min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-blue-100">
        <div class="max-w-3xl mx-auto text-center">
            <x-application-logo class="mx-auto h-20 w-20 mb-6" /> <!-- Landing page dengan logo baru (AI) -->
            <h1 class="text-5xl font-bold mb-6 text-gray-800">Selamat Datang di Absen Bot</h1>
            <p class="text-lg mb-8 text-gray-600">Sistem otomatis untuk mempermudah proses absensi Anda.</p>
            <div class="space-x-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="px-6 py-3 bg-blue-600 text-white rounded-lg">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="px-6 py-3 bg-blue-600 text-white rounded-lg">Masuk</a>
                    <a href="{{ route('register') }}" class="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg">Daftar</a>
                @endauth
            </div>
        </div>
    </div>
</body>
</html>
