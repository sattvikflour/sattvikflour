<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function ajaxAddToCart(Request $request)
    {
        try {
            // dd($request); //does not work for ajax calls
            $productId = $request->input('productId');
            $product = Product::findOrFail($productId); //this also work
            // $product = Product::where('id', '=', $productId)->first();
            $productName = $product->prod_name;
            $productPrice = $product->prod_offer_status == 1 ? $product->prod_offer_price : $product->prod_original_price;
            if ($product->prod_types_avail == 1) {
                $productType = $request->input('productType');
            }
            if ($product->packaging_opts_avail == 1) {
                $packagingOption = $request->input('packagingOption');
            }
            $quantity = $request->input('quantity');

            $cartItems = Session::get('cart');

            if (!empty($cartItems) && $product->prod_types_avail == 1 && $product->packaging_opts_avail == 1) {
                // Check if the same product with the same type and packaging option exists in the cart
                $existingProduct = collect($cartItems)->first(function ($item) use ($productId, $productType, $packagingOption) {
                    return ($item['productId'] ?? null) == $productId && ($item['productType'] ?? null) == $productType && ($item['packagingOption'] ?? null) == $packagingOption;
                });
                // Above code will iterate through the entire collection until it finds the first item
                // that satisfies the condition specified in the callback function. 
                // It does not stop after checking just the first item.

                if ($existingProduct) {
                    return response()->json(['status' => 'error', 'message' => 'Product already exists in the cart']);
                }
            }

            //Starts Other Combinations
            if (!empty($cartItems) && $product->prod_types_avail == 0 && $product->packaging_opts_avail == 1) {
                $existingProduct = collect($cartItems)->first(function ($item) use ($productId, $packagingOption) {
                    return ($item['productId'] ?? null) == $productId && ($item['packagingOption'] ?? null) == $packagingOption;
                });
                if ($existingProduct) {
                    return response()->json(['status' => 'error', 'message' => 'Product already exists in the cart']);
                }
            }
            if (!empty($cartItems) && $product->prod_types_avail == 1 && $product->packaging_opts_avail == 0) {
                $existingProduct = collect($cartItems)->first(function ($item) use ($productId, $productType) {
                    return ($item['productId'] ?? null) == $productId && ($item['productType'] ?? null) == $productType;
                });
                if ($existingProduct) {
                    return response()->json(['status' => 'error', 'message' => 'Product already exists in the cart']);
                }
            }

            if (!empty($cartItems) && $product->prod_types_avail == 0 && $product->packaging_opts_avail == 0) {
                $existingProduct = collect($cartItems)->first(function ($item) use ($productId) {
                    return ($item['productId'] ?? null) == $productId;
                });
                if ($existingProduct) {
                    return response()->json(['status' => 'error', 'message' => 'Product already exists in the cart']);
                }
            }

            //Ends Other Combinations

            // Create Cart Data to information in session
            $cartData = [
                'productId' => $productId,
                'productName' => $productName,
                'productPrice' => $productPrice,
                'quantity' => $quantity,
                'productType' => ($product->prod_types_avail == 1) ? $productType : null,
                'packagingOption' => ($product->packaging_opts_avail == 1) ? $packagingOption : null,
            ];

            // 'cart' is key for cart data in the session
            Session::push('cart', $cartData);

            return response()->json(['status' => 'success', 'message' => 'Product added to cart successfully']);
        } catch (\Exception $e) {
            // echo $e->getMessage();
            return response()->json(['status' => 'error', 'message' => 'Something went wrong' . $e->getMessage()]);
        }
    }
}
