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
				substr($path,0,9)==='/editmenu' ||
				substr($path,0,9)==='/editmeja'||
				substr($path,0,13)==='/editkaryawan' ||
				substr($path,0,11)==='/deletemeja' ||
				substr($path,0,11)==='/deletemenu' ||
				substr($path,0,15)==='/deletekaryawan' ||
				substr($path,0,12)==='/manajermenu' ||
				substr($path,0,16)==='/manajerkaryawan'||
				substr($path,0,11)==='/editprofil'||
				substr($path,0,18)==='/editkodeloginkoki'||
				substr($path,0,14)==='/ulasanlayanan'||
				substr($path,0,18)==='/statistikmingguan'||
				substr($path,0,17)==='/statistikbulanan'||
				substr($path,0,17)==='/ulasanmenudetail' ||
				substr($path,0,19)==='/rangkumanstatistik'
				 ) {
				return $next($request);
			} else {
				return Redirect::to('/manajermenu');
			}
		}
		elseif ($this->auth->user()->role=="Koki") {
			$path=$request->getPathInfo();
			if ($path=="/daftarpesanan" ||
				substr($path,0,11)==='/statusmenu' ||
				substr($path,0,14)==='/makeavailable' ||
				substr($path,0,16)==='/makeunavailable' ||
				substr($path,0,13)==='/changestatus'||
				substr($path,0,11)==='/editprofil'||
				substr($path,0,18)==='/editkodeloginkoki'
				 )
			{
				return $next($request);
			}
			return Redirect::to('daftarpesanan');
		} elseif ($this->auth->user()->role=="Pelayan") {
			$path=$request->getPathInfo();
			if ($path=="/daftarpesanan" ||
			    $path=="/listpemanggilan" ||
			    substr($path,0,13)==='/changestatus' ||
			    substr($path, 0, 18)==='/removepemanggilan' ||
					substr($path,0,11)==='/editprofil'||
					substr($path,0,18)==='/editkodeloginkoki'
					)
			{
				return $next($request);
			} else {
				return Redirect::to('/daftarpesanan');
			}
		}
		elseif ($this->auth->user()->role=="Meja")
		{
			$path=$request->getPathInfo();
			if ($path=="/addpemesanan" ||
				$path=="/listpesanan" ||
				$path=="/hapuspesanan" ||
				$path=="/pembayaran" ||
				$path=="/tutorial" ||
				$path=="/logout" ||
				$path=="/addpemanggilan" ||
				$path=="/bayar" ||
				$path=="/kredit" ||
				$path=="/debit" ||
				substr($path,0,5)==='/menu')
			{
				return $next($request);
			} else {
				return Redirect::to('/');
			}
		}
		return $next($request);
	}
}
