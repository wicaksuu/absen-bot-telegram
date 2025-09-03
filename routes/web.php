<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\TopupController; // Controller topup untuk langganan (AI)

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        // Menampilkan dashboard sesuai peran pengguna
        $user = auth()->user();
        if ($user->isAdmin()) {
            // Mengirim jumlah user ke dashboard admin
            $users = User::count();
            return view('admin.dashboard', compact('users'));
        }
        return view('user.dashboard');
    })->name('dashboard');

    // Halaman history dan pembayaran langganan (komentar AI)
    Route::get('/subscription/history', [TopupController::class, 'history'])->name('subscription.history');
    Route::get('/subscription/pay', [TopupController::class, 'showPay'])->name('subscription.pay');
    Route::post('/subscription/invoice', [TopupController::class, 'createInvoice'])->name('subscription.invoice');

    // Grup route khusus admin dengan middleware 'admin' (komentar ini dibuat oleh AI)
    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        Route::resource('users', AdminUserController::class);
    });
});
