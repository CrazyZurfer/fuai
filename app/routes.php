<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', function()
{
	//return View::make('hello');
	return Redirect::to('/profesores');
});

Route::get('/login', array(
	'as'   => 'login',
	'uses' => 'UserController@login'
));

Route::post('/login', array(
	'as'   => 'dologin',
	'uses' => 'UserController@dologin'
));

Route::get('/logout', array(
	'as'   => 'logout',
	'uses' => 'UserController@logout'
));

Route::group(array('prefix' => 'profesores'), function(){
	Route::get('/eliminar/{id}/', array(
		'as'   => 'teacher.delete',
		'before'   => 'auth',
		'uses' => 'TeachersController@delete'
	));

	Route::get('/editar/{id}/', array(
		'as'   => 'teacher.edit',
		'before'   => 'auth',
		'uses' => 'TeachersController@edit'
	));

	Route::post('/editar/{id}/', array(
		'as'   => 'teacher.doedit',
		'before'   => 'auth',
		'uses' => 'TeachersController@update'
	));

	Route::get('/agregar', array(
		'as'   => 'teacher.add',
		'before'   => 'auth',
		'uses' => 'TeachersController@add'
	));

	Route::post('/agregar', array(
		'as'   => 'teacher.doadd',
		'before'   => 'auth',
		'uses' => 'TeachersController@store'
	));

	Route::get('/sugerircambio/{id}/', array(
		'as'   => 'teacher.suggest',
		'uses' => 'TeachersController@suggest'
	));

	Route::get('/{id}', array(
		'as'   => 'teacher.show',
		'uses' => 'TeachersController@show'
	));

	Route::get('/', array(
		'as'   => 'teacher.list',
		'uses' => 'TeachersController@index'
	));
});

Route::group(array('prefix' => 'ramos'), function(){
	Route::get('/{id}', array(
		'as'   => 'courses.show',
		'uses' => 'CoursesController@show'
	));

	Route::get('/eliminar/{id}/', array(
		'as'   => 'courses.delete',
		'before'   => 'auth',
		'uses' => 'CoursesController@delete'
	));

	Route::get('/editar/{id}/', array(
		'as'   => 'courses.edit',
		'before'   => 'auth',
		'uses' => 'CoursesController@edit'
	));

	Route::get('/agregar', array(
		'as'   => 'courses.add',
		'before'   => 'auth',
		'uses' => 'CoursesController@add'
	));

	Route::get('/', array(
		'as'   => 'courses.list',
		'before'   => 'auth',
		'uses' => 'CoursesController@list'
	));
});

Route::group(array('prefix' => 'noticias'), function(){
	Route::get('/{id}', array(
		'as'   => 'news.show',
		'uses' => 'NewsController@show'
	));

	Route::get('/eliminar/{id}/', array(
		'as'   => 'news.delete',
		'before'   => 'auth',
		'uses' => 'NewsController@delete'
	));

	Route::get('/editar/{id}/', array(
		'as'   => 'news.edit',
		'before'   => 'auth',
		'uses' => 'NewsController@edit'
	));

	Route::get('/agregar', array(
		'as'   => 'news.add',
		'before'   => 'auth',
		'uses' => 'NewsController@add'
	));

	Route::get('/', array(
		'as'   => 'news.list',
		'before'   => 'auth',
		'uses' => 'NewsController@list'
	));
});

Route::group(array('prefix' => 'notas'), function(){
	Route::get('/{id}', array(
		'as'   => 'grade.show',
		'uses' => 'GradesController@show'
	));

	Route::get('/agregar', array(
		'as'   => 'grade.add',
		'before'   => 'auth',
		'uses' => 'GradesController@add'
	));
});