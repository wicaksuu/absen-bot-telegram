<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Kartu status langganan pengguna (AI) -->
            <div class="bg-white shadow sm:rounded-lg p-6">
                <h3 class="text-xl font-semibold">Halo, {{ auth()->user()->name }}</h3>
                @if (auth()->user()->isSubscribed())
                    <p class="mt-2 text-green-600">Langganan aktif sampai {{ auth()->user()->subscription_expires_at->format('d M Y') }}.</p>
                @else
                    <p class="mt-2 text-red-600">Langganan Anda telah habis. Biaya langganan Rp{{ number_format(config('subscription.price'),0,',','.') }} per 30 hari.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
