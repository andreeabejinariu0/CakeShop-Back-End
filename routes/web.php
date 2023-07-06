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
Route::get('/products', [App\Http\Controllers\ProductController::class, 'getAll']);
Route::get('/products/search/{category_id}', [App\Http\Controllers\ProductController::class, 'search']);

Route::get('/', function () {
    return view('welcome');
});
