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


Route::get('province','ProvinceController@countries');
Route::get('json-cities/{id}','ProvinceController@cities');
Route::get('json-districts/{id}','ProvinceController@districts');
Route::get('json-communes/{id}','ProvinceController@communes');
Route::get('json-villages/{id}','ProvinceController@villages');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
	Route::get('json-patient/{id}','GeneralController@patient');
	Route::get('json-manufacturer/{id}','GeneralController@manufacturer');
});
