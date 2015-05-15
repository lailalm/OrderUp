<?php namespace App\Http\Controllers;

use Auth;
use App\Menu;
use App\Pemesanan;
use App\Pemanggilan;
use App\Meja;
use App\UlasanRestoran;
use App\UlasanMakanan;
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
		$idm = Auth::user()->name;
		$list_pesanan = Pemesanan::orderBy('id_pemesanan', 'ASC')
					->where('status','!=','Paid')
					->where('id_meja', $idm)
					->get();
		return View::make('pelanggan.listPesananUI')
			->with('list_pesanan', $list_pesanan);;
	}

	public function getMyPayment()
	{
		$idm = Auth::user()->name;
		$list_pesanan = Pemesanan::orderBy('id_pemesanan', 'ASC')
						->where('status','!=','Paid')
						->where('id_meja', $idm)
						->get();
		return View::make('pelanggan.pembayaranUI')
			->with('list_pesanan', $list_pesanan);;
	}


	public function addPemanggilan()
	{

		$pemanggilan = new Pemanggilan;
		$pemanggilan->id_meja 				= Auth::user()->name;
		$pemanggilan->pesan 				= Input::get('deskripsi');
		$pemanggilan->status_pemanggilan 	= 0;

		$pemanggilan->save();
		return Redirect::to('/');
	}


	public function bayar()
	{
		$rules = array(
			"nominal" => 'required|integer|min:1'
		);

		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails()) {
	        Session::flash('message', 'Gagal membayar. Periksa masukan Anda.');
			Session::flash('alert-class', 'alert-danger');
			return Redirect::to('/pembayaran');
		} else {
			$pemanggilan = new Pemanggilan;
			$pemanggilan->id_meja = Auth::user()->name;
			$pemanggilan->pesan = 'Membayar pemesanan dengan uang tunai '.Input::get('nominal');
			$pemanggilan->status_pemanggilan =0;
			$pemanggilan->save();
			$listPemesanan = Pemesanan::where('status', 'Queued')->where('id_meja', Auth::user()->name)->get();
			$pemesanan = Pemesanan::where('status', 'Queued')->where('id_meja', Auth::user()->name)->lists('jumlah','id_menu');
			foreach($pemesanan as $key=>$value){
				$pemesanan[$key]=Menu::find($key)->name;
			}
			foreach(Pemesanan::get() as $pesan){
				$pesan->status = "Paid";
				$pesan->save();
			}
			return View::make('pelanggan.AddUlasanUI')
				->with('list_pesanan', $listPemesanan)
				->with('id_name',$pemesanan);
		}
	}

	public function kredit()
	{
		$pemanggilan = new Pemanggilan;
		$pemanggilan->id_meja = Auth::user()->name;
		$pemanggilan->pesan = 'Membayar pemesanan dengan kartu kredit';
		$pemanggilan->status_pemanggilan =0;
		$pemanggilan->save();
		
		$listPemesanan = Pemesanan::where('status', 'Queued')->where('id_meja', Auth::user()->name)->get();
		$pemesanan = Pemesanan::where('status', 'Queued')->where('id_meja', Auth::user()->name)->lists('jumlah','id_menu');
		foreach($pemesanan as $key=>$value){
			$pemesanan[$key]=Menu::find($key)->name;
		}
		
		foreach(Pemesanan::get() as $pesan){
			$pesan->status = "Paid";
			$pesan->save();
		}

		return View::make('pelanggan.AddUlasanUI')
			->with('list_pesanan', $listPemesanan)
			->with('id_name',$pemesanan);

	}

	public function debit(){
		$pemanggilan = new Pemanggilan;
		$pemanggilan->id_meja = Auth::user()->name;
		$pemanggilan->pesan = 'Membayar pemesanan dengan kartu debit';
		$pemanggilan->status_pemanggilan =0;
		$pemanggilan->save();

		//KOK QUEUED DOANG?
		$listPemesanan = Pemesanan::where('status', 'Queued')->where('id_meja', Auth::user()->name)->get();
		$pemesanan = Pemesanan::where('status', 'Queued')->where('id_meja', Auth::user()->name)->lists('jumlah','id_menu');
		
		foreach($pemesanan as $key=>$value){
			$pemesanan[$key]=Menu::find($key)->name;
		}

		// foreach(Pemesanan::get() as $pesan){
		// 	$pesan->status = "Paid";
		// 	$pesan->save();
		// }

		return View::make('pelanggan.AddUlasanUI')
			->with('list_pesanan', $listPemesanan)
			->with('id_name',$pemesanan);
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
		$rules = array(
			"id_menu"=> 'required',
			"porsi" => 'required|integer|min:1'
		);

		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails()) {
	        	Session::flash('message', 'Gagal menambahkan pesanan. Mohon periksa isian Anda.');
			Session::flash('alert-class', 'alert-danger');
		} else {
			$pesan = new Pemesanan;

			$pesan->id_meja 		= Auth::user()->name;
			$pesan->id_menu 		= Input::get('id_menu');
			$pesan->jumlah 			= Input::get('porsi');
			$pesan->keterangan 		= Input::get('deskripsi');

			$pesan->save();
			Session::flash('message', 'Berhasil menambahkan pesanan.');
			Session::flash('alert-class', 'alert-success');
		}
		return Redirect::to('menu/'.Input::get('kategori'));
	}

	public function cancelPemesanan()
	{
		$rules = array(
			"countcancel" => 'required|integer|min:1'
		);

		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails()) {
			Session::flash('message', 'Gagal membatalkan pesanan.');
			Session::flash('alert-class', 'alert-danger');
			return Redirect::to('listpesanan');
		}
		else {
			$batal = Input::get('countcancel');
			$id_pemesanan = Input::get('id_pemesanan');
			$pesan = Pemesanan::find(Input::get('id_pemesanan'));
			$current_jumlah = $pesan->jumlah;

			if ( $batal >= $current_jumlah){
				Pemesanan::where('id_pemesanan', $id_pemesanan)->delete();
				Session::flash('message', 'Berhasil membatalkan pesanan.');
				Session::flash('alert-class', 'alert-success');
				return Redirect::to('listpesanan');
			}
			else {
				$pesan->jumlah = $current_jumlah - $batal;
				$pesan->save();
				Session::flash('message', 'Berhasil membatalkan pesanan.');
				Session::flash('alert-class', 'alert-success');
				return Redirect::to('listpesanan');
			}
		}
	}

	public function logout()
	{
		Auth::logout();
		return view('pelanggan.logoutUI');
	}

	

	public function saveUlasan(){
		$ulasanR = new UlasanRestoran;

		$ulasanR->id_meja = Auth::user()->name;
		$ulasanR->tanggal = date('Y-m-d');
		$ulasanR->review = Input::get('deskripsiRestoran');
		$ulasanR->save();
		for($i=0;$i<Input::get('size');){
			$ulasanM= new UlasanMakanan;
			$ulasanM->id_meja = Auth::user()->name;
			$ulasanM->tanggal = date('Y-m-d');
			$ulasanM->id_menu = Input::get('id'.$i);
			$ulasanM->komentar = Input::get('deskripsi'.$i);
			$i=$i+1;
			$ulasanM->save();
		}
		return Redirect::to('/logout');
	}

}
