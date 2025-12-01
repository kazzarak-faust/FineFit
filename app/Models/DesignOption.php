<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DesignOption extends Model
{
    /**
     * Izinkan semua kolom diisi (mass assignment).
     */
    protected $guarded = [];

    /**
     * Casting otomatis untuk kolom JSON dan decimal.
     */
    protected $casts = [
        'metadata' => 'array',
        'price_modifier' => 'decimal:2',
    ];

    /**
     * Akses cepat untuk mendapatkan warna HEX.
     * Hanya berlaku jika kategori = 'Color' dan metadata['hex'] diset.
     */
    public function getHexColorAttribute()
    {
        return $this->metadata['hex'] ?? null;
    }

    /**
     * OPTIONAL:
     * Jika suatu hari Anda ingin menghubungkan DesignOption ke ProductType 
     * (misalnya warna tertentu hanya untuk Hoodie), tinggal aktifkan relasi ini.
     *
     * Saat ini belum digunakan (tidak wajib).
     */
    // public function productType()
    // {
    //     return $this->belongsTo(ProductType::class);
    // }
}
