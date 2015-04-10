<?php namespace App\Http\Controllers;

use App\Menu;
use View;
use Validator;
use Input;
use Redirect;
use Session;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ManajerMenuController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	
	public function index($kategori)
	{
		if($kategori=="utama"){
			return View::make('manajer.DaftarMenuUI')
			->with('list_menu', Menu::where('kategori','Menu Utama')->get())
			->with('kategori', $kategori);;
		}
		else if($kategori=="pembuka"){
			return View::make('manajer.DaftarMenuUI')
			->with('list_menu', Menu::where('kategori','Menu Pembuka')->get())
			->with('kategori', $kategori);;
		}
		else if($kategori=="sampingan"){
			return View::make('manajer.DaftarMenuUI')
			->with('list_menu', Menu::where('kategori','Menu Sampingan')->get())
			->with('kategori', $kategori);;
		}
		else if($kategori=="penutup"){
			return View::make('manajer.DaftarMenuUI')
			->with('list_menu', Menu::where('kategori','Menu Penutup')->get())
			->with('kategori', $kategori);;
		}
		else if($kategori=="minuman"){
			return View::make('manajer.DaftarMenuUI')
			->with('list_menu', Menu::where('kategori','Menu Minuman')->get())
			->with('kategori', $kategori);;
		}
		else if($kategori=="rekomendasi"){
			return View::make('manajer.DaftarMenuUI')
			->with('list_menu', Menu::where('is_rekomendasi','1')->get())
			->with('kategori', $kategori);;
		}
		else if($kategori=="promosi"){
			return View::make('manajer.DaftarMenuUI')
			->with('list_menu', Menu::where('is_promosi','1')->get())
			->with('kategori', $kategori);;
		}
		else{
			return View::make('manajer.DaftarMenuUI')
			->with('list_menu', Menu::where('kategori','Menu Utama')->get())
			->with('kategori', 'utama');;
		}
		
	}

	public function dasar()
	{
		return redirect('manajermenu/utama');
	}

	
	public function create()
	{
		return View::make('manajer.FormMenuUI')
			->with('promosi', false);;
	}

	public function createPromosi()
	{
		return View::make('manajer.FormMenuUI')
			->with('promosi', true);;
	}


	public function store()
	{
		//validate

		$rules = array(
			"name" => 'required',
			"harga" => 'required|numeric',
			"kategori" => 'required',
			"deskripsi"=> 'required',
			"is_rekomendasi" => 'required',
			"is_promosi" => 'required',
			"diskon" => 'numeric',
			"durasi_penyelesaian" => 'numeric',
			"status" => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {
			return Redirect::to('addmenu')
				->withError($validator);
		} else{

			$menu = new Menu;
			
			$menu->name 				= Input::get('name');
			$menu->harga 				= Input::get('harga');
			$menu->kategori 			= Input::get('kategori');
			$menu->is_rekomendasi		= Input::get('is_rekomendasi');
			$menu->end_date_rekomendasi	= Input::get('end_date_rekomendasi');
			$menu->is_promosi			= Input::get('is_promosi');
			$menu->end_date_promosi		= Input::get('end_date_promosi');
			$menu->diskon				= Input::get('diskon');
			$menu->durasi_penyelesaian	= Input::get('durasi_penyelesaian');
			$menu->status				= Input::get('status');
			$menu->deskripsi			= Input::get('deskripsi');
			$file 						= Input::file('foto');

			$extension 					= $file->getClientOriginalExtension();
			Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
			$menu->mime = $file->getClientMimeType();
			$menu->original_photoname = $file->getClientOriginalName();
			$menu->photoname = $file->getFilename().'.'.$extension;
			

			$menu->save();
			return Redirect::to('manajermenu/utama');
		}

	}

	 /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
	public function edit($id)
    {
        $menu = Menu::find($id);

        // show the Edit form and pass Karyawan
        return View::make('manajer.EditMenuUI')
        	->with('menu', $menu);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //validate

		$rules = array(
			"name" => 'required',
			"harga" => 'required|numeric',
			"deskripsi" => 'required',
			"kategori" => 'required',
			"is_rekomendasi" => 'required',
			"is_promosi" => 'required',
			"diskon" => 'numeric',
			"durasi_penyelesaian" => 'numeric',
			"status" => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {
			return Redirect::to('addmenu')
				->withError($validator);
		} else{

			$menu = Menu::find($id);
			
			$menu->name 				= Input::get('name');
			$menu->harga 				= Input::get('harga');
			$menu->kategori 			= Input::get('kategori');
			$menu->is_rekomendasi		= Input::get('is_rekomendasi');
			$menu->end_date_rekomendasi	= Input::get('end_date_rekomendasi');
			$menu->is_promosi			= Input::get('is_promosi');
			$menu->end_date_promosi		= Input::get('end_date_promosi');
			$menu->diskon				= Input::get('diskon');
			$menu->durasi_penyelesaian	= Input::get('durasi_penyelesaian');
			$menu->status				= Input::get('status');
			$menu->deskripsi			= Input::get('deskripsi');
			$file 						= Input::file('foto');
			if(!is_null($file)){
				$extension 				= $file->getClientOriginalExtension();
				Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
				$menu->mime = $file->getClientMimeType();
				$menu->original_photoname = $file->getClientOriginalName();
				$menu->photoname = $file->getFilename().'.'.$extension;
			}
			$menu->save();

			return Redirect::to('manajermenu');
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $menu = Menu::find($id);
        $menu->delete();

        return Redirect::to('manajermenu');
    }



	
}
