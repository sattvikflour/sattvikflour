<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    { 
        $categories = Category::all();
        return view('admin.categories', compact('categories'));
    }

    public function create()
    {
        return view('admin.category_create');
    }

    public function store(Request $request)
    {
        //dd($request);
        $fileName = null;
        $request->validate([
            'category_name' => 'required|string|max:255',
            'category_url' => 'required|string|max:255',
            'category_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120', // 5120 KB (5 MB) limit
            'avail_status' => 'required|boolean',
            // Add validation rules for other fields if needed
        ]);
        //dd($request , $request->hasFile('category_img'));
        if ($request->hasFile('category_img')) {
            //$imagePath = $request->category_img->store('category_images', 'public');
            date_default_timezone_set('Asia/Kolkata');
            //dd(date('YmdHisv'));
            $fileName = date('YmdHisv') . '.' . $request->category_img->getClientOriginalExtension();
            $imagePath = $request->category_img->storeAs('public/category_images', $fileName);
            //dd($imagePath);
        }
        $category_url = strtolower($request->input('category_url'));       
        Category::create([
            'category_name' => $request->input('category_name'),
            'category_url' => $category_url,
            'category_img' => $fileName,
            'avail_status' => $request->input('avail_status'),
            // Add other fields if needed
        ]);

        return redirect()->route('categories.view')->with('success', 'Category added successfully!');
    }


    // You can add more methods for handling CRUD operations

    public function edit($id)
    {
        // Fetch the category with the given ID
        $category = Category::findOrFail($id);

        // Pass the category to the edit view
        return view('admin.category_edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'category_url' => 'required|string|max:255',
            'avail_status' => 'required|boolean',
            'category_img' => 'image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $category = Category::findOrFail($id);
        if ($request->hasFile("category_img")) {
            $oldFileName = Category::find($id)->category_img;
            //$fileExists = Storage::disk('public')->exists('category_images/' . $oldFilePath);
            //dd($fileExists);
            try {
                Storage::disk('public')->delete('category_images/' . $oldFileName);
            } catch (\Exception $e) {
                dd($e->getMessage());
            }
        }

        $category->update([
            'category_name' => $request->input('category_name'),
            'category_url' => $request->input('category_url'),
            'avail_status' => $request->input('avail_status'),
            'category_img' => $request->hasFile('category_img') ? $this->uploadImage($request->file('category_img')) : $category->category_img,
        ]);

        return redirect()->route('categories.view')->with('success', 'Category updated successfully!');
    }

    // Helper method to upload image
    private function uploadImage($file)
    {
        date_default_timezone_set('Asia/Kolkata');
        //dd(date('YmdHisv'));
        $fileName = date('YmdHisv') . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/category_images', $fileName);
        return $fileName;
    }
}
