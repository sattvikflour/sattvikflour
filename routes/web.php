<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\ProductController;
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

Route::get('/',[CommonController::class,'index'])->name('index');
Route::get('/category/{category_url}',[CommonController::class,'productList'])->name('category_url');
Route::get('/product/{prod_id}',[CommonController::class,'productDetails'])->name('prod_id');

Route::get('/register', [RegisterController::class, 'registrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('registration-submit');

Route::get('/login', [LoginController::class, 'loginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login-submit');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.view');
Route::get('/products',[ProductController::class, 'index'])->name('products');

Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');

Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');

Route::get('/products/create',[ProductController::class,'create'])->name('product.create');
Route::post('/product/store',[ProductController::class,'store'])->name('product.store');

Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
Route::post('/product/update/{id}',[ProductController::class,'update'])->name('product.update');

Route::post('/add-to-cart', [CartController::class,'addToCart']);
Route::get('/practice', [PracticeController::class,'viewPractice']);

Route::get('/checkout',[CheckoutController::class,'checkout'])->name('checkout');
