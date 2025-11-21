<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    /**
     * Mengatur kolom yang TIDAK BOLEH diisi secara massal.
     * Array kosong [] berarti SEMUA kolom BOLEH diisi (Mass Assignment diizinkan).
     * Ini penting agar Seeder bisa memasukkan data 'name', 'price', dll.
     */
    protected $guarded = [];
    
    /**
     * Mengubah tipe data otomatis saat diambil dari database.
     */
    protected $casts = [
        'is_featured' => 'boolean', // Mengubah 0/1 menjadi true/false
        'price_per_unit' => 'decimal:2', // Memastikan format desimal harga konsisten
    ];
}