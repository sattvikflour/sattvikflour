<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
           [ 
            'prod_category_id' => 1,
            'prod_name' => 'Wheat One',
            'prod_original_price' => 50,
            'prod_offer_status' => 1,
            'prod_offer_price' => 40,
            'prod_badge_status' => 1,
            'prod_badge_text' => 'Save 20%',
            'prod_img' => 'wheat_prod.jpg', 
            'prod_unit' => 'Kg',
            'prod_details' => 'Nutrient-rich and versatile, wheat is a staple cereal grain.',
            'prod_description' => "Wheat is a cereal grain that has been cultivated for thousands of years and is one of the world's most important food crops. It is a rich source of carbohydrates, fiber, vitamins, and minerals. Wheat is used to make a variety of food products, including bread, pasta, and cereal.",
            'prod_types_avail' => true,
            'packaging_opts_avail' => true,
            'prod_type_label' => 'Type of Grinding',
            'packaging_opts_label' => 'Available Packaging Options',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'prod_category_id' => 1,
            'prod_name' => 'Wheat Two',
            'prod_original_price' => 50,
            'prod_offer_status' => 1,
            'prod_offer_price' => 40,
            'prod_badge_status' => 1,
            'prod_badge_text' => 'Save 20%',
            'prod_img' => 'wheat_prod.jpg', 
            'prod_unit' => 'Kg',
            'prod_details' => 'Nutrient-rich and versatile, wheat is a staple cereal grain.',
            'prod_description' => "Wheat is a cereal grain that has been cultivated for thousands of years and is one of the world's most important food crops. It is a rich source of carbohydrates, fiber, vitamins, and minerals. Wheat is used to make a variety of food products, including bread, pasta, and cereal.",
            'prod_types_avail' => true,
            'packaging_opts_avail' => false,
            'prod_type_label' => 'Type of Grinding',
            'packaging_opts_label' => 'Available Packaging Options',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'prod_category_id' => 1,
            'prod_name' => 'Wheat Three',
            'prod_original_price' => 50,
            'prod_offer_status' => 1,
            'prod_offer_price' => 40,
            'prod_badge_status' => 1,
            'prod_badge_text' => 'Save 20%',
            'prod_img' => 'wheat_prod.jpg', 
            'prod_unit' => 'Kg',
            'prod_details' => 'Nutrient-rich and versatile, wheat is a staple cereal grain.',
            'prod_description' => "Wheat is a cereal grain that has been cultivated for thousands of years and is one of the world's most important food crops. It is a rich source of carbohydrates, fiber, vitamins, and minerals. Wheat is used to make a variety of food products, including bread, pasta, and cereal.",
            'prod_types_avail' => false,
            'packaging_opts_avail' => true,
            'prod_type_label' => 'Type of Grinding',
            'packaging_opts_label' => 'Available Packaging Options',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'prod_category_id' => 1,
            'prod_name' => 'Wheat Four',
            'prod_original_price' => 50,
            'prod_offer_status' => 1,
            'prod_offer_price' => 40,
            'prod_badge_status' => 1,
            'prod_badge_text' => 'Save 20%',
            'prod_img' => 'wheat_prod.jpg', 
            'prod_unit' => 'Kg', 
            'prod_details' => 'Nutrient-rich and versatile, wheat is a staple cereal grain.',
            'prod_description' => "Wheat is a cereal grain that has been cultivated for thousands of years and is one of the world's most important food crops. It is a rich source of carbohydrates, fiber, vitamins, and minerals. Wheat is used to make a variety of food products, including bread, pasta, and cereal.",
            'prod_types_avail' => false,
            'packaging_opts_avail' => false,
            'prod_type_label' => 'Type of Grinding',
            'packaging_opts_label' => 'Available Packaging Options',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        ]);
    }
}
