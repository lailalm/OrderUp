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
| Dummy and Helper Routes
|-------------------------------------------------------------------------
*/
Route::get('dummy', 'WelcomeController@dummy');

Route::get('home', 'WelcomeController@home');

/*
|-------------------------------------------------------------------------
| Pihak Karyawan Routes
|-------------------------------------------------------------------------
*/

Route::get('admin', 'ManajerMenuController@index');

/*
|-------------------------------------------------------------------------
| Manajer Menu
|-------------------------------------------------------------------------
*/



Route::get('addmenu', ['as' => 'addmenu','uses'=> 'ManajerMenuController@create']);

Route::get('addmenupromosi', ['as' => 'addmenu','uses'=> 'ManajerMenuController@createPromosi']);

Route::post('addmenu', ['as' => 'addmenu_store','uses'=> 'ManajerMenuController@store']);

Route::get('editmenu/{id}', ['as' => 'editmenu', 'uses' => 'ManajerMenuController@edit']);

Route::put('editmenu/{id}', ['as' => 'editmenu_update','uses'=> 'ManajerMenuController@update']);

Route::get('manajermenu/{kategori}', 'ManajerMenuController@index');

Route::get('manajermenu', 'ManajerMenuController@dasar');

Route::get('manajermenu/{rekomendasi}/{id}', 'ManajerMenuController@rekomendasi');

Route::get('ulasanlayanan', 'ManajerMenuController@lihatLayanan');

Route::get('statistikmingguan', 'ManajerMenuController@statistikMingguan');

Route::get('statistikbulanan', 'ManajerMenuController@statistikBulanan');

Route::get('ulasanmenudetail/{id}', ['as' => 'ulasanmenudetail','uses'=> 'ManajerMenuController@ulasanMenuDetail']);

Route::get('rangkumanstatistik', 'ManajerMenuController@rangkuman');


/*
|-------------------------------------------------------------------------
| Manajer Karyawan
|-------------------------------------------------------------------------
*/

Route::get('manajerkaryawan','ManajerKaryawanController@index');

Route::get('manajerkaryawan/{role}', 'ManajerKaryawanController@indexByRole');

Route::post('addkaryawan', ['as' => 'addkaryawan_store','uses'=> 'ManajerKaryawanController@store']);

Route::get('addpelayan', ['as' => 'addkaryawan','uses'=> 'ManajerKaryawanController@createPelayan']);

Route::get('addkoki', ['as' => 'addkaryawan','uses'=> 'ManajerKaryawanController@createKoki']);

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

Route::get('statusmenu/{kategori}', 'KokiController@getstatusmenu');

Route::get('makeavailable/{id}', 'KokiController@makeAvailable');

Route::get('makeunavailable/{id}', 'KokiController@makeUnavailable');

Route::get('changestatus/{status}/{id}', 'KokiController@changeStatus');

Route::get('editprofil', 'KokiController@edit');

Route::put('editprofiluser', ['as' => 'editprofiluser', 'uses'=> 'KokiController@update']);

Route::put('editkodeloginkoki', ['as' => 'editkodeloginkoki', 'uses'=> 'KokiController@updateKodeLogin']);

/*
|-------------------------------------------------------------------------
| Pelayan Area Routes
|-------------------------------------------------------------------------
*/

Route::get('listpemanggilan', 'PelayanController@getPemanggilan');

Route::post('removepemanggilan', ['as' => 'removepemanggilan', 'uses' => 'PelayanController@removePemanggilan']);


/*
|-------------------------------------------------------------------------
| Main Website Customer Routes
|-------------------------------------------------------------------------
*/
Route::get('/', 'CustomerController@index');

Route::get('menu/{kategori}', 'CustomerController@indexByCat');

Route::post('addpemesanan', ['as' => 'addpemesanan', 'uses' => 'CustomerController@addPemesanan']);

Route::get('listpesanan', 'CustomerController@getMyPesanan');

Route::post('hapuspesanan', ['as' => 'hapuspesanan', 'uses' => 'CustomerController@cancelPemesanan']);

Route::get('pembayaran', 'CustomerController@getMyPayment');

Route::get('tutorial', 'CustomerController@showTutorial');

Route::get('logout', ['as' => 'logout', 'uses' => 'CustomerController@logout']);

Route::post('addpemanggilan', ['as' => 'addpemanggilan', 'uses' => 'CustomerController@addPemanggilan']);

Route::post('bayar', ['as' => 'bayar', 'uses'=> 'CustomerController@bayar']);

Route::get('kredit', 'CustomerController@kredit');

Route::get('debit', 'CustomerController@debit');

Route::post('simpanulasan', ['as'=>'simpanulasan', 'uses'=>'CustomerController@saveUlasan']);

Route::get('ulasanmenu/{id}', ['as' => 'ulasanmenu','uses'=> 'CustomerController@ulasanMenu']);
