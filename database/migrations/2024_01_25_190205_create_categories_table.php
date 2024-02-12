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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->integer('display_order')->nullable();
            $table->string('category_name');
            $table->string('category_url');
            $table->string('category_img');
            $table->enum('avail_status', ['available', 'unavailable','comming_soon']);
            $table->boolean('badge_status')->default(false);
            $table->string('badge_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
