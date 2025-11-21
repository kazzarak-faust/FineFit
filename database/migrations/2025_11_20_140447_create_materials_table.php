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
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // e.g., Cotton, Linen, Denim
            $table->text('description'); // e.g., "Soft and breathable"
            $table->decimal('price_per_unit', 10, 2); // Harga per unit
            $table->string('unit_name', 50)->default('meter'); // Satuan unit
            $table->string('image_url'); // Path/URL gambar tekstur material
            $table->boolean('is_featured')->default(false); // Untuk ditampilkan di Home
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
