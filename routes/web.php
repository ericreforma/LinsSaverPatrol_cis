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

Route::group(['middleware' => 'auth'], function(){

    // CUSTOMER
    Route::prefix('customer')->group(function(){
        Route::get('/list', 'CustomerController@index')->name('customer_list');
        Route::get('/add', 'CustomerController@store_view')->name('customer_add');
        Route::post('/add', 'CustomerController@store')->name('customer_store');
        Route::get('/details/{id}', 'CustomerController@details')->name('customer_details');
        Route::get('/edit/{id}', 'CustomerController@edit_view')->name('customer_editview');
        Route::post('/edit', 'CustomerController@edit_store')->name('customer_editstore');

    });

    // CUSTOMER
    Route::prefix('item')->group(function(){
        Route::get('/list', 'ItemController@index')->name('item_list');
        Route::get('/add', 'ItemController@store_view')->name('item_add');
        Route::post('/add', 'ItemController@store')->name('item_store');
        Route::get('/details/{id}', 'ItemController@details')->name('item_details');
        Route::get('/edit/{id}', 'ItemController@edit_view')->name('item_editview');
        Route::post('/edit', 'ItemController@edit_store')->name('item_editstore');
    });
});
