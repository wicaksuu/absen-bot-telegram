<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            // NIP wajib diisi sebagai identitas pegawai
            'nip' => ['required', 'string', 'max:50'],
            // Telegram ID digunakan untuk menghubungkan bot
            'telegramid' => ['required', 'string', 'max:50'],
            // Password untuk sistem absen eksternal
            'passwordAbsen' => ['required', 'string', 'max:100'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            // Menyimpan data tambahan yang diisi saat registrasi
            'nip' => $input['nip'],
            'telegramid' => $input['telegramid'],
            'passwordAbsen' => $input['passwordAbsen'],
            // Langganan otomatis aktif selama 30 hari pertama
            'subscription_expires_at' => now()->addDays(30),
            // Role default user
            'role' => 'user',
        ]);
    }
}
