<?php namespace App\Http\Controllers;

use View;
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

		return View::make('koki.DaftarPesananUI')
			->with('pemesanan', $pemesanan);

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
		else{

		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function makeAvailable($id)
	{
		$menu = Menu::find($id);
		$menu->status = 1;
		$menu->save();
		return Redirect::to('statusmenu');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function makeUnavailable($id)
	{
		$menu = Menu::find($id);
		$menu->status = 0;
		$menu->save();
		return Redirect::to('statusmenu');
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
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
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
