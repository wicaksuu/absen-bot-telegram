<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Pengguna') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <!-- Tombol untuk membuat user baru -->
                <a href="{{ route('admin.users.create') }}" class="text-blue-600 underline">Tambah User</a>

                <!-- Tabel daftar pengguna -->
                <table class="mt-4 w-full">
                    <thead>
                        <tr>
                            <th class="text-left">Nama</th>
                            <th class="text-left">Email</th>
                            <th class="text-left">Peran</th>
                            <th class="text-left">Langganan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="border-t">
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ optional($user->subscription_expires_at)->format('d M Y') }}</td>
                                <td class="space-x-2">
                                    <a href="{{ route('admin.users.edit', $user) }}" class="text-green-600">Edit</a>
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-600" onclick="return confirm('Hapus user?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
