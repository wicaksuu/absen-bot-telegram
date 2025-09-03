<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Field nip menyimpan nomor induk pegawai
            $table->string('nip')->nullable();
            // Field nomorhp menyimpan nomor handphone user
            $table->string('nomorhp')->nullable();
            // Field telegramid menyimpan id telegram user
            $table->string('telegramid')->nullable();
            // Field imeiAbsen menyimpan IMEI perangkat absen
            $table->string('imeiAbsen')->nullable();
            // Username untuk sistem absen eksternal
            $table->string('usernameAbsen')->nullable();
            // Password untuk sistem absen eksternal
            $table->string('passwordAbsen')->nullable();
            // Token digunakan ketika memanggil API absen
            $table->string('tokenAbsen')->nullable();
            // User-Agent yang digunakan ketika melakukan absen
            $table->string('userAgentAbsen')->nullable();
            // Lokasi latitude saat absen
            $table->decimal('lat_absen', 10, 7)->nullable();
            // Lokasi longitude saat absen
            $table->decimal('long_absen', 10, 7)->nullable();
            // Role menentukan hak akses user (admin/user)
            $table->string('role')->default('user');
            // Field subscription_expires_at menyimpan tanggal berakhir langganan
            $table->timestamp('subscription_expires_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'nip',
                'nomorhp',
                'telegramid',
                'imeiAbsen',
                'usernameAbsen',
                'passwordAbsen',
                'tokenAbsen',
                'userAgentAbsen',
                'lat_absen',
                'long_absen',
                'role',
                'subscription_expires_at',
            ]);
        });
    }
};
