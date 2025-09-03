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
            // Validasi tambahan untuk data profil absen
            'nip' => ['nullable', 'string', 'max:50'],
            'nomorhp' => ['nullable', 'string', 'max:20'],
            'telegramid' => ['nullable', 'string', 'max:50'],
            'imeiAbsen' => ['nullable', 'string', 'max:100'],
            'usernameAbsen' => ['nullable', 'string', 'max:100'],
            'passwordAbsen' => ['nullable', 'string', 'max:100'],
            'tokenAbsen' => ['nullable', 'string', 'max:255'],
            'userAgentAbsen' => ['nullable', 'string', 'max:255'],
            'lat_absen' => ['nullable', 'numeric'],
            'long_absen' => ['nullable', 'numeric'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            // Penyimpanan data tambahan
            'nip' => $input['nip'] ?? null,
            'nomorhp' => $input['nomorhp'] ?? null,
            'telegramid' => $input['telegramid'] ?? null,
            'imeiAbsen' => $input['imeiAbsen'] ?? null,
            'usernameAbsen' => $input['usernameAbsen'] ?? null,
            'passwordAbsen' => $input['passwordAbsen'] ?? null,
            'tokenAbsen' => $input['tokenAbsen'] ?? null,
            'userAgentAbsen' => $input['userAgentAbsen'] ?? null,
            'lat_absen' => $input['lat_absen'] ?? null,
            'long_absen' => $input['long_absen'] ?? null,
            // Role default user
            'role' => 'user',
        ]);
    }
}
