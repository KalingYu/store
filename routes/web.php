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
    return view('store');
});

Route::get('store/{openId}', 'UserController@toStorePage');
Route::get('code', 'UserController@getCode');
//Route::get('code', function () {
//    return view('code');
//});

Route::get('store', 'UserController@toStorePage');
Route::get('token', 'UserController@getAccessToken');