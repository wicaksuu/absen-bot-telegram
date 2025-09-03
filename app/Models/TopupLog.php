<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopupLog extends Model
{
    use HasFactory;

    /**
     * Kolom yang dapat diisi massal.
     * Komentar ini dihasilkan otomatis oleh AI.
     */
    protected $fillable = [
        'user_id',
        'amount',
        'status',
        'invoice_id',
        'external_id',
        'description',
    ];

    /**
     * Relasi ke user yang melakukan topup.
     * Komentar ini dihasilkan otomatis oleh AI.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
