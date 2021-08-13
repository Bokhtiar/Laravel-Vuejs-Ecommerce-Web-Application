<?php

use Illuminate\Http\Request;
use Color\Http\Controllers\ColorController;
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

Route::middleware('auth:api')->get('/color', function (Request $request) {
    return $request->user();
});

Route::group(["as"=>'color.', "prefix"=>'color'],function() {
    Route::get('/', 'ColorController@index');
    Route::post('store/', 'ColorController@storeOrUpdate');
    Route::post('update/{id}', 'ColorController@storeOrUpdate');
    Route::get('edit/{id}', 'ColorController@edit');
    Route::get('delete/{id}', 'CategoryController@destroy');
});
