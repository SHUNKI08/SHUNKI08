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

//stocks関係
Route::get('/', 'StocksController@stockList');
Route::post('/', 'StocksController@store');
Route::delete('/stocks/{stock}', 'StocksController@delete');

//posts検索機能
Route::get('/postlist','FormController@postlist');
Route::get('/postlist','FormController@search');

//posts関係
Route::get('/posts', 'PostsController@postList');
Route::post('/posts', 'PostsController@store');
Route::delete('/posts/{post}', 'PostsController@delete');

//user関連
//ユーザーページ表示
Route::get('/user', 'UsersController@mypage');
//Route::get('/user', 'PostsController@yourPost');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
