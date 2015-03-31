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

/*
|-------------------------------------------------------------------------
| Dummy Routes
|-------------------------------------------------------------------------
*/
Route::get('/dummy', 'WelcomeController@dummy');

/*
|-------------------------------------------------------------------------
| Manajer Routes
|-------------------------------------------------------------------------
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'ManajerMenuController@index');

Route::get('manajermenu','ManajerMenuController@index');

Route::get('manajermenu/{id}','ManajerMenuController@formMenu');

Route::get('manajerkaryawan','ManajerKaryawanController@index');

Route::get('manajermeja','ManajerMejaController@index');

Route::get('delete/{id}','ManajerMejaController@destroy');

Route::get('addmeja', ['as' => 'addmeja','uses'=> 'ManajerMejaController@create']);

Route::post('addmeja', ['as' => 'addmeja_store','uses'=> 'ManajerMejaController@store']);

Route::get('addkaryawan', ['as' => 'addkaryawan','uses'=> 'ManajerKaryawanController@create']);

Route::post('addkaryawan', ['as' => 'addkaryawan_store','uses'=> 'ManajerKaryawanController@store']);

Route::get('editmeja/{id}', ['as' => 'editmeja', 'uses' => 'ManajerMejaController@edit']);

Route::put('editmeja/{id}', ['as' => 'editmeja_update','uses'=> 'ManajerMejaController@update']);




Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

/*
|-------------------------------------------------------------------------
| Main Website Customer Routes
|-------------------------------------------------------------------------
*/
Route::get('/customer', 'CustomerController@index');

/*
|-------------------------------------------------------------------------
| Admin Area Routes
|-------------------------------------------------------------------------
*/
