<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        // NIP pegawai untuk identifikasi internal
        'nip',
        // Nomor handphone pengguna
        'nomorhp',
        // ID telegram pengguna untuk integrasi bot
        'telegramid',
        // IMEI perangkat yang digunakan saat absen
        'imeiAbsen',
        // Kredensial untuk sistem absen eksternal
        'usernameAbsen',
        'passwordAbsen',
        'tokenAbsen',
        // Informasi user-agent saat melakukan absen
        'userAgentAbsen',
        // Koordinat lokasi absen
        'lat_absen',
        'long_absen',
        // Peran user (admin/user)
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            // Menyimpan koordinat sebagai angka
            'lat_absen' => 'float',
            'long_absen' => 'float',
        ];
    }

    /**
     * Mengecek apakah user bertipe admin.
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }
}
