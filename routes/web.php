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

Route::get('/schedules/week', 'ScheduleController@selectMarketWeek')->name('schedules.select');
Route::post('/week/selected', 'ScheduleController@selectedWeek')->name('week.selected');
Route::post('/week/create', 'ScheduleController@storeWeek')->name('week.store');
Route::get('/schedules', 'ScheduleController@index')->name('schedules.index');
Route::get('week/{week}/schedules/create', 'ScheduleController@create')->name('schedules.create');
Route::post('schedules/store','ScheduleController@storeSchedule')->name('schedules.store');
Route::get('schedules/{id}/','ScheduleController@show')->name('schedules.show');
Route::post('schedules/show','ScheduleController@showSchedule')->name('schedules.showSchedule');
Route::get('schedules/edit/{id}','ScheduleController@edit')->name('schedules.edit');
Route::patch('schedules/update/{id}','ScheduleController@update')->name('schedules.update');

Route::get('downloadSchedules/{cod}/{cod2}', 'ScheduleController@pdf')->name('schedules.pdf');
Route::get('reportsGenerator', 'ScheduleController@callViews')->name('reports.index');
Route::get('reportForHour', 'ScheduleController@empHour')->name('empHour.index');
Route::get('schedules/reportsForHour/{cod}/{cod2}','ScheduleController@showEmpHour')->name('schedules.showEmpHour');

Route::resource('hours', 'HourController');