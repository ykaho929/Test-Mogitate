<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SeasonController;


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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/search', [ProductController::class,'search']);
Route::post('/products',[ProductController::class, 'store'])->name('products.store');
Route::get('/products/register',[SeasonController::class, 'create']);
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::patch('/products', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products{product}', [ProductController::class, 'destroy'])->name('products.destroy');