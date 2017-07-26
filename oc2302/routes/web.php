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

Route::get('/', 'WarehouseController@index');
Route::get('/onlinedata', 'WarehouseController@get_online_data');
Route::get('/addcategories', 'WarehouseController@add_categories');
Route::get('/addcategorypath', 'WarehouseController@add_category_path');
