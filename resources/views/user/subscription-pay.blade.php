<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bayar Langganan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <!-- Kartu pembayaran langganan menggunakan DaisyUI (AI) -->
            <div class="card bg-base-100 shadow">
                <div class="card-body">
                    <p class="mb-4">Biaya langganan Rp{{ number_format(config('subscription.price'),0,',','.') }} per 30 hari.</p>
                    <button id="pay-button" class="btn btn-primary w-full">Bayar Sekarang</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('pay-button').addEventListener('click', async () => {
            // Mengirim permintaan ke server untuk membuat invoice Xendit (komentar AI)
            const response = await fetch('{{ route('subscription.invoice') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            });
            const data = await response.json();
            // Mengarahkan pengguna ke halaman pembayaran Xendit (komentar AI)
            window.location.href = data.invoice_url;
        });
    </script>
</x-app-layout>

