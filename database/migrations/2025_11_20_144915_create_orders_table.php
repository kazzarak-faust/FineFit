<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('shipping_address_id')->nullable()->constrained('addresses')->onDelete('set null');
            
            $table->string('order_number')->unique();
            $table->decimal('subtotal', 12, 2);
            $table->decimal('shipping_cost', 12, 2);
            $table->decimal('tax', 12, 2)->default(0);
            $table->decimal('total_amount', 12, 2);
            $table->string('payment_method')->nullable();
            
            // Status Pesanan: Pending Payment, Processing, In Production, Shipped, Completed, Canceled
            $table->string('status')->default('Pending Payment'); 
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};