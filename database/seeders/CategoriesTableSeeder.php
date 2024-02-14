<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                "category_name" => "Wheat",
                "category_url" => "wheat",
                "category_img" => "wheat.jpg",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                "category_name" => "Jawar",
                "category_url" => "jawar",
                "category_img" => "jawar.jpg",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                "category_name" => "Bajari",
                "category_url" => "bajari",
                "category_img" => "bajari.jpg",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                "category_name" => "Besan",
                "category_url" => "besan",
                "category_img" => "besan.jpg",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                "category_name" => "Barley",
                "category_url" => "barley",
                "category_img" => "barley.jpg",
                'created_at' => now(),
                'updated_at' => now()
            ]

        ]);
    }
}
