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
Route::get('/products', [App\Http\Controllers\ProductController::class, 'getAllProduct']);
Route::get('/products/{category_id}', [App\Http\Controllers\ProductController::class, 'search']);
Route::get('/product/{id}', [App\Http\Controllers\ProductController::class, 'getOneProduct']);

Route::get('/category', [App\Http\Controllers\CategoryController::class, 'getAllCategory']);
//Route::get('/clients', [App\Http\Controllers\AuthenticationController::class, 'login']);

Route::post('/login', [App\Http\Controllers\API\UserController::class, 'login']);
//Route::post('/login', 'API\UserController@login');
Route::post('/register', 'API\UserController@register');
Route::group(['middleware' => 'auth:api'], function()
{   Route::post('details', 'API\UserController@details');
});


Route::get('send-mail', function () {
    $details = [

        'title' => 'Mail from CakeShop',

        'body' => 'This is for testing email using smtp'

    ];
    \Mail::to('andreea.beji@gmail.com')->send(new \App\Mail\MyTestMail($details));
    dd("Email is Sent.");

});

Route::get('/', function () {
    return view('welcome');
});
