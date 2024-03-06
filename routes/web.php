<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('website.home');
// });

Route::get('/',[CommonController::class,'index'])->name('home');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login-submit', [LoginController::class, 'loginSubmit'])->name('login.submit');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');

Route::get('/category/{category_url}',[CommonController::class,'productList'])->name('view.category');
Route::get('/product/{prod_id}',[CommonController::class,'productDetails'])->name('view.product');

Route::get('/register', [RegisterController::class, 'registrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('registration-submit');


Route::post('/ajax-add-to-cart', [CartController::class,'ajaxAddToCart']);
Route::get('/practice', [PracticeController::class,'viewPractice']);

Route::get('/checkout',[CheckoutController::class,'checkout'])->name('checkout');

//Admin Routes
Route::middleware('admin')->group(function () {

Route::get('/admin/dashboard',[AdminController::class,'index'])->name('admin.dashboard');

Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories.view');
Route::get('/admin/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/admin/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('/admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/admin/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');

Route::get('/admin/products',[ProductController::class, 'index'])->name('admin.products');
Route::get('/ajax-get-products', [ProductController::class,'ajaxGetProducts'])->name('ajax-get-products');
Route::get('/admin/product/create',[ProductController::class,'create'])->name('product.create');
Route::post('/admin/product/store',[ProductController::class,'store'])->name('product.store');
// Route::get('/product/view/{id}',[ProductController::class,'view'])->name('product.view');
Route::get('/admin/product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
Route::post('/admin/product/update/{id}',[ProductController::class,'update'])->name('product.update');

Route::post('/ajax-update-order', [ProductController::class,'ajaxUpdateOrder'])->name('ajax-update-order');


});