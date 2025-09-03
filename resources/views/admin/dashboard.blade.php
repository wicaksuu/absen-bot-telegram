<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <!-- Ringkasan singkat untuk admin -->
                <p>Selamat datang, admin. Total pengguna saat ini: {{ $users }}.</p>
                <a href="{{ route('admin.users.index') }}" class="text-blue-600 underline">Kelola Pengguna</a>
            </div>
        </div>
    </div>
</x-app-layout>
