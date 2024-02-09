<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        try{
        //dd($request);
        $productName = $request->input('productName');
        $productPrice = $request->input('productPrice');
        $grindingType = $request->input('grindingType');
        $packingSize = $request->input('packingSize');
        $quantity = $request->input('quantity');

        // Store the product information in the session
        $cartData = [
            'productName' => $productName,
            'productPrice' => $productPrice,
            'grindingType' => $grindingType,
            'packingSize' => $packingSize,
            'quantity' => $quantity,
        ];

        // Assuming 'cart' is the key for your cart data in the session
        Session::push('cart', $cartData);

        return response()->json(['message' => 'Product added to cart successfully']);
    }
     catch (\Exception $e) {
        echo $e->getMessage();
      }
    }
}
