<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\Admin\UserController as AdminUserController;

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
<<<<<<< HEAD
        return $user->isAdmin()
            ? view('admin.dashboard')
            : view('user.dashboard');
=======
        if ($user->isAdmin()) {
            // Mengirim jumlah user ke dashboard admin
            $users = User::count();
            return view('admin.dashboard', compact('users'));
        }
        return view('user.dashboard');
>>>>>>> 96c6250 (Implement subscription and admin user management)
    })->name('dashboard');

    // Grup route khusus admin dengan pengecekan peran
    Route::middleware(function ($request, $next) {
        if (!auth()->user()->isAdmin()) {
            abort(403);
        }
        return $next($request);
    })->prefix('admin')->name('admin.')->group(function () {
        Route::resource('users', AdminUserController::class);
    });
});
