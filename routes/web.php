<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\ProductsController::class,'index'])->name('products');
Route::get('/product/{id}', [\App\Http\Controllers\ProductsController::class,'product'])->name('get_product');
Route::post('/proc', [\App\Http\Controllers\ProductsController::class,'proccess'])->name('proccess');
