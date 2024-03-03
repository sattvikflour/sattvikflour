<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        // $category_id = 1;
        $categories = Category::all();
        $products = Product::all();
        // $products = Product::where('display_order',$category_id)->get();
        // return view('admin.products', compact('categories'));
        return view('admin.products', compact('categories', 'products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.product_create',compact('categories'));
    }

    public function store(Request $request)
    {
        //dd($request);
        $fileName = null;
        // Validate the incoming request data
        $request->validate([
            'displayOrder' => 'nullable|integer',
            'prodCategory' => 'required|exists:categories,id',
            'prodName' => 'required|string',
            'prodOriginalPrice' => 'required|numeric',
            'prodOfferStatus' => 'boolean',
            'prodOfferPrice' => 'nullable|numeric',
            'prodBadgeStatus' => 'boolean',
            'prodBadgeText' => 'nullable|string',
            'prod_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            'prodDetails' => 'nullable|string',
            'productDescription' => 'nullable|string',
            'prodStatus' => 'boolean',
        ]);

        //dd($request , $request->hasFile('prod_img'));
        if ($request->hasFile('prod_img')) {
            //$imagePath = $request->category_img->store('category_images', 'public');
            date_default_timezone_set('Asia/Kolkata');
            //dd(date('YmdHisv'));
            $fileName = date('YmdHisv') . '.' . $request->prod_img->getClientOriginalExtension();
            $imagePath = $request->prod_img->storeAs('public/product_images', $fileName);
            //dd($imagePath);
        }

        // Create a new Product instance
        Product::create([
            'display_order' => $request->input('displayOrder'),
            'prod_category_id' => $request->input('prodCategory'),
            'prod_name' => $request->input('prodName'),
            'prod_original_price' => $request->input('prodOriginalPrice'),
            'prod_offer_status' => $request->has('prodOfferStatus'),
            'prod_offer_price' => $request->input('prodOfferPrice'),
            'prod_badge_status' => $request->has('prodBadgeStatus'),
            'prod_badge_text' => $request->input('prodBadgeText'),
            'prod_img' => $fileName,
            'prod_details' => $request->input('prodDetails'),
            'product_description' => $request->input('productDescription'),
            'prod_status' => $request->has('prodStatus') ? 1 : 0,
        ]);

        // Redirect to a success page or any other appropriate action
        return redirect()->route('products')->with('success', 'Product added successfully');
    }


    public function ajaxGetProducts(Request $request)
    {
        $category_id = $request->input('category_id');
        $filteredRecords = null;
        if ($category_id == 'all') {
            $filteredRecords = Product::all();
        } else {
            $filteredRecords = Product::where('prod_category_id', $category_id)->get();
        }
        $totalRecords = Product::count();
        $filteredRecordsCount = $filteredRecords->count();

        $data = [];
        foreach ($filteredRecords as $product) {
            $nestedData = [
                'responsive_id' => ' ',
                'id' => $product->id,
                'display_order' => $product->display_order,
                'prod_name' => $product->prod_name,
                'edit' => route('product.edit', ['id' => $product->id]),
            ];
            $data[] = $nestedData;
        }

        return response()->json([
            'data' => $data,
            'draw' => intval($request->input('draw')),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $filteredRecordsCount,
        ]);
    }

    public function ajaxUpdateOrder(Request $request)
    {
        try {
            $orderData = $request->input('order_data');

            foreach ($orderData as $item) {
                $productId = $item['id'];
                $newOrder = $item['display_order'];
                DB::beginTransaction(); //See notes to know more about it
                $product = Product::findOrFail($productId);
                $product->display_order = $newOrder;
                $product->save();
                DB::commit();
            }

            return response()->json(['status' => 'success', 'message' => 'Display order updated successfully'], 200);
        } catch (QueryException $e) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'message' => 'Database error'], 500);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Error occurred'.$e->getMessage()], 500);
        }
    }

    
}
