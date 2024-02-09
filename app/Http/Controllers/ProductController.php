<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // $category_id = 1;
        $categories = Category::all();
        // $products = Product::where('display_order',$category_id)->get();
        return view('admin.products', compact('categories'));
    }

    public function create()
    {
        return view('admin.products_create');
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
}
