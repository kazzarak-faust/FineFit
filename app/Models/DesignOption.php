<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DesignOption extends Model
{
    // Menggunakan $guarded dengan array kosong berarti "tidak ada kolom yang dilindungi".
    // Ini mengizinkan mass assignment (pengisian massal) untuk semua kolom di tabel ini.
    // Sangat berguna saat seeding data yang kompleks.
    protected $guarded = []; 
    
    /**
     * Mendefinisikan hubungan (Relationship) Many-to-One ke ProductType.
     * Setiap opsi desain terhubung ke satu tipe produk tertentu.
     */
    public function productType(): BelongsTo
    {
        return $this->belongsTo(ProductType::class);
    }
}