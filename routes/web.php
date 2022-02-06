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

//stocks一覧画面を表示
Route::get('/', 'StockController@stockList');
Route::post('/', 'StockController@store');

//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');