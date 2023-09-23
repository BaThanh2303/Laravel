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

Route::get('/', [\App\Http\Controllers\HomeController::class,"home"]);
Route::get("about-us",[\App\Http\Controllers\HomeController::class,"aboutUs"]);
Route::get("shop",[\App\Http\Controllers\HomeController::class,"shop"]);
Route::get("blog",[\App\Http\Controllers\HomeController::class,"blog"]);
Route::get("contact",[\App\Http\Controllers\HomeController::class,"contact"]);
Route::get("/detail/{product:slug}",[\App\Http\Controllers\HomeController::class,"shop_detail"]);
Route::get("/checkout",[\App\Http\Controllers\HomeController::class,"checkout"]);
Route::get("blog/blog_detail",[\App\Http\Controllers\HomeController::class,"blog_detail"]);
Route::get("/cart", [\App\Http\Controllers\HomeController::class,"shopping_cart"]);
Route::get("/category/{category:slug}",[\App\Http\Controllers\HomeController::class,"category"]);
Route::get("/add-to-cart/{product}", [\App\Http\Controllers\HomeController::class,"addToCart"]);
Route::get("/remove-cart/{product}",[\App\Http\Controllers\HomeController::class,"RemoveCart"]);
