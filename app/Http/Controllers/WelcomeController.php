<?php namespace App\Http\Controllers;

use Redirect;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	// public function __construct()
	// {
	// 	$this->middleware('guest');
	// }

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('dummy');
	}

	/**
	 * 
	 *
	 * @return Response
	 */
	public function dummy()
	{
		return view('dummy');
	}

	public function home()
	{
		return Redirect::to('/');
	}

	public function show($id)
	{
		return $id;
	}

}
