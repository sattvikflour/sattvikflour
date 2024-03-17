<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class OrderController extends Controller
{

    public function orderDetails(Request $request)
    {
        // dd($request);
        try {
            $validator = Validator::make($request->all(),[
                'product-id' => 'required|exists:products,id',
                'quantity' => 'required|numeric'
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                return response()->json(['status' => 'error', 'message' => 'Validation Error','errors'=>$errors], 400);
            }
            $productId = $request->input('product-id');
            $productName = $request->input('product-name');
            $productType = $request->input('product-type')??null;
            $packagingOption = $request->input('packaging') ?? null;
            $quantity = $request->input('quantity');
            $productUnitPrice = Product::where('id', $productId)
                ->selectRaw('CASE WHEN prod_offer_status = 1 THEN prod_offer_price ELSE prod_original_price END AS product_unit_price')
                ->value('product_unit_price');

            $productSubTotalPrice = floatval($productUnitPrice) * intval($quantity);
            $productTotalPrice = $packagingOption!=null? floatval($productSubTotalPrice) * intval($packagingOption) : $productSubTotalPrice;
            // dd($productTotalPrice , $productName);
            $orderData = [
                'productId' => $productId,
                'productName' => $productName,
                'productType' => $productType,
                'packagingOption' => $packagingOption,
                'quantity' => $quantity,
                'productTotalPrice' =>$productTotalPrice
            ];

            return view('website.checkout', compact('orderData'));
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function cartCheckout(){

        $cartData = Session::get('cart', []);

        return view('website.cart_checkout',compact('cartData'));
    }

    public function store(Request $request)
    {
        try {
            // $request->validate([ 'user_id' => 'required|exists:users,id',]);

            $validator = Validator::make($request->all(), [
                'user_id' => 'required|exists:users,id',
                'contact_number' => 'required|numeric',
                'shipping_address' => 'required|string',
                'total_amount' => 'required|numeric',
                //order details table
                'product_id' => 'required|string',
                'product_name' => 'required|string',
                'quantity' => 'required|numeric',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                $message = 'Validation errors.';
                // return $this->sendError($message, $errors, 400);
                return response()->json(['status' => 'error', 'message' => $message, 'errors' => $errors], 400);
            }

            $order = Order::create([
                'user_id' => $request->user_id,
                'shipping_address' => $request->shipping_address,
                'contact_number' => $request->contact_number,
                'total_amount' => $request->total_amount,
                'payment_method' => $request->payment_method,
                'est_delivery_date' => $request->est_delivery_date,
                'notes' => $request->note,
                'discounts' => $request->discounts,
                'tax_amount' => $request->tax_amount,
                'shipping_fee' => $request->shipping_fee,
                'tracking_number' => Str::random(2) . Str::random(5) . Str::random(5),
            ]);

            $order->save();

            $orderId = $order->id;

            foreach ($request->order_products as $product) {
                OrderDetail::create([
                    'order_id' => $orderId,
                    'product_id' => $product['product_id'],
                    'product_name' => $product['product_name'],
                    'quantity' => $product['quantity'],
                    'type' => $product['type'],
                    'packaging_size' => $product['packaging_size'],
                ]);
            }

            return response()->json(['status' => 'success', 'message' => 'Order created successfully', 'order' => $order], 201);
        } catch (QueryException $e) {
            return response()->json(['status' => 'error', 'message' => 'Error saving order: ' . $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'An unexpected error occurred: ' . $e->getMessage()], 500);
        }
    }
}
