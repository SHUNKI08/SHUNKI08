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

//posts関係
Route::get('/posts', 'PostsController@postList');
Route::post('/posts', 'PostsController@store');
Route::delete('/posts/{post}', 'PostsController@delete');
//posts検索機能
Route::post('/postlist','FormController@postlist');


/*
Route::resource('/posts', 'PostController@search');
*/

//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');