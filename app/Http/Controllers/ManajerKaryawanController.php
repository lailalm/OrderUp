<?php namespace App\Http\Controllers;

use App\Karyawan;
use View;
use Validator;
use Input;
use Redirect;
use Session;

class ManajerKaryawanController extends Controller {

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
		$list_karyawan=Karyawan::get();

		return View::make('manajer.DaftarKaryawanUI')
			->with('daftar_karyawan', $list_karyawan);
		
	}

	/**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
	public function create()
	{
		return View::make('manajer.FormKaryawanUI');
	}

	public function store()
	{
		//validate

		$rules = array(
			"name" => 'required',
			"email" => 'required|email',
			"password" => 'required|min:8',
			"role" => "required",
			"telepon" => "required|numeric",
			"foto" => "required",
			"alamat" => "required",
			"tanggal_mulai" => "required"
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {
			return Redirect::to('addkaryawan')
				->withError($validator);
		} else{

			$karyawan = new Karyawan;
			
			$karyawan->name 			= Input::get('name');
			$karyawan->email 			= Input::get('email');
			$karyawan->password 		= Input::get('password');
			$karyawan->role 			= Input::get('role');
			$karyawan->telepon 			= Input::get('telepon');
			$karyawan->foto 			= Input::get('foto');
			$karyawan->alamat 			= Input::get('alamat');
			$karyawan->tanggal_mulai 	= Input::get('tanggal_mulai');

			$karyawan->save();

			return Redirect::to('manajerkaryawan');
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
        $karyawan = Karyawan::find($id);

        // show the Edit form and pass Karyawan
        return View::make('manajer.EditKaryawanUI')
        	->with('karyawan', $karyawan);
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
			"email" => 'required|email',
			"password" => 'required|min:8',
			"role" => "required",
			"telepon" => "required|numeric",
			"foto" => "required",
			"alamat" => "required",
			"tanggal_mulai" => "required"
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {
			return Redirect::to('editkaryawan/'.$id)
				->withError($validator);
		} else{

			$karyawan = Karyawan::find($id);
			$karyawan->name 			= Input::get('name');
			$karyawan->email 			= Input::get('email');
			$karyawan->password 		= Input::get('password');
			$karyawan->role 			= Input::get('role');
			$karyawan->telepon 			= Input::get('telepon');
			$karyawan->foto 			= Input::get('foto');
			$karyawan->alamat 			= Input::get('alamat');
			$karyawan->tanggal_mulai 	= Input::get('tanggal_mulai');

			$karyawan->save();

			//Session::flash('message', 'Successfully created nerd!');
			return Redirect::to('manajerkaryawan');
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
        $karyawan = Karyawan::find($id);
        $karyawan->delete();

        return Redirect::to('manajerkaryawan');
    }

}
