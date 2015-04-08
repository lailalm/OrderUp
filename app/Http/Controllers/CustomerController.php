<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Menu;
use View;
use Input;
use Redirect;
use Illuminate\Http\Request;
use App\Pemesanan;

class CustomerController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	// public function __construct()
	// {
	// 	$this->middleware('auth');
	// }
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('pelanggan.menu');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function showMenuUtama()
	{
		$list_menu = Menu::get();
		return View::make('pelanggan.menu_utama')
			->with('list_menu', $list_menu);;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function addPemesanan()
	{
		$pesan = new Pemesanan;

		$pesan->id_meja 		= 1;
		$pesan->id_menu 		= Input::get('id_menu');
		$pesan->jumlah 			= Input::get('porsi');
		$pesan->keterangan 		= Input::get('deskripsi');

		$pesan->save();
		return Redirect::to('menuutama');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
