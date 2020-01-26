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

Route::get('/', 'Shop@index');

Route::get('/success', function () {
  return view('success');
});

Route::get('/privacy', function () {
  return view('privacy');
});

Route::prefix('api')->group(function () {
  Route::post('/newOrder', 'ShopApi@newOrder');
});

Route::group(['middleware' => 'basicAuth'], function () {
  Route::prefix('admin')->group(function () {
    Route::get('/', function () {
      return view('admin.dashboard');
    });
    Route::get('profile', function () {
      return view('admin.profile');
    });
    Route::get('/orders', function () {
      return view('admin.orders');
    });
    Route::get('/options', function () {
      return view('admin.options');
    });
    Route::prefix('api')->group(function () {
      Route::get('/getOrders', 'AdminActions@getOrders');
      Route::get('/getOptions', 'AdminActions@getOptions');
      Route::post('/saveOptions', 'AdminActions@saveOptions');
      Route::post('/setOrderState', 'AdminActions@setOrderState');
    });
  });
});