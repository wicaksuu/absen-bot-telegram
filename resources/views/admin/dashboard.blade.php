<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 text-center">
                <x-application-logo class="mx-auto h-16 w-16 mb-4" /> <!-- Logo dashboard admin (AI) -->
                <!-- Ringkasan singkat untuk admin -->
                <p class="mb-2">Selamat datang, admin.</p>
                <p class="mb-4">Total pengguna saat ini: {{ $users }}.</p>
                <a href="{{ route('admin.users.index') }}" class="text-blue-600 underline">Kelola Pengguna</a>
            </div>
        </div>
    </div>
</x-app-layout>
