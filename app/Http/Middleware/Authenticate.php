<?php namespace App\Http\Middleware;

use Closure;
use Redirect;
use Illuminate\Contracts\Auth\Guard;

class Authenticate {

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
		//dd($auth->user()->role);
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if ($this->auth->guest())
		{
			if ($request->ajax())
			{
				return response('Unauthorized.', 401);
			}
			else
			{
				return redirect()->guest('auth/login');
			}
		}
		//disi
		if($this->auth->user()->role=="Manajer"){
			$path=$request->getPathInfo();
			if ($path=="/manajermeja" || $path=="/manajerkaryawan" || 
				$path=="/addmenu" || $path=="/addmenupromosi" || 
				$path=="/addmeja" || $path=="/addkaryawan" || 
				$path=="/addpelayan" || $path=="/addkoki" || 
				strpos($path, 'editmenu') !== false || strpos($path, 'editmeja') !== false || 
				strpos($path, 'editkaryawan') !== false ||
				strpos($path, 'deletemeja') || strpos($path, 'deletemenu') || 
				strpos($path, 'deletekaryawan') ||
				strpos($path, 'manajermenu') ||
				strpos($path, 'manajerkaryawan') ) {
				return $next($request);
			}
			return Redirect::to('manajermenu');
		} elseif ($this->auth->user()->role=="Koki") {
			dd("kamu bukan manajer bung");
		}
		return $next($request);
	}

}
