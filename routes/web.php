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

Route::get('/', 'ProductController@index');

Route::get('/shop', 'HomeController@shop')->name('shop');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('product', 'ProductController');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('cart', 'CartController');
    Route::post('/cart/reset', 'CartController@reset');

    Route::resource('order', 'OrderController');

    Route::post('/order/confirm', 'OrderController@confirm');
    Route::get('/order/thanks', 'OrderController@thanks');
});
