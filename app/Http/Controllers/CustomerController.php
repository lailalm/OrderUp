<?php namespace App\Http\Controllers;

use App\Menu;
use App\Pemesanan;
use View;
use Validator;
use Input;
use Redirect;
use Session;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

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
	
	
	public function index()
	{
		$menu_promosi = Menu::where('is_promosi','1')->get();
		return view('pelanggan.menu')
			->with('menu_promosi', $menu_promosi);
	}

	public function indexByCat($kategori)
	{
		if($kategori=="utama"){
			return View::make('pelanggan.menu_utama')
			->with('list_menu', Menu::where('kategori','Menu Utama')->get())
			->with('kategori', $kategori);;
		}
		else if($kategori=="pembuka"){
			return View::make('pelanggan.menu_utama')
			->with('list_menu', Menu::where('kategori','Menu Pembuka')->get())
			->with('kategori', $kategori);;
		}
		else if($kategori=="sampingan"){
			return View::make('pelanggan.menu_utama')
			->with('list_menu', Menu::where('kategori','Menu Sampingan')->get())
			->with('kategori', $kategori);;
		}
		else if($kategori=="penutup"){
			return View::make('pelanggan.menu_utama')
			->with('list_menu', Menu::where('kategori','Menu Penutup')->get())
			->with('kategori', $kategori);;
		}
		else if($kategori=="minuman"){
			return View::make('pelanggan.menu_utama')
			->with('list_menu', Menu::where('kategori','Menu Minuman')->get())
			->with('kategori', $kategori);;
		}
		else if($kategori=="rekomendasi"){
			return View::make('pelanggan.menu_utama')
			->with('list_menu', Menu::where('is_rekomendasi','1')->get())
			->with('kategori', $kategori);;
		}
		else if($kategori=="promosi"){
			return View::make('pelanggan.menu_utama')
			->with('list_menu', Menu::where('is_promosi','1')->get())
			->with('kategori', $kategori);;
		}
		else{
			return View::make('pelanggan.menu_utama')
			->with('list_menu', Menu::where('kategori','Menu Utama')->get())
			->with('kategori', 'utama');;
		}
	}
	
	public function getMyPesanan()
	{
		return View::make('pelanggan.listPesananUI')
			->with('list_pesanan', Pemesanan::where('id_meja','1')->get());;
	}

	public function create()
	{
		//
	}

	
	public function store()
	{
		//
	}

	
	public function showMenuUtama()
	{
		if($kategori=="utama"){
			return View::make('pelanggan.menu_utama')
			->with('list_menu', Menu::where('kategori','Menu Utama')->get())
			->with('kategori', $kategori);;
		}
		else if($kategori=="pembuka"){
			return View::make('pelanggan.menu_utama')
			->with('list_menu', Menu::where('kategori','Menu Pembuka')->get())
			->with('kategori', $kategori);;
		}
		else if($kategori=="sampingan"){
			return View::make('pelanggan.menu_utama')
			->with('list_menu', Menu::where('kategori','Menu Sampingan')->get())
			->with('kategori', $kategori);;
		}
		else if($kategori=="penutup"){
			return View::make('pelanggan.menu_utama')
			->with('list_menu', Menu::where('kategori','Menu Penutup')->get())
			->with('kategori', $kategori);;
		}
		else if($kategori=="minuman"){
			return View::make('pelanggan.menu_utama')
			->with('list_menu', Menu::where('kategori','Menu Minuman')->get())
			->with('kategori', $kategori);;
		}
		else if($kategori=="rekomendasi"){
			return View::make('pelanggan.menu_utama')
			->with('list_menu', Menu::where('is_rekomendasi','1')->get())
			->with('kategori', $kategori);;
		}
		else if($kategori=="promosi"){
			return View::make('pelanggan.menu_utama')
			->with('list_menu', Menu::where('is_promosi','1')->get())
			->with('kategori', $kategori);;
		}
		else{
			return View::make('pelanggan.menu_utama')
			->with('list_menu', Menu::where('kategori','Menu Utama')->get())
			->with('kategori', 'utama');;
		}
	}

	
	public function addPemesanan()
	{
		$pesan = new Pemesanan;

		$pesan->id_meja 		= 1;
		$pesan->id_menu 		= Input::get('id_menu');
		$pesan->jumlah 			= Input::get('porsi');
		$pesan->keterangan 		= Input::get('deskripsi');

		$pesan->save();
		return Redirect::to('menu/'.Input::get('kategori'));
	}

	public function cancelPemesanan($id, $batal)
	{
		$pesan = Pemesanan::find($id);
		$current_jumlah = $pesan->jumlah;
		if ($batal >= $current_jumlah)
			return Redirect::to('listpesanan');
		else {
			$menu->jumlah = $current_jumlah - $batal;
			$menu->save();
			return Redirect::to('listpesanan');
		}
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
