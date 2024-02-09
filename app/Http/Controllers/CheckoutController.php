<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function checkout(){

        $cartData = Session::get('cart', []);

        return view('website.checkout',compact('cartData'));
    }
}
