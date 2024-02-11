<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'firstname' => 'SattvikFlour',
                'lastname' => 'Admin',
                'email' => 'admin@sattvikflour.com',
                'mobile' => '1234567890',
                'username' => '1234567890',
                'address' => 'Phaltan',
                'city' => 'Satara',
                'profile_image' => 'profile1.jpg',
                'gender' => 'Male',
                'language' => 'English',
                'role' => 'admin',
                'verified' => 1,
                'active_subscriber' => 1,
                'ban_user' => 0,
                'password' => Hash::make('12345678'),
                'last_access_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'firstname' => 'Abhijit',
                'lastname' => 'Abd',
                'email' => 'abhijit@sattvikflour.com',
                'mobile' => '9175113022',
                'username' => '9175113022',
                'address' => 'Pune',
                'city' => 'Pune',
                'profile_image' => 'profile2.jpg',
                'gender' => 'Male',
                'language' => 'English',
                'role' => 'user',
                'verified' => 1,
                'active_subscriber' => 1,
                'ban_user' => 0,
                'password' => Hash::make('12345678'),
                'last_access_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
