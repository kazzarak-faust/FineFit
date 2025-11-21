<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductType extends Model
{
    // GUNAKAN GUARDED KOSONG. 
    // Ini mengizinkan semua kolom diisi tanpa kecuali.
    protected $guarded = []; 
    
    public function designOptions(): HasMany
    {
        return $this->hasMany(DesignOption::class);
    }
}