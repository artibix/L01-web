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

/* 确认邮箱 */
Route::get('signup/confirm/{token}', 'UsersController@confirmEmail')->name('confirm_email');

/* 忘记密码 */
Route::get('password/reset', 'PasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'PasswordController@sendResetLinkEmail')->name('password.email');

Route::get('password/reset/{token}', 'PasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'PasswordController@reset')->name('password.update');

/* 微博 */
Route::resource('statuses', 'StatusesController', ['only' => ['store', 'destroy']]);

/* 粉丝 */
Route::get('/users/{user}/followerings', 'UsersController@followings')->name('users.followings');
Route::get('/users/{user}/followers', 'UsersController@followers')->name('users.followers');

/* 关注 */
Route::post('/users/followers/{user}', 'FollowersController@store')->name('followers.store');
/* unfllow */
Route::delete('/users/followers/{user}', 'FollowersController@destroy')->name('followers.destroy');
