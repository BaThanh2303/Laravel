<?php

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
\Illuminate\Support\Facades\Auth::routes();
Route::get('/', [\App\Http\Controllers\HomeController::class,"home"]);
Route::get("/category/{category:slug}",[\App\Http\Controllers\HomeController::class,"category"]);
Route::get("about-us",[\App\Http\Controllers\HomeController::class,"aboutUs"]);
Route::get("/detail/{product:slug}",[\App\Http\Controllers\HomeController::class,"shop_detail"]);

Route::middleware("auth")->group(function (){
    Route::get("shop",[\App\Http\Controllers\HomeController::class,"home"]);
    Route::get("blog",[\App\Http\Controllers\HomeController::class,"blog"]);
    Route::get("contact",[\App\Http\Controllers\HomeController::class,"contact"]);
    Route::get("/detail/{product:slug}",[\App\Http\Controllers\HomeController::class,"shop_detail"]);
    Route::get("/checkout",[\App\Http\Controllers\HomeController::class,"checkout"]);
    Route::get("blog/blog_detail",[\App\Http\Controllers\HomeController::class,"blog_detail"]);
    Route::get("/cart", [\App\Http\Controllers\HomeController::class,"shopping_cart"]);
    Route::get("/category/{category:slug}",[\App\Http\Controllers\HomeController::class,"category"]);
    Route::get("/add-to-cart/{product}", [\App\Http\Controllers\HomeController::class,"addToCart"]);
    Route::get("/remove-cart/{product}",[\App\Http\Controllers\HomeController::class,"RemoveCart"]);
    Route::post("/checkout",[\App\Http\Controllers\HomeController::class,"placeOrder"]);
    Route::get("/thank-you/{order}",[\App\Http\Controllers\HomeController::class,"thankYou"]);
    Route::get("/admin",[\App\Http\Controllers\HomeController::class,"admin"]);
    Route::get("/table",[\App\Http\Controllers\HomeController::class,"table"]);
    Route::get("/paypal-success/{order}",[\App\Http\Controllers\HomeController::class,"paypalSuccess"]);
    Route::get("/paypal-cancel/{order}",[\App\Http\Controllers\HomeController::class,"paypalCancel"]);
});

Route::middleware(["auth","is_admin"])->prefix("admin")->group(function (){
    include_once "admin.php";
});



