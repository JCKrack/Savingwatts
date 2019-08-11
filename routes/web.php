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
Route::get('get/measurements','chartController@getAllMeasure');
Route::get('get/dataindex','IndexController@getDataIndex');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', 'IndexController@index', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/search', function () {
    return view('advanced_search');
})->name('advanced_search');


/*
Route::get('/', function () {
    return view('dashboard');
})->name('home');
*/

Route::resource('devices', 'DeviceController');