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
    return view('welcome');
});
Route::get('/insert/values/{stationId}/{value}','ApiController@insertValues');
Route::get('/get/wattsValue','HomeController@wattsValues');
Route::get('/get/dataMetre','HomeController@getDataMetre');
Route::get('/get/data','HomeController@getDatas');
Route::get('/test/test', 'HomeController@test');
Route::get('{station}','HomeController@index');



