<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'prod_category_id', 'prod_name', 'prod_original_price', 'prod_offer_status',
        'prod_offer_price', 'prod_badge_status', 'prod_badge_text', 'prod_img',
        'prod_details', 'prod_description', 'prod_status'
        // Add any other fillable fields you need for products
    ];

        // Define the relationship with the category
        public function category()
        {
            return $this->belongsTo(Category::class, 'prod_category_id');
        }
}
