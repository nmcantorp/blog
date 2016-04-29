<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'articles_group'], function() {
	Route::get('articles_int/{id?}',[
		'as'	=>	'article_view/{id\}', 
		'uses'	=>	'TestController@index'
	]);
});

Route::group(['prefix' => 'admin'], function() {
	Route::resource('users', 'UserController');
	Route::get('users/{id}/destroy',[
		'uses' 	=> 'UserController@destroy',
		'as'	=> 'admin.users.destroy'
		]);
	
	Route::resource('categories', 'CategoriesController');
	Route::get('categories/{id}/destroy',[
		'uses' 	=> 'CategoriesController@destroy',
		'as'	=> 'admin.categories.destroy'
		]);
});
Route::auth();

Route::get('/home', 'HomeController@index');
