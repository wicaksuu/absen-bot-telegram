<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Membuat tabel untuk menyimpan log topup pengguna.
     * Komentar ini dihasilkan otomatis oleh AI.
     */
    public function up(): void
    {
        Schema::create('topup_logs', function (Blueprint $table) {
            $table->id();
            // ID user yang melakukan topup
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            // Nominal topup dalam satuan rupiah
            $table->integer('amount');
            // Status topup: PENDING, PAID, dll
            $table->string('status')->default('PENDING');
            // ID invoice dari Xendit
            $table->string('invoice_id')->unique();
            // Kode eksternal untuk menghubungkan invoice dengan user
            $table->string('external_id')->index();
            // Catatan tambahan
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Menghapus tabel log topup jika dibatalkan.
     * Komentar ini dihasilkan otomatis oleh AI.
     */
    public function down(): void
    {
        Schema::dropIfExists('topup_logs');
    }
};
