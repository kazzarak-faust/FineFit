<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('design_configurations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_type_id')->constrained()->onDelete('cascade');
            $table->foreignId('material_id')->constrained()->onDelete('cascade');

            $table->json('selected_options'); // Menyimpan ID semua DesignOption yang dipilih (color, size, pocket, dll)
            $table->decimal('final_price', 12, 2);
            
            // Status: Draft, In Cart, Ordered
            $table->string('status')->default('In Cart'); 

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('design_configurations');
    }
};