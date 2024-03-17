<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPanelController extends Controller
{
    public function index(){
        $totalCategoryCount = Category::count();
        $totalProductCount = Product::count();
        return view('admin.dashboard',compact('totalCategoryCount','totalProductCount'));
    }

    public function ajaxProductPieChart(Request $request){
        // dd('hello');
        $hexCodes = array(
            "#800080", // Purple
            "#00FFFF", // Cyan
            "#FF0000", // Red
            "#00FF00", // Green
            "#0000FF", // Blue
            "#FFFF00", // Yellow
            "#FFA500", // Orange
        );
        $data = array();
        $i = 0;
        $categories = Category::all();
        $totalCategoryCount = $categories->count();
        $totalProductCount = Product::count();
        foreach($categories as $category){
            // $count = Product::where('prod_category_id',$category->id)->groupBy('prod_category_id')->get()->count();
            $count = Product::where('prod_category_id', $category->id)->count();
            $data['label'][]=$category->category_name;
            $data['count'][]=$count;
            $data['color'][]=$hexCodes[$i];
            $i++;
        }     
        return response()->json(['product'=>$data,'totalCategories'=>$totalCategoryCount,'totalProducts'=>$totalProductCount],200);
        
    }

}
