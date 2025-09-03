<?php

use Illuminate\Support\Facades\Route;

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
        return $user->isAdmin()
            ? view('admin.dashboard')
            : view('user.dashboard');
    })->name('dashboard');
});
