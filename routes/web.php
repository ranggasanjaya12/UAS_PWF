<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\BlogDetailsController;
use App\Http\Controllers\Frontend\ProductDetailsController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
  
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
  
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

// <!--================User Area =================-->
Route::get('/', [\App\Http\Controllers\Frontend\HomepageController::class, 'index']);
Route::get('/contact', [\App\Http\Controllers\Frontend\ContactController::class, 'index']);
Route::get('/shop', [\App\Http\Controllers\Frontend\ShopController::class, 'index']);
Route::get('/blog', [\App\Http\Controllers\Frontend\BlogController::class, 'index']);
Route::get('/productdetails', [\App\Http\Controllers\Frontend\BlogDetailsController::class, 'index'])->name('blogdetails.index');
Route::get('/blogdetails/{title}', [App\Http\Controllers\Frontend\BlogDetailsController::class, 'show'])->name('blogdetails.show');
Route::get('/productdetails', [\App\Http\Controllers\Frontend\ProductDetailsController::class, 'index'])->name('productdetails.index');
Route::get('/productdetails/{title}', [App\Http\Controllers\Frontend\ProductDetailsController::class, 'show'])->name('productdetails.show');
Route::get('/products/category/{id}', [ProductController::class, 'filterByCategory'])->name('products.filter');
Route::post('/comments/store', [BlogController::class, 'storeComment'])->name('post.comment.store');
Route::get('/comments/count', [BlogController::class, 'countComments'])->name('post.comment.count');
// <!--================EndUser Area =================-->

// <!--================Admin Area =================-->
Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {return view('dashboard');})->name('dashboard');
    Route::resource('sliders', \App\Http\Controllers\Admin\SliderController::class)->except('show');
    Route::resource('offers', \App\Http\Controllers\Admin\OfferController::class)->except('show');
    Route::resource('categorys', \App\Http\Controllers\Admin\CategoryController::class)->except('show');
    Route::resource('products', \App\Http\Controllers\Admin\ProductController::class)->except('show');
    Route::resource('catblogs', \App\Http\Controllers\Admin\CatBlogController::class)->except('show');
    Route::resource('postblogs', \App\Http\Controllers\Admin\PostBlogController::class)->except('show');
}); 
// <!--================End Admin Area =================-->
