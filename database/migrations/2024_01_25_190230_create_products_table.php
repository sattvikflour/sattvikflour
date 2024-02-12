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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('display_order')->nullable();
            $table->unsignedBigInteger('prod_category_id');
            $table->string('prod_name');
            $table->decimal('prod_original_price', 8, 2);
            $table->boolean('prod_offer_status')->default(false);
            $table->decimal('prod_offer_price', 8, 2)->nullable();
            $table->boolean('prod_badge_status')->default(false);
            $table->string('prod_badge_text')->nullable();
            $table->string('prod_img');
            $table->text('prod_details')->nullable();
            $table->text('prod_description')->nullable();
            $table->integer('prod_status')->default(1);
            $table->timestamps();
            // foreign key relationship
            $table->foreign('prod_category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
