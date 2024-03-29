<?php namespace App\Http\Controllers;

require 'vendor/autoload.php';
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;

use App\Karyawan;
use View;
use Validator;
use Input;
use Redirect;
use Session;
use Mail;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

//Image::configure(array('driver' => 'imagick'));

class ManajerKaryawanController extends Controller {


	public function __construct()
	{
		$this->middleware('auth');
	}


	public function index()
	{
		return redirect('manajerkaryawan/koki');
	}

	public function indexByRole($role)
	{
		$list_karyawan=Karyawan::get();

		return View::make('manajer.DaftarKaryawanUI')
			->with('daftar_karyawan', Karyawan::where('role', 'LIKE', $role)->get())
			->with('role', $role);;
	}
	
	public function create()
	{
		return View::make('manajer.FormKaryawanUI');
	}

	public function createKoki()
	{
		return View::make('manajer.FormKaryawanUI')
			->with('role', 'Koki');
	}


	public function createPelayan()
	{
		return View::make('manajer.FormKaryawanUI')
			->with('role', 'Pelayan');
	}

	public function store()
	{
		//validate
		$rules = array(
			"name" => 'required|regex:/^[A-Za-z0-9\- ]+$/',
			"email" => 'required|email',
			"password" => 'required|min:8',
			"role" => "required",
			"telepon" => "required|numeric",
			"foto" => "required",
			"alamat" => "required",
			"tanggal_mulai" => "required"
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			Session::flash('message', 'Gagal menambahkan. Mohon cek kembali isian Anda.'); 
			Session::flash('alert-class', 'alert-danger');

			return Redirect::to('addkoki');;
				// ->withError('errors', $validator);
		} else {

			$karyawan = new Karyawan;
			
			$karyawan->name 			= Input::get('name');
			$karyawan->email 			= Input::get('email');
			$karyawan->password 		= bcrypt(Input::get('password'));
			$karyawan->role 			= Input::get('role');
			$karyawan->telepon 			= Input::get('telepon');
			$karyawan->alamat 			= Input::get('alamat');
			$karyawan->tanggal_mulai 	= Input::get('tanggal_mulai');
			$file 						= Input::file('foto');

			$extension 					= $file->getClientOriginalExtension();

			$extension 					= $file->getClientOriginalExtension();
			Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
			$karyawan->mime = $file->getClientMimeType();
			$karyawan->original_photoname = $file->getClientOriginalName();
			$karyawan->photoname = $file->getFilename().'.'.$extension;
			$karyawan->save();

			$this->emailRegistered(Input::get('name'),Input::get('email'),Input::get('password'),Input::get('role'));
			
			Session::flash('message',  $karyawan->name .' berhasil ditambahkan.'); 
			Session::flash('alert-class', 'alert-success'); 

			if ($karyawan->role == "Pelayan")
				return Redirect::to('manajerkaryawan/pelayan');
			else
				return Redirect::to('manajerkaryawan/koki');
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
        $karyawan = Karyawan::find($id);

        // show the Edit form and pass Karyawan
        return View::make('manajer.EditKaryawanUI')
        	->with('karyawan', $karyawan);
    }

    public function update($id)
    {
        //validate

		$rules = array(
			"name" => 'required',
			"email" => 'required|email',
			"role" => "required",
			"telepon" => "required|numeric",
			"alamat" => "required",
			"tanggal_mulai" => "required"
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {
			Session::flash('message', 'Gagal mengubah. Mohon cek kembali isian Anda.'); 
			Session::flash('alert-class', 'alert-danger'); 
			return Redirect::to('editkaryawan/'.$id);
				// ->withError($validator);
		} else {

			$karyawan = Karyawan::find($id);
			$karyawan->name 			= Input::get('name');
			$karyawan->email 			= Input::get('email');
			$password					= Input::get('password');
			if(!$password==""){
				$karyawan->password 	= bcrypt(Input::get('password'));
			}
			$karyawan->role 			= Input::get('role');
			$karyawan->telepon 			= Input::get('telepon');
			$karyawan->alamat 			= Input::get('alamat');
			$karyawan->tanggal_mulai 	= Input::get('tanggal_mulai');
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

			if ($karyawan->role == "Pelayan")
				return Redirect::to('manajerkaryawan/pelayan');
			else
				return Redirect::to('manajerkaryawan/koki');
		}
    }

    
    public function destroy($id)
    {
        $karyawan = Karyawan::find($id);
        $temp = $karyawan->role;
        $temp2 = $karyawan->name;
        $karyawan->delete();

        Session::flash('message', 'Berhasil menghapus '.$temp2.' dari daftar '.$temp); 
		Session::flash('alert-class', 'alert-success'); 

        if ($temp == "Pelayan")
			return Redirect::to('manajerkaryawan/pelayan');
		else
			return Redirect::to('manajerkaryawan/koki');
    }
	
	public function emailRegistered($name,$email,$password,$role)
    {
		Mail::send('emails.password', ['newPassword' => $password, 'name'=> $name,'role' => $role], function($message) use ($email, $name)
		{
			$message->to($email, $name)->subject('Welcome!');			
		});
    }
}
