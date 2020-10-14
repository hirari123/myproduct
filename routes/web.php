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

// "/"のルーティング
Route::get('/', function () {
    return view('auth.login');
});

// 投稿関連のルーティング
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::post('article/create', 'Admin\ArticleController@create');
    Route::get('article/edit', 'Admin\ArticleController@edit');
    Route::post('article/edit', 'Admin\ArticleController@update');
    Route::get('article/delete', 'Admin\ArticleController@delete');

    Route::get('article/show', 'Admin\ArticleController@show');
    Route::get('articles', 'Admin\ArticleController@index');

    Route::post('article/show', 'Admin\CommentController@create');
    Route::get('comment/edit', 'Admin\CommentController@edit');
    Route::post('comment/edit', 'Admin\CommentController@update');
    Route::get('comment/delete', 'Admin\CommentController@delete');
});

// プロフィール関連のルーティング
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('profile/create', 'Admin\ProfileController@add');
    Route::post('profile/create', 'Admin\ProfileController@create');
    Route::get('profile/edit', 'Admin\ProfileController@edit');
    Route::post('profile/edit', 'Admin\ProfileController@update');
    Route::get('profile/delete', 'Admin\ProfileController@delete');
    Route::get('users', 'Admin\ProfileController@index');
});

// Authファサードで生成されるルーティング
Auth::routes();

// ゲストログインのルーティング
Route::post('login/guest', 'Auth\LoginController@guestLogin')->name('login.guest');

// home画面へのルーティング→無効する
// Route::get('/home', 'HomeController@index')->name('home');
