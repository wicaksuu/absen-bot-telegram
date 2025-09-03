<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

/**
 * Seeder untuk membuat akun admin dan beberapa user contoh.
 */
class UserSeeder extends Seeder
{
    /**
     * Jalankan seeder.
     */
    public function run(): void
    {
        // Membuat akun admin default
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
        ]);

        // Membuat tiga user biasa
        User::factory()->count(3)->create();
    }
}
