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
Route::get('nopermission', ['as' => 'noPermission', function (){
	return view('admin.nopermission');
}]);

Route::group(['prefix' => 'admin'], function () {
	Route::get('/', ['as' => 'dashboard', 'uses' => 'admin\DashboardController@dashboard']);
	Route::get('login', ['as' => 'get.login', 'uses' => 'admin\LoginController@getLogin']);
	Route::post('login', ['as' => 'login', 'uses' => 'admin\LoginController@login']);
	Route::get('logout', ['as' => 'logout', 'uses' => 'admin\LoginController@getLogout']);
	Route::group(['middleware' => ['authen', 'checkrole'], 'roles' => [2,3,4]], function () {
		//Users manager
		Route::group(['prefix' => 'users'], function () {
			Route::get('add', ['as' => 'users.get.add','uses' => 'admin\UsersController@create']);
			Route::post('add', ['as' => 'users.add','uses' => 'admin\UsersController@store']);
			Route::get('manager', ['as' => 'users.manager', 'uses' => 'admin\UsersController@index']);
			Route::get('update', ['as' => 'users.update', 'uses' => 'admin\UsersController@edit']);
		});
	});
});