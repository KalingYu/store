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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('api/goods', 'ApiController@getGoods');
//Route::get('api/carts/{openId}', 'ApiController@getCart');
//Route::get('api/order/{openId}', 'ApiController@getOrder');
//Route::get('api/users/{openId}', 'ApiController@getUser');
//Route::post('api/users/', 'ApiController@updateUser');