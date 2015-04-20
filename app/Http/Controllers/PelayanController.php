<?php namespace App\Http\Controllers;

use View;
use Auth;
use Validator;
use Input;
use Redirect;
use Session;
use App\Menu;
use App\Pemanggilan;

class PelayanController extends Controller {
        
        public function __construct()
	{
		$this->middleware('auth'); 
	}
	
	public function getPemanggilan()
	{
		$panggilan = Pemanggilan::orderBy('id_pemanggilan', 'ASC')->
					where('status_pemanggilan','!=','1')->get();

		return View::make('pelayan.listPanggilanUI')
			->with('panggilan', $panggilan);

	}

	public function removePemanggilan(){

		Pemanggilan::where('id_pemanggilan', Input::get('id_pemanggilan'))->delete();
		return Redirect::to('listpemanggilan');
	}
	
}
