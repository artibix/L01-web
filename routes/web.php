<?php

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

Route::get('/', 'StaticPagesController@home')->name('home');
Route::get('/help', 'StaticPagesController@help')->name('help');
Route::get('/about', 'StaticPagesController@about')->name('about');

/* 注册 */
Route::get('signup', 'UsersController@create')->name('signup');
Route::resource('users', 'UsersController');

/* 显示登陆界面 */
Route::get('login', 'SessionsController@create')->name('login');
/* 创建新会话 */
Route::post('login', 'SessionsController@store')->name('login');
/* 注销 */
Route::delete('logout', 'SessionsController@destroy')->name('logout');


