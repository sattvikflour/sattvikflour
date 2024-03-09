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
        Schema::create('product_reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->enum('user_type',['guest','verified','registered'])->default('guest');
            $table->integer('rating');
            $table->text('review_content');
            $table->boolean('is_approved')->default(false);
            $table->boolean('is_purchased')->default(false);
            $table->text('business_reply')->nullable();
            $table->boolean('is_flagged')->nullable();
            $table->string('flag_reason')->nullable();
            $table->integer('likes_count')->nullable();
            $table->integer('dislike_count')->nullable();
            $table->integer('found_usefull_count')->nullable();
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_reviews');
    }
};
