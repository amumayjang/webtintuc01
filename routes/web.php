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

	//Users manager
	Route::group(['prefix' => 'users'], function () {
		Route::get('create', ['as' => 'users.create','uses' => 'admin\UsersController@create']);
		Route::post('add', ['as' => 'users.add','uses' => 'admin\UsersController@store']);
		Route::get('manager', ['as' => 'users.manager', 'uses' => 'admin\UsersController@index']);
		Route::get('edit/{id}', ['as' => 'users.edit', 'uses' => 'admin\UsersController@edit']);
		Route::post('update/{id}', ['as' => 'users.update', 'uses' => 'admin\UsersController@update']);
		Route::get('delete/{id}', ['as' => 'users.delete', 'uses' => 'admin\UsersController@destroy']);

		Route::get('test', 'admin\UsersController@getAllUser');
	});

	//Category manager
	Route::resource('category', 'admin\CategoryController', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
	Route::get('category/make-slug', ['as' => 'category.make-slug', 'uses' => 'admin\CategoryController@makeSlug']);

//check role, only admin
	Route::group(['middleware' => ['authen', 'checkrole'], 'roles' => [1000]], function () {

		//Article manager
		Route::resource('articles', 'admin\ArticlesController', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
	});
});
