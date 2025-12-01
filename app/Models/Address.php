<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    // Mengizinkan semua kolom untuk diisi
    protected $guarded = [];
    
    /**
     * Alamat ini milik satu User tertentu.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}