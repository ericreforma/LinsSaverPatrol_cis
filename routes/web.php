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
Route::get('/', 'HomeController@index')->name('home');

Route::prefix('customer')->group(function(){
    Route::get('/list', 'CustomerController@index')->name('customer_list');
    Route::get('/add', 'CustomerController@store_view')->name('customer_add');
    Route::post('/add', 'CustomerController@store_view')->name('customer_store');
});

