<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('design_configuration_id')->constrained()->onDelete('cascade'); // Link ke detail kustomisasi
            $table->foreignId('tailor_partner_id')->nullable()->constrained('users')->onDelete('set null'); // Penugasan ke penjahit
            
            $table->string('product_name'); // e.g., Jacket
            $table->string('material_name'); // e.g., Linen
            $table->integer('quantity');
            $table->decimal('price_per_item', 12, 2);
            $table->json('customization_details'); // Menyimpan semua pilihan kustom dalam format JSON

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};