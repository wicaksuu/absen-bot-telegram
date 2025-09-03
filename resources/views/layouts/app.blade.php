<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @if (file_exists(public_path('build/manifest.json')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')
        @livewireScripts

        <!-- Komponen toast sederhana untuk menampilkan notifikasi (dibuat oleh AI) -->
        @if (session('success'))
            <div id="toast-success" class="fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded shadow">
                {{ session('success') }}
            </div>
            <script>
                // Hilangkan toast setelah 3 detik (AI)
                setTimeout(() => document.getElementById('toast-success')?.remove(), 3000);
            </script>
        @endif
        @if ($errors->any())
            <div id="toast-error" class="fixed top-5 right-5 bg-red-500 text-white px-4 py-2 rounded shadow">
                {{ $errors->first() }}
            </div>
            <script>
                // Toast error juga hilang otomatis (AI)
                setTimeout(() => document.getElementById('toast-error')?.remove(), 3000);
            </script>
        @endif
    </body>
</html>
