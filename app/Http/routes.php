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

Route::get('home', 'HomeController@index');

Route::get('manajermenu','ManajerMenuController@index');

Route::get('manajermenu/{id}','ManajerMenuController@formMenu');

Route::get('manajerkaryawan','ManajerKaryawanController@index');

Route::get('manajermeja','ManajerMejaController@index');

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
