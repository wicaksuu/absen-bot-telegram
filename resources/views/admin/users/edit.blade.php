<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <!-- Form edit user -->
                <form method="POST" action="{{ route('admin.users.update', $user) }}">
                    @method('PUT')
                    @include('admin.users.form', ['submit' => 'Update', 'user' => $user])
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
