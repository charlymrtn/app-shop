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

Route::get('/', 'TestController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->middleware(['auth','admin'])->group(function () {
    Route::resource('products','ProductController');

    Route::get('products/{id}/images','ImageController@index')->name('images.index');
    Route::post('products/{id}/images','ImageController@store')->name('images.store');
    Route::delete('products/{id}/images','ImageController@destroy')->name('images.destroy');
    Route::get('products/{product}/images/{image}/featured','ImageController@featured')->name('images.featured');
});
