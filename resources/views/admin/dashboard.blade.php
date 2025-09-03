<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid gap-6 md:grid-cols-2">
                <!-- Kartu jumlah pengguna (AI) -->
                <div class="bg-white shadow sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold">Total Pengguna</h3>
                    <p class="mt-2 text-4xl font-bold">{{ $users }}</p>
                </div>
                <!-- Kartu navigasi ke pengelolaan pengguna (AI) -->
                <div class="bg-white shadow sm:rounded-lg p-6 flex flex-col justify-between">
                    <div>
                        <h3 class="text-lg font-semibold">Kelola Pengguna</h3>
                        <p class="text-gray-600">Tambah, ubah, atau hapus data pengguna.</p>
                    </div>
                    <a href="{{ route('admin.users.index') }}" class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded">Masuk</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
