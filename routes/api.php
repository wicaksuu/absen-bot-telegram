<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopupController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route untuk membuat invoice topup (komentar oleh AI)
Route::post('/topup', [TopupController::class, 'createInvoice'])->middleware('auth:sanctum');

// Webhook yang dipanggil Xendit saat pembayaran selesai (komentar oleh AI)
Route::post('/xendit/webhook', [TopupController::class, 'handleWebhook']);
