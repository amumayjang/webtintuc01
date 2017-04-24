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

Route::group(['prefix' => 'admin'], function () {
	Route::get('/login', function () {
		return view('admin.login');
	});
	Route::get('/', function () {
		return view('admin.dashboard');
	});

	//Users manager
	Route::group(['prefix' => 'users'], function () {
		Route::get('add', ['as' => 'users.getadd','uses' => 'UsersController@create']);
		Route::post('add', ['as' => 'users.add','uses' => 'UsersController@store']);
		Route::get('manager', ['as' => 'users.manager', 'uses' => 'UsersController@index']);
	});
});