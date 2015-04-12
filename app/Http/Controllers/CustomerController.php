<?php namespace App\Http\Controllers;

use App\Menu;
use App\Pemesanan;
use App\Pemanggilan;
use App\Meja;
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
		// tambahin where status != paid
		return View::make('pelanggan.listPesananUI')
			->with('list_pesanan', Pemesanan::where('id_meja','1')->get());;
	}

	public function getMyPayment()
	{
		// tambahin where status != paid
		return View::make('pelanggan.pembayaranUI')
			->with('list_pesanan', Pemesanan::where('id_meja','1')->get());;
	}


	public function addPemanggilan()
	{

		$pemanggilan = new Pemanggilan;
		$pemanggilan->id_meja 				= Input::get('id_meja');
		$pemanggilan->pesan 				= Input::get('deskripsi');
		$pemanggilan->status_pemanggilan 	= 0;

		$pemanggilan->save();
		return Redirect::to('/');
	}

	
	public function bayar()
	{
		$pemanggilan = new Pemanggilan;
		$pemanggilan->id_meja = '1';
		$pemanggilan->pesan = 'Membayar pemesanan dengan uang tunai '.Input::get('nominal');
		$pemanggilan->status_pemanggilan =0;
		$pemanggilan->save();

		foreach(Pemesanan::get() as $pesan){
			$pesan->status = "Paid";
			$pesan->save();
		}
		
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
		else {
			return View::make('pelanggan.menu_utama')
			->with('list_menu', Menu::where('kategori','Menu Utama')->get())
			->with('kategori', 'utama');;
		}
	}

	public function showTutorial()
	{
		return View::make('pelanggan.caraPenggunaanUI');
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

	public function cancelPemesanan()
	{
		$batal = Input::get('countcancel');
		$id_pemesanan = Input::get('id_pemesanan');
		$pesan = Pemesanan::find(Input::get('id_pemesanan'));
		$current_jumlah = $pesan->jumlah;
		if ( $batal >= $current_jumlah){
			// if($batal==$current_jumlah){
				Pemesanan::where('id_pemesanan', $id_pemesanan)->delete();
			// }
			return Redirect::to('listpesanan');
		}
		else {
			$pesan->jumlah = $current_jumlah - $batal;
			$pesan->save();
			return Redirect::to('listpesanan');
		}
	}

	public function logout()
	{
		return view('pelanggan.logoutUI');
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
