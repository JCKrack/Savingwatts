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

Route::get('/','IndexController@index');
Route::get('/analytics/filter','AnalyticsController@filter');
Route::get('get/measurements','chartController@getAllMeasure');
Route::get('get/dataindex','IndexController@getDataIndex');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', 'IndexController@index', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/analytics','AnalyticsController@Index')->name('analytics');


/*
Route::get('/', function () {
    return view('dashboard');
})->name('home');
*/

Route::resource('devices', 'DeviceController');
Route::get('/devices', 'DeviceController@index')->name('devices');
Route::get('/devices/get/measurements', 'DeviceApi@getValuesToChart');
Route::get('/devices/get/data', 'DeviceApi@getDeviceData');