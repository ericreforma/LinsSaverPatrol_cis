<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('geo')->group(function(){
    Route::get('provinces', 'GeoController@get_provinces');
    Route::get('cities', 'GeoController@get_cities');
    Route::get('barangays', 'GeoController@get_barangays');
});

Route::get('item/{id}', 'ItemController@get_item');

Route::prefix('sales')->group(function(){
    Route::post('store', 'SalesController@store');
    Route::get('totals/{id}', 'SalesController@get_totals');
    Route::post('delete', 'SalesController@delete');
    Route::get('details/{id}', 'SalesController@get_details');
    Route::get('ledger/get/{id}', 'SalesController@get_ledger');

});

Route::prefix('customer')->group(function(){
    Route::post('/status', 'CustomerController@setStatus')->name('customer_status');
    Route::get('list', 'CustomerController@get_list');
    Route::post('delete', 'CustomerController@delete');
});

Route::prefix('report')->group(function(){
    Route::get('city', 'ReportController@get_city');
    Route::get('barangay', 'ReportController@get_barangay');
    Route::get('customer', 'ReportController@get_customer');
    Route::get('credit', 'ReportController@get_credit');
    Route::get('daily', 'ReportController@get_daily');
});

Route::prefix('storeCategory')->group(function(){
    Route::get('/get', 'StoreCategoryController@view');
    Route::post('/add', 'StoreCategoryController@add');
    Route::get('/delete', 'StoreCategoryController@delete');
    Route::get('/details/{id}', 'StoreCategoryController@details');
});
