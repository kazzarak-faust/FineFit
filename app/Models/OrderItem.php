<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    // Mengizinkan semua kolom untuk diisi
    protected $guarded = [];

    // Mengubah kolom customization_details (JSON) menjadi array otomatis
    protected $casts = [
        'customization_details' => 'array',
    ];
    
    /**
     * Item ini milik satu Order tertentu.
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Item ini berasal dari satu konfigurasi desain (History).
     */
    public function configuration(): BelongsTo
    {
        return $this->belongsTo(DesignConfiguration::class, 'design_configuration_id');
    }
    
    /**
     * Item ini dikerjakan oleh satu Mitra Penjahit (User dengan role tailor).
     */
    public function tailor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'tailor_partner_id');
    }
}