<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void 
    {
        Schema::create('product_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // e.g., 'T-Shirt', 'Hoodie', 'Dress'
            $table->decimal('base_price', 10, 2); // Harga dasar jahit
            $table->string('default_image_url')->nullable(); // Mockup awal
            $table->timestamps();
        }); 
    } 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_types');
    }
};