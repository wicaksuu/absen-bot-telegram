<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Pengguna') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <!-- Tombol untuk membuat user baru (AI) -->
                <a href="{{ route('admin.users.create') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded">Tambah User</a>

                <!-- Tabel daftar pengguna dengan desain responsif (AI) -->
                <div class="mt-4 overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Nama</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Email</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Peran</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Langganan</th>
                                <th class="px-4 py-2 text-sm font-medium text-gray-700">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($users as $user)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-2">{{ $user->name }}</td>
                                    <td class="px-4 py-2">{{ $user->email }}</td>
                                    <td class="px-4 py-2 capitalize">{{ $user->role }}</td>
                                    <td class="px-4 py-2">{{ optional($user->subscription_expires_at)->format('d M Y') }}</td>
                                    <td class="px-4 py-2 space-x-2">
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
    </div>
</x-app-layout>
