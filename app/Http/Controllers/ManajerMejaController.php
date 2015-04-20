<?php namespace App\Http\Controllers;

use App\Meja;
use App\Karyawan;
use View;
use Validator;
use Input;
use Redirect;
use Session;
use Mail;
use Config;


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
	public function __construct()
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
		$list_meja = Meja::get();

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
			"nomormeja"	=> 'required',
			"deskripsi" => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {		
	        Session::flash('message', 'Gagal menambahkan meja. Mohon periksa isian Anda.'); 
			Session::flash('alert-class', 'alert-danger'); 
			return redirect('addmeja')
				->withError($validator);
		} else {

			$meja = new Meja;
			$meja->nomormeja	= Input::get('nomormeja');
			$meja->kodemasuk	= Input::get('kodemasuk');
			$meja->deskripsi	= Input::get('deskripsi');
			$meja->save();

			$karyawan = new Karyawan;
			$karyawan->name = $meja->id_meja;
			$karyawan->email = $meja->kodemasuk;
			$karyawan->password = bcrypt($meja->kodemasuk);
			$karyawan->role= "Meja";
			$karyawan->save();


	        Session::flash('message', 'Berhasil menambahkan '.$meja->nomormeja); 
			Session::flash('alert-class', 'alert-success'); 
			//Session::flash('message', 'Successfully created nerd!');
			return redirect('manajermeja');
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
        return View::make('manajer/EditMejaUI')
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
			return redirect('addmeja')
				->withError($validator);
		} else{

			$meja = Meja::find($id);
			$meja->nomormeja	= Input::get('nomormeja');
			$meja->kodemasuk	= Input::get('kodemasuk');
			$meja->deskripsi	= Input::get('deskripsi');
			$meja->save();

			$karyawan = Karyawan::where('name',$id)->get()[0];
			$karyawan->name = $meja->id_meja;
			$karyawan->email = $meja->kodemasuk;
			$karyawan->password = bcrypt($meja->kodemasuk);
			$karyawan->save(); 

	        Session::flash('message', 'Berhasil mengubah '.$meja->nomormeja); 
			Session::flash('alert-class', 'alert-success'); 
			//Session::flash('message', 'Successfully created nerd!');
			return redirect('manajermeja');
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
        $temp = $meja->nomormeja;
        $meja->delete();


        Session::flash('message', 'Berhasil menghapus '.$temp.' dari daftar meja.'); 
		Session::flash('alert-class', 'alert-success'); 
		return redirect('manajermeja');

    }

}
