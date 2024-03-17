<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('display_order', 'asc')->get();
        return view('website.home', compact('categories'));
    }

    public function productList(Request $req, $category_url)
    {

        $categoryId = Category::where("category_url", "=", $category_url)->value("id");
        //dd($category_url,$category_id);
        $products = Product::where("prod_category_id", "=", $categoryId)->orderBy('display_order', 'asc')->get();
        if(!$products){
            abort(404);
        }
        return view('website.products_list', compact('products'));
    }

    public function productDetails(Request $req, $prod_id)
    {
        $product = Product::where("id", "=", $prod_id)->first();
        if(!$product){
            abort(404);
        }
        $productId = $prod_id;
        return view('website.product_details', compact('product', 'productId'));
    }

    public function checkout()
    {
        $product = Product::where("id", "=", 1)->first();
        return view('website.checkout', compact('product'));
    }
}
