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
			// "email" => 'required|email',
			// "password" => 'required|min:8',
			// "role" => "required",
			// "telepon" => "required|numeric",
			// "foto" => "required",
			// "alamat" => "required",
			// "tanggal_mulai" => "required"
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {
			var_dump($validator);
			//return Redirect::to('addkaryawan')
			//	->withError($validator);
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

}
