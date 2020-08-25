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
  return view('auth.login');
  
});

//Export xls
Route::get('stock/export/', 'StockTakingController@export');
Route::get('sale/export/', 'SaleController@export');



//Inicio(logueado)
Route::post('login', 'Auth\LoginController@login') ->name('login');

Route::get('homeProduct','ProductController@index')->name('home');

Route::get('/', 'Auth\LoginController@showLogin');

Route::post('logout', 'Auth\LoginController@LogOut') ->name('logout');

//Productos

Route::resource('product', 'ProductController');
 Route::get('product/changeStatus/{id}', 'ProductController@updateAvailability')->name('changeStatus');

//Inventario
Route::resource('stock', 'StockTakingController');

//Ventas
Route::resource('sale', 'SaleController');
Route::get('sale/cancelSale/{id}', 'SaleController@updateAvailability')->name('cancelSale');
Route::post('sale/fetchM', 'SaleController@fetchMecanic')->name('sale.fetchM');
Route::post('sale/fetchE', 'SaleController@fetchElectric')->name('sale.fetchE');
Route::post('sale/fetchI', 'SaleController@fetchIlumination')->name('sale.fetchI');
Route::get('sale/changeStatus/{id}', 'SaleController@updateStatus')->name('saleChangeStatus');
