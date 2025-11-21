<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Tambahan untuk FineFit
        'phone_number', // Jika sudah ada di migration
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Hubungan (Relationships)
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
    
    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    public function designConfigurations(): HasMany
    {
        return $this->hasMany(DesignConfiguration::class);
    }
    
    // Helper Role
    public function isTailor(): bool
    {
        return $this->role === 'tailor';
    }
}