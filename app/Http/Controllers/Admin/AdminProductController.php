<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PackagingOption;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
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
        return view('admin.product_create', compact('categories'));
    }

    public function edit($id){
        // dd($id);
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.product_edit',compact('product','categories'));
    }

    public function store(Request $request)
    {
        // dd($request);
        // dd(!empty(array_filter($request->productType)),!empty(array_filter($request->packagingOption)));

        try {
            DB::beginTransaction();

            $fileName = null;
            // $validator = Validator::make($request->all(), [
            $request->validate([
                'product-category' => 'required|exists:categories,id',
                'prod-name' => 'required|string',
                'prod-original-price' => 'required|numeric',
                'prod-offer-status' => 'required|boolean',
                'prod-offer-price' => 'nullable|numeric',
                'prod-badge-status' => 'required|boolean',
                'prod-badge-text' => 'nullable|string',
                'multi-img-avail' => 'required|boolean',
                'prod-img' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
                'prod-details' => 'required|string',
                'prod-description' => 'nullable|string',
                'prod-summary' => 'nullable|string',
                'prod-types-avail' => 'required|boolean',
                'prod-type-label' => 'nullable|string',
                'packaging-opts-avail' => 'required|boolean',
                'packaging-opts-label' => 'nullable|string',
                'prod-specs-avail' => 'required|boolean',
                'prod-status' => 'required|boolean',
            ]);

            // if ($validator->fails()) {
            //     return redirect()->back()->withErrors($validator->errors())->withInput();
            // }

            // dd($request , $request->hasFile('prod-img'));
            if ($request->hasFile('prod-img')) {
                date_default_timezone_set('Asia/Kolkata');
                //dd(date('YmdHis'));
                $fileName = date('YmdHis') . '.' . $request->file('prod-img')->getClientOriginalExtension();
                // dd($fileName);
                $imagePath = $request->file('prod-img')->storeAs('assets/images', $fileName,'public');
                // dd($imagePath);
            }

           $product = Product::create([
                'prod_category_id' => $request->input('product-category'),
                'prod_name' => $request->input('prod-name'),
                'prod_original_price' => $request->input('prod-original-price'),
                'prod_offer_status' => $request->has('prod-offer-status'),
                'prod_offer_price' => $request->input('prod-offer-price'),
                'prod_badge_status' => $request->has('prod-badge-status'),
                'prod_badge_text' => $request->input('prod-badge-text'),
                'multi_img_avail' => $request->input('multi-img-avail'),
                'prod_img' => $fileName,
                'prod_details' => $request->input('prod-details'),
                'product_description' => $request->input('prod-description'),
                'product_summary' => $request->input('prod-summary'),
                'prod_types_avail' => $request->input('prod-types-avail'),
                'prod_type_label' => $request->input('prod-type-label'),
                'packaging_opts_avail' => $request->input('packaging-opts-avail'),
                'packaging_opts_label' => $request->input('packaging-opts-label'),
                'prod_specs_avail' => $request->input('prod-specs-avail'),
                'prod_status' => $request->has('prod-status') ? 1 : 0,
            ]);

            if(!empty(array_filter($request->productType))){
                foreach($request->productType as $prodType){
                ProductType::create([
                    'product_id' => $product->id,
                    'product_type' => $prodType,
                    'slug' => 'product_type',
                ]);
            }
            }

            if(!empty(array_filter($request->packagingOption))){
                foreach($request->packagingOption as $packOption){
                PackagingOption::create([
                    'product_id' => $product->id,
                    'packaging_option' => $packOption,
                    'slug' => 'packaging_option',
                ]);
            }
            }
            DB::commit();

            return redirect()->route('admin.products')->with(['status' => 'success', 'message'=>'Product added successfully']);
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
{
    try {
        DB::beginTransaction();

        $product = Product::findOrFail($id);

        $fileName = $product->prod_img;

        $request->validate([
            'product-category' => 'required|exists:categories,id',
            'prod-name' => 'required|string',
            'prod-original-price' => 'required|numeric',
            'prod-offer-status' => 'required|boolean',
            'prod-badge-status' => 'required|boolean',
            'multi-img-avail' => 'required|boolean',
            'prod-img' => 'image|mimes:jpeg,png,jpg,gif|max:5120',
            'prod-details' => 'required|string',
            'prod-types-avail' => 'required|boolean',
            'packaging-opts-avail' => 'required|boolean',
            'prod-specs-avail' => 'required|boolean',
            'prod-status' => 'required|boolean',
        ]);

        if ($request->hasFile('prod-img')) {

            // if ($product->prod_img) {
            //     $result = Storage::delete('assets/images/' . $product->prod_img);
            //     // dd($result);
            // }

            if ($product->prod_img) {
                $filePath = public_path('assets/images/' . $product->prod_img);
                if (File::exists($filePath)) {
                    File::delete($filePath);
                }
            }

            date_default_timezone_set('Asia/Kolkata');
            $fileName = date('YmdHis') . '.' . $request->file('prod-img')->getClientOriginalExtension();
            $imagePath = $request->file('prod-img')->storeAs('assets/images', $fileName, 'public');
        }

        $product->update([
            'prod_category_id' => $request->input('product-category'),
            'prod_name' => $request->input('prod-name'),
            'prod_original_price' => $request->input('prod-original-price'),
            'prod_offer_status' => $request->has('prod-offer-status'),
            'prod_offer_price' => $request->input('prod-offer-price'),
            'prod_badge_status' => $request->has('prod-badge-status'),
            'prod_badge_text' => $request->input('prod-badge-text'),
            'multi_img_avail' => $request->input('multi-img-avail'),
            'prod_img' => $fileName,
            'prod_details' => $request->input('prod-details'),
            'product_description' => $request->input('prod-description'),
            'product_summary' => $request->input('prod-summary'),
            'prod_types_avail' => $request->input('prod-types-avail'),
            'prod_type_label' => $request->input('prod-type-label'),
            'packaging_opts_avail' => $request->input('packaging-opts-avail'),
            'packaging_opts_label' => $request->input('packaging-opts-label'),
            'prod_specs_avail' => $request->input('prod-specs-avail'),
            'prod_status' => $request->has('prod-status') ? 1 : 0,
        ]);

        DB::commit();

        return redirect()->route('admin.products')->with(['status' => 'success', 'message' => 'Product updated successfully']);
    } catch (\Exception $e) {
        DB::rollBack();
        dd($e->getMessage());
        return redirect()->back()->withErrors([$e->getMessage()]);
    }
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
            return response()->json(['status' => 'error', 'message' => 'Error occurred' . $e->getMessage()], 500);
        }
    }

    public function ajaxProductTypes(){
        dd('Product Types Ajax');
        return response()->json(['status'=>'success','message'=>'Product types saved successfully']);
    }

    public function ajaxPackagingOptions(){
        dd('Packaging Options Ajax');
        return response()->json(['status'=>'success','message'=>'Packaging options saved successfully']);
    }


    public function stores(Request $request)
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
