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

// Route::post('/registrar', 'Auth\LoginUserController@RegistroCliente');

Route::post('login', 'Auth\LoginController@login') ->name('login');

//Inicio(logueado)
Route::get('dashboard','DashboardController@index')->name('dashboard');

Route::post('showLogin', 'Auth\LoginController@ShowLogin') ->name('showLogin');

Route::post('logout', 'Auth\LoginController@LogOut') ->name('logout');




