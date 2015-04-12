<?php namespace App\Http\Controllers;

use View;
use Auth;
use Validator;
use Input;
use Redirect;
use Session;
use App\Menu;
use App\Pemesanan;

class KokiController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
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
			$rute = "minum";
		}
		else if($kategori=="Menu Rekomendasi"){
			$rute = "rekomendasi";			
		}
		else if($kategori=="Menu Promosi"){
			$rute = "promosi";
		}
		else {

		}
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
			$rute = "minum";
		}
		else if($kategori=="Menu Rekomendasi"){
			$rute = "rekomendasi";			
		}
		else if($kategori=="Menu Promosi"){
			$rute = "promosi";
		}
		else {

		}
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
		}
		else if($status == "process"){
			$pemesanan->status = "On Process";
		}
		else if($status == "done"){
			$pemesanan->status = "Done";
		}
		else{
			//ErrorView
		}
		$pemesanan->save();
		return Redirect::to('daftarpesanan');
	}

	
	public function store()
	{
		//
	}

	public function show($id)
	{
		//
	}


	public function edit($id)
	{
		//
	}

	
	public function update($id)
	{
		//
	}


	public function destroy($id)
	{
		//
	}

}
