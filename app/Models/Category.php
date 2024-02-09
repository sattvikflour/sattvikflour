<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name', 'category_url', 'category_img', 'avail_status',
        // Add any other fillable fields you need for categories
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'prod_category_id');
    }
}
