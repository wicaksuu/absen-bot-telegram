<?php

namespace App\Http\Controllers;

use App\Models\TopupLog;
use Illuminate\Http\Request;
use Xendit\Xendit;

class TopupController extends Controller
{
    /**
     * Membuat invoice topup untuk user dan mengembalikan URL pembayaran.
     * Komentar ini dihasilkan otomatis oleh AI.
     */
    public function createInvoice(Request $request)
    {
        $user = $request->user();
        $amount = config('subscription.price');

        Xendit::setApiKey(config('services.xendit.secret_key'));

        $externalId = 'user-' . $user->id . '-' . time();
        $invoice = \Xendit\Invoice::create([
            'external_id' => $externalId,
            'description' => 'Topup langganan 30 hari',
            'amount' => $amount,
            'payer_email' => $user->email,
        ]);

        // Simpan log topup dengan status PENDING
        TopupLog::create([
            'user_id' => $user->id,
            'amount' => $amount,
            'status' => 'PENDING',
            'invoice_id' => $invoice['id'],
            'external_id' => $externalId,
            'description' => $invoice['description'],
        ]);

        return response()->json(['invoice_url' => $invoice['invoice_url']]);
    }

    /**
     * Menangani webhook Xendit dan memperbarui langganan user.
     * Komentar ini dihasilkan otomatis oleh AI.
     */
    public function handleWebhook(Request $request)
    {
        // Verifikasi token callback dari Xendit
        $token = $request->header('x-callback-token');
        if ($token !== config('services.xendit.callback_token')) {
            return response()->json(['message' => 'Invalid token'], 401);
        }

        $data = $request->all();

        // Cari log berdasarkan invoice_id
        $log = TopupLog::where('invoice_id', $data['id'] ?? null)->first();
        if (!$log) {
            return response()->json(['message' => 'Log not found'], 404);
        }

        // Hanya proses ketika status PAID
        if (($data['status'] ?? null) === 'PAID') {
            $log->update(['status' => 'PAID']);

            $user = $log->user;
            // Tambahkan 30 hari ke masa aktif
            $expires = $user->subscription_expires_at;
            $user->subscription_expires_at = $expires && $expires->isFuture()
                ? $expires->addDays(30)
                : now()->addDays(30);
            $user->save();
        }

        return response()->json(['message' => 'ok']);
    }
}
