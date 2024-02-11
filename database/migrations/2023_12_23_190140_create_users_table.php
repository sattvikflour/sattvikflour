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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname')->nullable();
            $table->string('email', 100)->unique()->nullable();
            $table->string('mobile', 20)->unique();
            $table->string('username', 20)->unique();
            $table->string('address');
            $table->string('city');
            $table->string('profile_image')->nullable();
            $table->enum('gender', ['Male', 'Female', 'Other'])->default('Male');
            $table->string('language', 50)->nullable();
            $table->enum('role', ['admin', 'user'])->default('user');
            $table->integer('verified')->default(0);
            $table->integer('active_subscriber')->default(0);
            $table->integer('ban_user')->default(0);
            $table->string('password');
            $table->timestamp('last_access_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
