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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->dateTime('order_date');
            $table->string('contact_number');
            $table->string('shipping_address');
            $table->decimal('total_amount', 10, 2);
            $table->enum('payment_method',['cod','online']);
            $table->enum('payment_status',['paid','pending','cancelled'])->default('pending');
            $table->enum('order_status',['delivered','pending','cancelled'])->default('pending');
            $table->dateTime('est_delivery_date')->nullable();
            $table->text('notes')->nullable();
            $table->decimal('discounts', 10, 2)->nullable();
            $table->decimal('tax_amount', 10, 2)->nullable();
            $table->decimal('shipping_fee', 10, 2)->nullable();
            $table->string('tracking_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
