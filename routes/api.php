<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::POST('get-daraz-product-data',[\App\Http\Controllers\Controller::class, 'getdata_api']);
Route::POST('getdata_seller',[\App\Http\Controllers\Controller::class, 'getdata_seller']);
Route::POST('getdata_review',[\App\Http\Controllers\Controller::class, 'getdata_review']);
Route::POST('weather/five-day',[\App\Http\Controllers\Controller::class, 'five_day_forcast']);
