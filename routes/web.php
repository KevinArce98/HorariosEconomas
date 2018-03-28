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
    return view('user.login');
});

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register/create', 'Auth\RegisterController@register')->name('register.create');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('markets', 'MarketController');
Route::get('/markets/{id}/delete', 'MarketController@delete')->name('markets.delete');

Route::resource('roles', 'RoleController');
Route::get('/roles/{id}/delete', 'RoleController@delete')->name('roles.delete');

Route::resource('positions', 'PositionController');
Route::get('/positions/{id}/delete', 'PositionController@delete')->name('positions.delete');

Route::resource('users', 'UserController');
Route::get('/users/{id}/delete', 'UserController@delete')->name('users.delete');

Route::resource('schedules', 'ScheduleController');
