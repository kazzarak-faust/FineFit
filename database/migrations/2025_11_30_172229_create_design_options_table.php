<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('design_options', function (Blueprint $table) {
            $table->id();

            // FK ke product_types
            $table->foreignId('product_type_id')
                ->nullable()
                ->constrained('product_types')
                ->nullOnDelete();

            $table->string('category');
            $table->string('name');
            $table->string('sub_category')->nullable();
            $table->decimal('price_modifier', 12, 2)->default(0);
            $table->json('metadata')->nullable();

            $table->timestamps();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('design_options');
    }
};
