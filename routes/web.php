<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->middleware(['auth','admin'])->namespace('Product')->group(function () {
    Route::resource('products','ProductController')->except('show');

    Route::get('products/{id}/images','ImageController@index')->name('images.index');
    Route::post('products/{id}/images','ImageController@store')->name('images.store');
    Route::delete('products/{id}/images','ImageController@destroy')->name('images.destroy');
    Route::get('products/{product}/images/{image}/featured','ImageController@featured')->name('images.featured');

    Route::resource('categories','CategoryController')->except('show');
});

Route::middleware(['auth'])->group(function() {
    Route::get('query','Product\ProductController@query')->name('query');
    Route::get('products/json','Product\ProductController@json')->name('products.json');

    Route::get('products/{product}','Product\ProductController@show')->name('products.show');
    Route::get('categories/{category}','Product\CategoryController@show')->name('categories.show');
    Route::get('/', 'HomeController@welcome');

    Route::resource('cart', 'Cart\CartDetailController');

});

