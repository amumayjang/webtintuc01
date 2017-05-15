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

Route::get('nopermission', ['as' => 'noPermission', function (){
	return view('admin.nopermission');
}]);

Route::group(['prefix' => 'admin'], function () {
	Route::get('login', ['as' => 'get.login', 'uses' => 'admin\LoginController@getLogin']);
	Route::post('login', ['as' => 'login', 'uses' => 'admin\LoginController@login']);
	Route::group(['middleware' => ['authen', 'checkrole'], 'roles' => [500, 700, 1000]], function() {
		Route::get('/', ['as' => 'dashboard', 'uses' => 'admin\DashboardController@dashboard']);
		Route::get('logout', ['as' => 'logout', 'uses' => 'admin\LoginController@getLogout']);
		//Category manager
		Route::resource('category', 'admin\CategoryController', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
		Route::get('category/make-slug', ['as' => 'category.make-slug', 'uses' => 'admin\CategoryController@makeSlug']);
		Route::get('category/delete-list', ['as' => 'category.del-list', 'uses' => 'admin\CategoryController@destroyListId']);

		//Article manager
		Route::resource('articles', 'admin\ArticlesController', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
		Route::get('articles/make-slug', ['as' => 'articles.make-slug', 'uses' => 'admin\ArticlesController@makeSlug']);
		Route::get('articles/delete-list', ['as' => 'articles.del-list', 'uses' => 'admin\ArticlesController@destroyListId']);

		//comment manager
		Route::resource('comments', 'admin\CommentController', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
		Route::get('comments/delete-list', ['as' => 'comments.del-list', 'uses' => 'admin\CommentController@destroyListId']);
	});
	//check role, only admin
	Route::group(['middleware' => ['authen', 'checkrole'], 'roles' => [1000]], function () {
		//Users manager
		Route::group(['prefix' => 'users'], function () {
			Route::get('create', ['as' => 'users.create','uses' => 'admin\UsersController@create']);
			Route::post('add', ['as' => 'users.add','uses' => 'admin\UsersController@store']);
			Route::get('manager', ['as' => 'users.manager', 'uses' => 'admin\UsersController@index']);
			Route::get('edit/{id}', ['as' => 'users.edit', 'uses' => 'admin\UsersController@edit']);
			Route::post('update/{id}', ['as' => 'users.update', 'uses' => 'admin\UsersController@update']);
			Route::get('delete/{id}', ['as' => 'users.delete', 'uses' => 'admin\UsersController@destroy']);
			Route::get('delete-list', ['as' => 'users.del-list', 'uses' => 'admin\UsersController@destroyListId']);
			Route::get('change-role', ['as' => 'users.change-role', 'uses' => 'admin\UsersController@changeRole']);

			Route::get('test', 'admin\UsersController@getAllUser');
		});
	});

});

Route::get('/', 'HomeController@index')->name('/');
Route::get('log-out', ['as' => 'frontlogout', 'uses' => 'LoginController@logoutUser']);
Route::get('sign-in', ['as' => 'getSignIn', 'uses' => 'LoginController@getSignIn']);
Route::post('sign-in', ['as' => 'signIn', 'uses' => 'LoginController@signIn']);
Route::get('sign-up', ['as' => 'getSignUp', 'uses' => 'LoginController@getSignUp']);
Route::post('sign-up', ['as' => 'signUp', 'uses' => 'LoginController@signUp']);
Route::post('comments', ['as' => 'postComment', 'uses' => 'HomeController@postComment']);
Route::get('category/{slug}', ['as' => 'category', 'uses' => 'HomeController@category']);
Route::get('tag/{id}', ['as' => 'tag', 'uses' => 'HomeController@tag']);
Route::get('/{slug}', 'HomeController@single');
