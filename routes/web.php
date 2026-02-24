<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\ShoppingCartController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () { return view('home');});

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/product-details/{id}', [FrontendController::class, 'productDetails'])->name('product.details');

Route::post('/add-to-cart', [ShoppingCartController::class, 'addToCart'])->name('cart.add');

Route::get('/user-login', [FrontendController::class, 'userlogin'])->name('user.login');

Route::get('/user-register', [FrontendController::class,'userRegister'])->name('user.register');
Route::post('/user-register-store', [FrontendController::class,'registerStore'])->name('user.register.store');
Route::get('/otp/varification/{otp}', [FrontendController::class,'otpVarification']);
Route::post('/user-login', [FrontendController::class, 'userloginPost'])->name('user.login');

Route::get('/view-carts', [ShoppingCartController::class, 'viewCarts'])->name('view.carts');
Route::post('/cart/update-ajax', [ShoppingCartController::class, 'updateCartAjax'])->name('cart.update.ajax');
Route::post('/cart/delete-ajax', [ShoppingCartController::class, 'deleteCartAjax'])->name('cart.delete.ajax');
Route::get('/checkout', [ShoppingCartController::class, 'checkout'])->name('checkout');

Route::post('/buy-now', [FrontendController::class, 'buyNow'])->name('buy.now');





Route::get('/category/{id}', function ($id) {
    // category wise product
})->name('shop.category');
Route::get('/sub-category/{id}', fn($id) => '')->name('shop.subcategory');


Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth','admin'])->name('dashboard');

//Route::get('/dashboard', function () {return view('dashboard');})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth','admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');


Route::get('/categories',[CategoryController::class,'index'])->name('category.index');
Route::get('/categories/create',[CategoryController::class,'create'])->name('category.create');
Route::post('/categories/store',[CategoryController::class,'store'])->name('category.store');
Route::get('/categories/Edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
Route::put('/categories/update/{id}',[CategoryController::class,'update'])->name('category.update');
Route::delete('category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

Route::get('/sub_categories',[SubCategoryController::class,'index'])->name('sub_category.index');
Route::get('/sub_categories/create',[SubCategoryController::class,'create'])->name('sub_category.create');
Route::post('/sub_categories/store',[SubCategoryController::class,'store'])->name('sub_category.store');
Route::get('/sub_categories/Edit/{id}',[SubCategoryController::class,'edit'])->name('sub_category.edit');
Route::put('/sub_categories/update/{id}',[SubCategoryController::class,'update'])->name('sub_category.update');
Route::delete('sub_categories/{id}', [SubCategoryController::class, 'destroy'])->name('sub_category.destroy');

//products

Route::resource('products', ProductController::class);
Route::get('/sub-categories/{category}', [ProductController::class, 'getSubCategories']);


Route::get('/products',[ProductController::class,'index'])->name('product.index');
Route::get('/products/create',[ProductController::class,'create'])->name('product.create');
Route::post('/products/store',[ProductController::class,'store'])->name('product.store');
Route::get('/products/Edit/{id}',[ProductController::class,'edit'])->name('product.edit');
Route::put('/products/update/{id}',[ProductController::class,'update'])->name('product.update');
Route::delete('products/{id}', [ProductController::class, 'destroy'])->name('product.destroy');


});

require __DIR__.'/auth.php';

