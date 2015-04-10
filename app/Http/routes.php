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
Route::get('dummy', 'WelcomeController@dummy');

/*
|-------------------------------------------------------------------------
| Manajer Routes
|-------------------------------------------------------------------------
*/

Route::get('admin', 'ManajerMenuController@index');

/*
|-------------------------------------------------------------------------
| Manajer Menu
|-------------------------------------------------------------------------
*/

Route::get('manajermenu','ManajerMenuController@index');

Route::get('manajermenu/{id}','ManajerMenuController@formMenu');

Route::get('addmenu', ['as' => 'addmenu','uses'=> 'ManajerMenuController@create']);

Route::post('addmenu', ['as' => 'addmenu_store','uses'=> 'ManajerMenuController@store']);

Route::get('editmenu/{id}', ['as' => 'editmenu', 'uses' => 'ManajerMenuController@edit']);

Route::put('editmenu/{id}', ['as' => 'editmenu_update','uses'=> 'ManajerMenuController@update']);

/* TO - DO : 
	- Get Menu By Category/{category}
	- Make Recommendation/{id}
	- Make 
*/

/*
|-------------------------------------------------------------------------
| Manajer Karyawan
|-------------------------------------------------------------------------
*/

Route::get('manajerkaryawan','ManajerKaryawanController@index');

Route::get('addkaryawan', ['as' => 'addkaryawan','uses'=> 'ManajerKaryawanController@create']);

Route::post('addkaryawan', ['as' => 'addkaryawan_store','uses'=> 'ManajerKaryawanController@store']);

Route::get('deletekaryawan/{id}','ManajerKaryawanController@destroy');

Route::get('deletemenu/{id}','ManajerMenuController@destroy');

Route::get('editkaryawan/{id}', ['as' => 'editkaryawan', 'uses' => 'ManajerKaryawanController@edit']);

Route::put('editkaryawan/{id}', ['as' => 'editkaryawan_update','uses'=> 'ManajerKaryawanController@update']);

Route::get('manajerkaryawan/get/{photoname}', ['as' => 'getphoto', 'uses' => 'ManajerKaryawanController@get']);

/* TO - DO : 
	- Get Karyawan By Category/{category} koki/pelayan
*/

/*
|-------------------------------------------------------------------------
| [DONE] Manajer Meja
|--------------------------------------------------------------------------
*/

Route::get('manajermeja','ManajerMejaController@index');

Route::get('deletemeja/{id}','ManajerMejaController@destroy');

Route::get('addmeja', ['as' => 'addmeja','uses'=> 'ManajerMejaController@create']);

Route::post('addmeja', ['as' => 'addmeja_store','uses'=> 'ManajerMejaController@store']);

Route::get('editmeja/{id}', ['as' => 'editmeja', 'uses' => 'ManajerMejaController@edit']);

Route::put('editmeja/{id}', ['as' => 'editmeja_update','uses'=> 'ManajerMejaController@update']);


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);



/*
|-------------------------------------------------------------------------
| Koki Area Routes
|-------------------------------------------------------------------------
*/
Route::get('daftarpesanan', 'KokiController@index');

Route::get('statusmenu', 'KokiController@getstatusmenu');

/*
|-------------------------------------------------------------------------
| Pelayan Area Routes
|-------------------------------------------------------------------------
*/
Route::get('daftarpesanan', 'KokiController@index');


/*
|-------------------------------------------------------------------------
| Main Website Customer Routes
|-------------------------------------------------------------------------
*/
Route::get('/', 'CustomerController@index');

Route::get('menuutama', 'CustomerController@showMenuUtama');

Route::post('addpemesanan', ['as' => 'addpemesanan','uses'=> 'CustomerController@addPemesanan']);


/*
|-------------------------------------------------------------------------
| Admin Area Routes
|-------------------------------------------------------------------------
*/

