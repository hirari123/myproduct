<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

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

// "/"にアクセスしたときのルーティング(あとで変更すること)
Route::get('/', function () {
  return view('welcome');
});

// 記事投稿関連のルーティング
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
  Route::get('article/create', 'Admin\ArticleController@add');
  Route::post('article/create', 'Admin\ArticleController@create');
  Route::get('article/edit', 'Admin\ArticleController@edit');
  Route::post('article/edit', 'Admin\ArticleController@update');
  Route::get('article/delete', 'Admin\ArticleController@delete');
  Route::get('articles', 'Admin\ArticleController@index');
});

// profile関連のルーティング
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
  Route::get('profile/create', 'Admin\ProfileController@add');
  Route::post('profile/create', 'Admin\ProfileController@create');
  Route::get('profile/edit', 'Admin\ProfileController@edit');
  Route::post('profile/edit', 'Admin\ProfileController@update');
  Route::get('users', 'Admin\ProfileController@index');
});

// Authファサードで生成されるルーティング
Auth::routes();

// home画面へのルーティング(初期)→あとで無効する
Route::get('/home', 'HomeController@index')->name('home');
