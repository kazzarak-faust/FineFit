<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DesignConfiguration extends Model
{
    protected $guarded = []; // Izinkan semua kolom diisi

    protected $casts = [
        'selected_options' => 'array', // Otomatis konversi JSON <-> Array
    ];
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function productType(): BelongsTo
    {
        return $this->belongsTo(ProductType::class);
    }

    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class);
    }
    
    public function orderItem(): HasOne
    {
        return $this->hasOne(OrderItem::class);
    }
}