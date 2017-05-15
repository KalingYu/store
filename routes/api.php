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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::get('goods', 'ApiController@getGoods');
Route::get('carts/{openId}', 'ApiController@getCart');
Route::get('order/{openId}', 'ApiController@getOrder');
Route::get('users/{openId}', 'ApiController@getUser');
Route::post('users', 'ApiController@updateUser');
Route::post('carts', 'ApiController@addToCart');
Route::get('carts/{openId}', 'ApiController@getCarts');
Route::post('carts/delete', 'ApiController@deleteCarts');
Route::get('wxUserInfo', 'ApiController@getWxUserInfo');
Route::get('code/', 'ApiController@getCode');