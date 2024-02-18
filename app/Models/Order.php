<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_date',
        'shipping_address',
        'total_amount',
        'payment_method',
        'payment_status',
        'order_status',
        'delivery_date',
        'shipping_method',
        'notes',
        'discounts',
        'tax_amount',
        'shipping_fee',
        'tracking_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
