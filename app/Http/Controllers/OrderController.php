<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class OrderController extends Controller
{
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
                'tracking_number' => Str::random(2).Str::random(5).Str::random(5),
            ]);

            $order->save();

            $order_id = Order::where('user_id', $request->user_id)->pluck('id')->first();

            foreach ($request->order_products as $product) {
                // $product_name = Product::where('id',$product['product_id'])->pluck('prod_name')->first();
                OrderDetail::create([
                    'order_id' => $order_id,
                    'product_id' => $product['product_id'],
                    'product_name' => $product['product_name'],
                    'quantity' => $product['quantity'],
                    'type' => $product['type'],
                    'packaging_size' => $product['packaging_size'],
                ]);
            }

            return response()->json(['status' => 'success','message' => 'Order created successfully', 'order' => $order], 201);
        } catch (QueryException $e) {
            return response()->json(['status' => 'error','message' => 'Error saving order: ' . $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error','message' => 'An unexpected error occurred: ' . $e->getMessage()], 500);
        }
    }
}
