<?php namespace App\Http\Controllers;

use App\Meja;
use View;
use Validator;
use Input;
use Redirect;
use Session;


class ManajerMejaController extends Controller {

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
	/**public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$list_meja=Meja::get();

		return View::make('manajer.DaftarMejaUI')
			->with('daftar_meja', $list_meja);
	}

	/**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
	public function create()
	{
		return View::make('manajer.FormMejaUI');
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
			"kodemasuk" => 'required',
			"deskripsi" => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {
			return Redirect::to('manajer.FormMejaUI')
				->withError($validator);
		} else{

			$meja = new Meja;
			$meja->kodemasuk	= Input::get('kodemasuk');
			$meja->deskripsi	= Input::get('deskripsi');
			$meja->save();

			//Session::flash('message', 'Successfully created nerd!');
			return Redirect::to('manajermeja');
		}

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
    	// echo '<script type="text/javascript">','alert("Ceritanya nanti ngambil data ',$id,'");','</script>';
        // get Meja
        $mejas = Meja::find($id);

        // show the Edit form and pass Meja
        return View::make('manajer.EditMejaUI')
        	->with('meja', $mejas);
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
			"kodemasuk" => 'required',
			"deskripsi" => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {
			return Redirect::to('manajer.FormMejaUI')
				->withError($validator);
		} else{

			$meja = Meja::find($id);
			$meja->kodemasuk	= Input::get('kodemasuk');
			$meja->deskripsi	= Input::get('deskripsi');
			$meja->save();

			//Session::flash('message', 'Successfully created nerd!');
			return Redirect::to('manajermeja');
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
        $meja = Meja::find($id);
        $meja->delete();

        return Redirect::to('manajermeja');
    }

}
