<?php namespace App\Http\Controllers;

use App\Menu;
use View;
use Validator;
use Input;
use Redirect;
use Session;

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

	// *
	//  * Create a new controller instance.
	//  *
	//  * @return void
	 
	// public function __construct()
	// {
	// 	$this->middleware('auth');
	// }

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$list_menu=Menu::get();

		return View::make('manajer.DaftarMenuUI')
			->with('list_menu', $list_menu);;
	}

	/**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
	public function create()
	{
		return View::make('manajer.FormMenuUI');
	}

	/**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
	public function store()
	{
		//validate

		$rules = array(
			"name" => 'required',
			"harga" => 'required|numeric',
			"kategori" => 'required',
			"gambar" => 'required',
			"is_rekomendasi" => 'required',
			"end_date_rekomendasi" => 'required|date',
			"is_promosi" => 'required',
			"end_date_promosi" => 'required|date',
			"diskon" => 'required|numeric',
			"durasi_penyelesaian" => 'required|numeric',
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
			$menu->gambar 				= Input::get('gambar');
			$menu->is_rekomendasi		= Input::get('is_rekomendasi');
			$menu->end_date_rekomendasi	= Input::get('end_date_rekomendasi');
			$menu->is_promosi			= Input::get('is_promosi');
			$menu->end_date_promosi		= Input::get('end_date_promosi');
			$menu->diskon				= Input::get('diskon');
			$menu->durasi_penyelesaian	= Input::get('durasi_penyelesaian');
			$menu->status				= Input::get('status');

			$menu->save();

			//Session::flash('message', 'Successfully created nerd!');
			return Redirect::to('manajermenu');
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
    	// echo '<script type="text/javascript">','alert("Ceritanya nanti ngambil data ',$id,'");','</script>';
        // get karyawan
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
			"kategori" => 'required',
			"gambar" => 'required',
			"is_rekomendasi" => 'required',
			"end_date_rekomendasi" => 'required|date',
			"is_promosi" => 'required',
			"end_date_promosi" => 'required|date',
			"diskon" => 'required|numeric',
			"durasi_penyelesaian" => 'required|numeric',
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
			$menu->gambar 				= Input::get('gambar');
			$menu->is_rekomendasi		= Input::get('is_rekomendasi');
			$menu->end_date_rekomendasi	= Input::get('end_date_rekomendasi');
			$menu->is_promosi			= Input::get('is_promosi');
			$menu->end_date_promosi		= Input::get('end_date_promosi');
			$menu->diskon				= Input::get('diskon');
			$menu->durasi_penyelesaian	= Input::get('durasi_penyelesaian');
			$menu->status				= Input::get('status');

			$menu->save();

			//Session::flash('message', 'Successfully created nerd!');
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
