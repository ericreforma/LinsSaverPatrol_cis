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

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', 'CustomerController@index')->name('customer_list');

    // CUSTOMER
    Route::prefix('customer')->group(function(){
        Route::get('/list', 'CustomerController@index')->name('customer_list');
        Route::get('/add', 'CustomerController@store_view')->name('customer_add');
        Route::post('/add', 'CustomerController@store')->name('customer_store');
        
        Route::get('/details/{id}', 'CustomerController@details')->name('customer_details');
        Route::get('/edit/{id}', 'CustomerController@edit_view')->name('customer_editview');
        Route::post('/edit', 'CustomerController@edit_store')->name('customer_editstore');

    });

    // ITEM
    Route::prefix('item')->group(function(){
        Route::get('/list', 'ItemController@index')->name('item_list');
        Route::get('/add', 'ItemController@store_view')->name('item_add');
        Route::post('/add', 'ItemController@store')->name('item_store');
        Route::get('/details/{id}', 'ItemController@details')->name('item_details');
        Route::get('/edit/{id}', 'ItemController@edit_view')->name('item_editview');
        Route::post('/edit', 'ItemController@edit_store')->name('item_editstore');
    });

    // REPORT
    Route::prefix('report')->group(function(){
        Route::get('/', 'ReportController@index')->name('report_view');
    });

    // USER
    Route::prefix('users')->group(function(){
        Route::get('/list', 'UserController@list')->name('users_list');
        Route::get('/add', 'UserController@store_view')->name('users_add');
        Route::post('/add', 'UserController@store')->name('users_store');
        Route::get('/edit/{id}', 'UserController@edit_view')->name('users_edit');
        Route::post('/edit/{id}', 'UserController@edit_store')->name('users_edit_save');
        Route::get('/details/{id}', 'UserController@details')->name('users_details');
    });

    // Profile
    Route::prefix('profile')->group(function(){
        Route::get('/', 'UserController@profile_view')->name('profile');
        Route::post('/', 'UserController@profile_store')->name('profile_store');
    });

    // Store Category
    Route::prefix('storeCategory')->group(function(){
        Route::get('/', 'StoreCategoryController@index')->name('storeCategory_view');
    });
});