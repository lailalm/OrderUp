<?php namespace App\Http\Controllers;

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

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$menus= $this->getAllMenu();
		return view('DaftarMenuUI',compact('menus'));
	}

	public function formMenu($id){
		echo '<script type="text/javascript">','alert("Ceritanya nanti ngambil data ',$id,'");','</script>';
	}

	public function getAllMenu(){
		$menus=['chicken carbonara', 'babi asap','kadal goreng'];
		return $menus;
	}

	
}
