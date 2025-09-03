<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * Controller untuk mengelola data user oleh admin.
 * Semua method dilengkapi komentar penjelasan.
 */
class UserController extends Controller
{
    /**
     * Menampilkan daftar user agar admin dapat mengelola.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Menampilkan form pembuatan user baru.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Menyimpan user baru ke database.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'nip' => ['nullable', 'string', 'max:50'],
            'telegramid' => ['nullable', 'string', 'max:50'],
            'passwordAbsen' => ['nullable', 'string', 'max:100'],
            'nomorhp' => ['nullable', 'string', 'max:20'],
            'imeiAbsen' => ['nullable', 'string', 'max:100'],
            'usernameAbsen' => ['nullable', 'string', 'max:100'],
            'tokenAbsen' => ['nullable', 'string', 'max:255'],
            'userAgentAbsen' => ['nullable', 'string', 'max:255'],
            'lat_absen' => ['nullable', 'numeric'],
            'long_absen' => ['nullable', 'numeric'],
            'role' => ['required', 'in:user,admin'],
            'subscription_expires_at' => ['nullable', 'date'],
        ]);

        // Simpan password login dalam bentuk hash
        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect()->route('admin.users.index');
    }

    /**
     * Menampilkan form edit untuk user tertentu.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Memperbarui data user di database.
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'string', 'min:8'],
            'nip' => ['nullable', 'string', 'max:50'],
            'telegramid' => ['nullable', 'string', 'max:50'],
            'passwordAbsen' => ['nullable', 'string', 'max:100'],
            'nomorhp' => ['nullable', 'string', 'max:20'],
            'imeiAbsen' => ['nullable', 'string', 'max:100'],
            'usernameAbsen' => ['nullable', 'string', 'max:100'],
            'tokenAbsen' => ['nullable', 'string', 'max:255'],
            'userAgentAbsen' => ['nullable', 'string', 'max:255'],
            'lat_absen' => ['nullable', 'numeric'],
            'long_absen' => ['nullable', 'numeric'],
            'role' => ['required', 'in:user,admin'],
            'subscription_expires_at' => ['nullable', 'date'],
        ]);

        // Jika password diisi, hash dan simpan; jika tidak, biarkan lama
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('admin.users.index');
    }

    /**
     * Menghapus user dari database.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
