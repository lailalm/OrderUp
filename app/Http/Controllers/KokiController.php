<?php namespace App\Http\Controllers;

use View;
use Auth;
use Validator;
use Input;
use Redirect;
use Session;
use App\Menu;
use App\Pemesanan;
use App\Meja;
use App\Karyawan;

class KokiController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$pemesanan = Pemesanan::orderBy('id_pemesanan', 'ASC')->
					where('status','!=','Paid')->get();

		if(Auth::user()->role=="Koki"){
			return View::make('koki.DaftarPesananUI')
			->with('pemesanan', $pemesanan);
		}
		else{
			return View::make('pelayan.DaftarPesananUI')
			->with('pemesanan', $pemesanan);
		}

	}

	public function getstatusmenu($kategori)
	{

		if($kategori=="utama"){
			return View::make('koki.StatusMenuUI')
			->with('list_menu', Menu::where('kategori','Menu Utama')->get())
			->with('kategori', $kategori);;
		}
		else if($kategori=="pembuka"){
			return View::make('koki.StatusMenuUI')
			->with('list_menu', Menu::where('kategori','Menu Pembuka')->get())
			->with('kategori', $kategori);;
		}
		else if($kategori=="sampingan"){
			return View::make('koki.StatusMenuUI')
			->with('list_menu', Menu::where('kategori','Menu Sampingan')->get())
			->with('kategori', $kategori);;
		}
		else if($kategori=="penutup"){
			return View::make('koki.StatusMenuUI')
			->with('list_menu', Menu::where('kategori','Menu Penutup')->get())
			->with('kategori', $kategori);;
		}
		else if($kategori=="minuman"){
			return View::make('koki.StatusMenuUI')
			->with('list_menu', Menu::where('kategori','Menu Minuman')->get())
			->with('kategori', $kategori);;
		}
		else if($kategori=="rekomendasi"){
			return View::make('koki.StatusMenuUI')
			->with('list_menu', Menu::where('is_rekomendasi','1')->get())
			->with('kategori', $kategori);;
		}
		else if($kategori=="promosi"){
			return View::make('koki.StatusMenuUI')
			->with('list_menu', Menu::where('is_promosi','1')->get())
			->with('kategori', $kategori);;
		}
		else {

		}
	}


	public function makeAvailable($id)
	{
		$menu = Menu::find($id);
		$menu->status = 1;
		$menu->save();
		$kategori = $menu->kategori;

		if($kategori=="Menu Utama"){
			$rute = "utama";
		}
		else if($kategori=="Menu Pembuka"){
			$rute = "pembuka";
		}
		else if($kategori=="Menu Sampingan"){
			$rute = "sampingan";
		}
		else if($kategori=="Menu Penutup"){
			$rute = "Penutup";
		}
		else if($kategori=="Menu Minuman"){
			$rute = "minuman";
		}
		else if($menu->is_rekomendasi=="1"){
			$rute = "rekomendasi";
		}
		else if($menu->is_promosi=="1"){
			$rute = "promosi";
		}
		else {

		}

		Session::flash('message',  $menu->name .' menjadi tersedia.');
		Session::flash('alert-class', 'alert-success');


		return Redirect::to('statusmenu/'.$rute);
	}


	public function makeUnavailable($id)
	{
		$menu = Menu::find($id);
		$menu->status = 0;
		$menu->save();
		$kategori = $menu->kategori;

		if($kategori=="Menu Utama"){
			$rute = "utama";
		}
		else if($kategori=="Menu Pembuka"){
			$rute = "pembuka";
		}
		else if($kategori=="Menu Sampingan"){
			$rute = "sampingan";
		}
		else if($kategori=="Menu Penutup"){
			$rute = "Penutup";
		}
		else if($kategori=="Menu Minuman"){
			$rute = "minuman";
		}
		else if($menu->is_rekomendasi=="1"){
			$rute = "rekomendasi";
		}
		else if($menu->is_promosi=="1"){
			$rute = "promosi";
		}
		else {

		}

		Session::flash('message',  $menu->name .' menjadi tidak tersedia.');
		Session::flash('alert-class', 'alert-success');
		return Redirect::to('statusmenu/'.$rute);
	}

	public function create()
	{
		//
	}


	public function changeStatus($status, $id){

		$pemesanan = Pemesanan::find($id);
		if($status == "waiting"){
			$pemesanan->status = "Queued";
			Session::flash('message',  'Pemesanan '.Menu::find($pemesanan->id_menu)->name.' pada meja '.Meja::find($pemesanan->id_meja)->nomormeja.' di set "Waiting".');
			Session::flash('alert-class', 'alert-success');
		}
		else if($status == "process"){
			$pemesanan->status = "On Process";
			Session::flash('message',  'Pemesanan '.Menu::find($pemesanan->id_menu)->name.' pada meja '.Meja::find($pemesanan->id_meja)->nomormeja.' di set "On Process".');
			Session::flash('alert-class', 'alert-success');
		}
		else if($status == "done"){
			$pemesanan->status = "Done";
			Session::flash('message',  'Pemesanan '.Menu::find($pemesanan->id_menu)->name.' pada meja '.Meja::find($pemesanan->id_meja)->nomormeja.' di set "Done".');
			Session::flash('alert-class', 'alert-success');
		}
		else{
			//ErrorView
		}
		$pemesanan->save();
		return Redirect::to('daftarpesanan');
	}


	public function store()
	{

	}

	public function show($id)
	{
		//
	}


	public function edit()
	{
		$karyawan = Karyawan::find(Auth::user()->id_karyawan);

		// show the Edit form and pass Karyawan
		return View::make('koki.EditProfilUI')
			->with('karyawan', $karyawan);

	}


	public function update()
	{
		$rules = array(
			"name" => 'required',
			"email" => 'required|email',
			"telepon" => "required|numeric",
			"alamat" => "required"
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {
			Session::flash('message', 'Gagal mengubah. Mohon cek kembali isian Anda.');
			Session::flash('alert-class', 'alert-danger');
			return Redirect::to('editprofil');
				// ->withError($validator);
		} else {

			$karyawan = Karyawan::find(Auth::user()->id_karyawan);
			$karyawan->name 			= Input::get('name');
			$karyawan->email 			= Input::get('email');
			$password					= Input::get('password');
			// if(!$password==""){
			// 	$karyawan->password 	= bcrypt(Input::get('password'));
			// }
			$karyawan->telepon 			= Input::get('telepon');
			$karyawan->alamat 			= Input::get('alamat');
			// $karyawan->tanggal_mulai 	= Input::get('tanggal_mulai');
			$file 						= Input::file('foto');

			if(!is_null($file)){
				$extension 					= $file->getClientOriginalExtension();
				Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
				$karyawan->mime = $file->getClientMimeType();
				$karyawan->original_photoname = $file->getClientOriginalName();
				$karyawan->photoname = $file->getFilename().'.'.$extension;
			}
			$karyawan->save();

			Session::flash('message', $karyawan->name .' berhasil diubah.');
			Session::flash('alert-class', 'alert-success');

				return Redirect::to('editprofil');
			}
	}


	public function destroy($id)
	{
		//
	}

}
