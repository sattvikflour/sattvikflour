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
            $table->string('email', 50)->unique()->nullable();
            $table->string('mobile', 15)->unique();
            $table->string('address',150);
            $table->string('address_two',150)->nullable();
            $table->string('city');
            $table->string('profile_img')->nullable();
            $table->enum('gender', ['Male', 'Female', 'Other'])->default('Male');
            $table->enum('role', ['admin', 'user'])->default('user');
            $table->integer('verified')->default(0);
            $table->integer('ban_user')->default(0);
            $table->string('password');
            $table->string('app_version', 10)->nullable();
            $table->text('api_token')->nullable();
            $table->text('fcm_token')->nullable();
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
