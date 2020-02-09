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



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('product', 'ProductController');


/*
  TESTING METHODS
*/
Route::get('/testing', 'TestingController@index');
Route::get('/createProduct', 'TestingController@createProduct');
Route::get('/getUserProducts', 'TestingController@getUserProducts');
Route::get('/updateUserProduct', 'TestingController@updateUserProduct');
Route::get('/deleteUserProduct', 'TestingController@deleteUserProduct');
Route::get('/createRole', 'TestingController@createRole');
