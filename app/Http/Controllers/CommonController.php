<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('website.home',compact('categories'));
    }

    public function productList(Request $req , $category_url){

        $category_id = Category::where("category_url","=",$category_url)->value("id");
        //dd($category_url,$category_id);
        $products = Product::where("prod_category_id","=",$category_id)->get();
        return view('website.products_list',compact('products'));
    }

    public function productDetails(Request $req , $prod_id){
        $product = Product::where("id","=",$prod_id)->first();
        return view('website.product_details',compact('product'));
    }

    public function checkout(){
        $product = Product::where("id","=",1)->first();
        return view('website.checkout' , compact('product'));
    }
}
