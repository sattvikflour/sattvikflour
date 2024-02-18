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
        'prod_details', 'prod_description', 'packaging_opts_avail','prod_types_avail','prod_status'
    ];

        // relationship with the category table
        public function category()
        {
            return $this->belongsTo(Category::class, 'prod_category_id');
        }
}
