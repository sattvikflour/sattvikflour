<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminPanelController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
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

Route::get('/', [CommonController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login-submit', [LoginController::class, 'loginSubmit'])->name('login.submit');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/category/{category_url}', [CommonController::class, 'productList'])->name('view.category');
Route::get('/product/{prod_id}', [CommonController::class, 'productDetails'])->name('view.product');

Route::get('/register', [RegisterController::class, 'registrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('registration-submit');


Route::post('/ajax-add-to-cart', [CartController::class, 'ajaxAddToCart']);
Route::get('/practice', [PracticeController::class, 'viewPractice']);

// Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');

Route::post('/checkout',[OrderController::class,'orderDetails'])->name('checkout');
Route::get('/cart-checkout',[OrderController::class,'cartCheckout'])->name('cart.checkout');

//Admin Routes
Route::middleware('admin')->group(function () {

    Route::get('/admin/dashboard', [AdminPanelController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/categories', [AdminCategoryController::class, 'index'])->name('admin.categories.view');
    Route::get('/admin/category/create', [AdminCategoryController::class, 'create'])->name('category.create');
    Route::post('/admin/category/store', [AdminCategoryController::class, 'store'])->name('category.store');
    Route::get('/admin/category/edit/{id}', [AdminCategoryController::class, 'edit'])->name('category.edit');
    Route::put('/admin/category/update/{id}', [AdminCategoryController::class, 'update'])->name('category.update');

    Route::get('/admin/products', [AdminProductController::class, 'index'])->name('admin.products');
    Route::get('/admin/product/create', [AdminProductController::class, 'create'])->name('product.create');
    Route::post('/admin/product/store', [AdminProductController::class, 'store'])->name('product.store');
    // Route::get('/product/view/{id}',[AdminProductController::class,'view'])->name('product.view');
    Route::get('/admin/product/edit/{id}', [AdminProductController::class, 'edit'])->name('product.edit');
    Route::post('/admin/product/update/{id}', [AdminProductController::class, 'update'])->name('product.update');
    Route::get('/admin/product/delete/{id}', [AdminProductController::class, 'delete'])->name('product.delete');

    Route::get('/ajax-get-products', [AdminProductController::class, 'ajaxGetProducts'])->name('ajax-get-products');
    Route::post('/ajax-update-product-order', [AdminProductController::class, 'ajaxUpdateListOrder'])->name('ajax-update-product-order');
    Route::post('/ajax-product-types', [AdminProductController::class, 'ajaxProductTypes'])->name('ajax-product-types');
    Route::post('/ajax-packaging-options', [AdminProductController::class, 'ajaxPackagingOptions'])->name('ajax-packaging-options');
    Route::get('/ajax-product-chart-by-category', [AdminPanelController::class, 'ajaxProductPieChart'])->name('ajax-product-chart-by-category');
});
