<?php namespace App\Http\Controllers;

use App\Menu;
use App\UlasanRestoran;
use App\UlasanMakanan;
use App\Pemesanan;
use View;
use Validator;
use Input;
use Redirect;
use Session;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
date_default_timezone_set("Asia/Jakarta");

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
	use AuthenticatesAndRegistersUsers;
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}


	public function index($kategori)
	{
		if($kategori=="utama"){
			return View::make('manajer.DaftarMenuUI')
			->with('list_menu', Menu::where('kategori','Menu Utama')->get())
			->with('kategori', $kategori)
			->with('review', UlasanMakanan::get());
		}
		else if($kategori=="pembuka"){
			return View::make('manajer.DaftarMenuUI')
			->with('list_menu', Menu::where('kategori','Menu Pembuka')->get())
			->with('kategori', $kategori)
			->with('review', UlasanMakanan::get());
		}
		else if($kategori=="sampingan"){
			return View::make('manajer.DaftarMenuUI')
			->with('list_menu', Menu::where('kategori','Menu Sampingan')->get())
			->with('kategori', $kategori)
			->with('review', UlasanMakanan::get());
		}
		else if($kategori=="penutup"){
			return View::make('manajer.DaftarMenuUI')
			->with('list_menu', Menu::where('kategori','Menu Penutup')->get())
			->with('kategori', $kategori)
			->with('review', UlasanMakanan::get());
		}
		else if($kategori=="minuman"){
			return View::make('manajer.DaftarMenuUI')
			->with('list_menu', Menu::where('kategori','Menu Minuman')->get())
			->with('kategori', $kategori)
			->with('review', UlasanMakanan::get());
		}
		else if($kategori=="rekomendasi"){
			return View::make('manajer.DaftarMenuUI')
			->with('list_menu', Menu::where('is_rekomendasi','1')->get())
			->with('kategori', $kategori)
			->with('review', UlasanMakanan::get());
		}
		else if($kategori=="promosi"){
			return View::make('manajer.DaftarMenuUI')
			->with('list_menu', Menu::where('is_promosi','1')->get())
			->with('kategori', $kategori)
			->with('review', UlasanMakanan::get());
		}
		else{
			return View::make('manajer.DaftarMenuUI')
			->with('list_menu', Menu::where('kategori','Menu Utama')->get())
			->with('kategori', 'utama')
			->with('review', UlasanMakanan::get());
		}

	}

	public function rekomendasi($rekomendasi, $id){

		$menu = Menu::find($id);
		if($rekomendasi == "rekomendasi"){
			Session::flash('message', 'Berhasil menambahkan menu '.$menu->name.' menjadi menu rekomendasi.');
			Session::flash('alert-class', 'alert-success');
			$menu->is_rekomendasi = '1';
		}
		else if ($rekomendasi == "deleterekomendasi"){
			Session::flash('message', 'Berhasil menghapus rekomendasi pada '.$menu->name.'.');
			Session::flash('alert-class', 'alert-success');
			$menu->is_rekomendasi = '0';
		}
		else {

		}

		$menu->save();
		$kategori = $menu->kategori;

		if($kategori=="Menu Utama"){
			$rute = "utama";
		}
		else if($kategori=="Menu Pembuka"){
			$rute = "pembuka";
		}
		else if($kategori=="Menu Sampingan"){
			$rute = "sampingan";
		}
		else if($kategori=="Menu Penutup"){
			$rute = "Penutup";
		}
		else if($kategori=="Menu Minuman"){
			$rute = "minuman";
		}
		else if($is_rekomendasi=="1"){
			$rute = "rekomendasi";
		}
		else if($is_promosi=="1"){
			$rute = "promosi";
		}
		else {

		}
		return redirect('manajermenu/'.$rute);
	}

	public function dasar()
	{
		return redirect('manajermenu/utama');
	}


	public function create()
	{
		return View::make('manajer.FormMenuUI')
			->with('promosi', false);;
	}

	public function createPromosi()
	{
		return View::make('manajer.FormMenuUI')
			->with('promosi', true);;
	}

	public function lihatLayanan(){
		$ulasan=array();
		foreach(UlasanRestoran::get() as $aulasan){
			array_push($ulasan, $aulasan);
		}
		uasort($ulasan, function ($a,$b)
		{
			if($a['tanggal']<$b['tanggal']){ return 1; }
			elseif ($a['tanggal']>$b['tanggal']) { return -1;}
			else return 0;
		});
		return View::make('manajer.UlasanLayananUI')
			->with('ulasan', $ulasan);
	}

	public function statistikBulanan($namaBulan){
		if($namaBulan=="now") {
			$namaBulan=date('M Y');
		}
		
		$bulans=array();
		foreach (Pemesanan::get() as $pemesanan) {
			if($pemesanan->status=="Paid"){
				if(array_key_exists(date('M Y',strtotime($pemesanan->waktu)), $bulans)){
					$bulans[date('M Y',strtotime($pemesanan->waktu))]['jumlah']=$bulans[date('M Y',strtotime($pemesanan->waktu))]['jumlah']+$pemesanan->jumlah;
					if(array_key_exists($pemesanan->id_menu, $bulans[date('M Y',strtotime($pemesanan->waktu))]['menu'])){
						$bulans[date('M Y',strtotime($pemesanan->waktu))]['menu'][$pemesanan->id_menu]['jumlah']=$bulans[date('M Y',strtotime($pemesanan->waktu))]['menu'][$pemesanan->id_menu]['jumlah']+$pemesanan->jumlah;
					}
					else{
						$menu=array();
						$menu['id_menu']=$pemesanan->id_menu;
						$menu['nama']=Menu::where('id_menu',$pemesanan->id_menu)->get()->first()->name;
						$menu['jumlah']=$pemesanan->jumlah;
						$menu['image']=Menu::where('id_menu',$pemesanan->id_menu)->get()->first()->photoname;

						$bulans[date('M Y',strtotime($pemesanan->waktu))]['menu'][$pemesanan->id_menu]=$menu;
					}
				} else {
					$menu=array();
					$menu['id_menu']=$pemesanan->id_menu;
					$menu['nama']=Menu::where('id_menu',$pemesanan->id_menu)->get()->first()->name;
					$menu['jumlah']=$pemesanan->jumlah;
					$menu['image']=Menu::where('id_menu',$pemesanan->id_menu)->get()->first()->photoname;
					$menus=array();
					$menus[$pemesanan->id_menu]=$menu;

					$bulan=array();
					$bulan['nama']=date('M',strtotime($pemesanan->waktu));
					$bulan['tahun']=date('Y',strtotime($pemesanan->waktu));
					$bulan['tanggal']=$pemesanan->waktu;
					$bulan['jumlah']=$pemesanan->jumlah;
					$bulan['menu']=$menus;
					$bulans[date('M Y',strtotime($pemesanan->waktu))]=$bulan;

				}
			}
		}
		uasort($bulans, function ($a,$b)
		{
			if($a['tanggal']<$b['tanggal']){ return -1; }
			elseif ($a['tanggal']>$b['tanggal']) { return 1;}
			else return 0;
		});
		foreach ($bulans as $key => $value) {
			uasort($value['menu'], function ($a,$b)
			{
				if($a['jumlah']<$b['jumlah']){ return 1; }
				elseif ($a['jumlah']>$b['jumlah']) { return -1;}
				else return 0;
			});
			$bulans[$key]=$value;
		}
		// dd($namaBulan);
		return View::make('manajer.StatistikBulananUI')
			->with('bulans',$bulans)
			->with('namaBulan',$namaBulan);
	}

	public function statistikMingguan($namaMinggu){
		$namaBulan=date('M Y');
		if($namaMinggu=="now") {
			$namaMinggu= "Minggu ".(date("W") - date("W", strtotime(date("Y-m-01", time()))) + 1);
		}

		$minggus=array();
		foreach (Pemesanan::get() as $pemesanan) {
			if($pemesanan->status=="Paid" && date('M Y',strtotime($pemesanan->waktu))==$namaBulan){
				$week="Minggu ".(date("W",strtotime($pemesanan->waktu)) - date("W", strtotime(date("Y-m-01", time()))) + 1);
				if(array_key_exists($week,$minggus)){
				    $minggus[$week]['jumlah']=$minggus[$week]['jumlah']+$pemesanan->jumlah;

					if(array_key_exists($pemesanan->id_menu, $minggus[$week]['menu'])){
				      $minggus[$week]['menu'][$pemesanan->id_menu]['jumlah']=$minggus[$week]['menu'][$pemesanan->id_menu]['jumlah']+$pemesanan->jumlah;
				     }
					else{
						$menu=array();
						$menu['id_menu']=$pemesanan->id_menu;
						$menu['nama']=Menu::where('id_menu',$pemesanan->id_menu)->get()->first()->name;
						$menu['jumlah']=$pemesanan->jumlah;
						$menu['image']=Menu::where('id_menu',$pemesanan->id_menu)->get()->first()->photoname;

						$minggus[$week]['menu'][$pemesanan->id_menu]=$menu;
					}
				} else {
					$menu=array();
					$menu['id_menu']=$pemesanan->id_menu;
					$menu['nama']=Menu::where('id_menu',$pemesanan->id_menu)->get()->first()->name;
					$menu['jumlah']=$pemesanan->jumlah;
					$menu['image']=Menu::where('id_menu',$pemesanan->id_menu)->get()->first()->photoname;
					$menus=array();
					$menus[$pemesanan->id_menu]=$menu;

					$minggu=array();
					$minggu['nama']=date('M',strtotime($pemesanan->waktu));
					$minggu['tanggal']=$pemesanan->waktu;
					$minggu['jumlah']=$pemesanan->jumlah;
					$minggu['menu']=$menus;
					$minggus[$week]=$minggu;

				}

			}
		}
		uasort($minggus, function ($a,$b)
		{
			if($a['tanggal']<$b['tanggal']){ return -1; }
			elseif ($a['tanggal']>$b['tanggal']) { return 1;}
			else return 0;
		});
		foreach ($minggus as $key => $value) {
			uasort($value['menu'], function ($a,$b)
			{
				if($a['jumlah']<$b['jumlah']){ return 1; }
				elseif ($a['jumlah']>$b['jumlah']) { return -1;}
				else return 0;
			});
			$minggus[$key]=$value;
		}
		// dd($minggus);
		return View::make('manajer.StatistikMingguanUI')
			->with('minggus',$minggus)
			->with('namaMinggu',$namaMinggu);;
	}

	public function ulasanMenuDetail($id){
		$ulasanmakanan = UlasanMakanan::where('id_menu', $id)->get();
		$menu = Menu::find($id);
		return View::make('manajer.UlasanMenuDetailUI')
			->with('ulasanmknn', $ulasanmakanan)
			->with('menu', $menu->name);
	}

	public function rangkuman(){
		$bulans=array();
		foreach (Pemesanan::get() as $pemesanan) {
			if($pemesanan->status=="Paid"){
				if(array_key_exists(date('M Y',strtotime($pemesanan->waktu)), $bulans)){
					$bulans[date('M Y',strtotime($pemesanan->waktu))]['jumlah']=$bulans[date('M Y',strtotime($pemesanan->waktu))]['jumlah']+($pemesanan->jumlah*Menu::find($pemesanan->id_menu)->harga);
				}else{
					$bulan=array();
					$bulan['nama']=date('M',strtotime($pemesanan->waktu));
					$bulan['tahun']=date('Y',strtotime($pemesanan->waktu));
					$bulan['jumlah']=$pemesanan->jumlah*Menu::find($pemesanan->id_menu)->harga;
					$bulan['tanggal']=$pemesanan->waktu;
					$bulans[date('M Y',strtotime($pemesanan->waktu))]=$bulan;
				}
			}
		}
		uasort($bulans, function ($a,$b)
		{
			if($a['tanggal']<$b['tanggal']){
				return 1;
			}
			elseif ($a['tanggal']>$b['tanggal']) {
				return -1;
			}
			else return 0;
		});
		return View::make('manajer.RangkumanStatistikUI')
			->with('bulans', $bulans);
	}


	public function store()
	{
		//validate
		$rules = array(
			"name" => 'required',
			"harga" => 'required|numeric|min:1',
			"kategori" => 'required',
			"deskripsi"=> 'required',
			"is_rekomendasi" => 'required',
			"is_promosi" => 'required',
			"diskon" => 'numeric',
			"durasi_penyelesaian" => 'numeric',
			"status" => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			Session::flash('message', 'Gagal menambahkan. Mohon cek kembali isian Anda.');
			Session::flash('alert-class', 'alert-danger');

			if(Input::get('is_promosi') == '0'){
				return Redirect::to('addmenu');;
			}
			else{
				return Redirect::to('addmenupromosi');;
			}
		} else {

			$menu = new Menu;

			$menu->name 				= Input::get('name');
			$menu->harga 				= Input::get('harga');
			$menu->kategori 			= Input::get('kategori');
			$menu->is_rekomendasi		= Input::get('is_rekomendasi');
			$menu->end_date_rekomendasi	= Input::get('end_date_rekomendasi');
			$menu->is_promosi			= Input::get('is_promosi');
			$menu->end_date_promosi		= Input::get('end_date_promosi');
			$menu->diskon				= Input::get('diskon');
			$menu->durasi_penyelesaian	= Input::get('durasi_penyelesaian');
			$menu->status				= Input::get('status');
			$menu->deskripsi			= Input::get('deskripsi');
			$file 						= Input::file('foto');

			$extension 					= $file->getClientOriginalExtension();
			Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
			$menu->mime = $file->getClientMimeType();
			$menu->original_photoname = $file->getClientOriginalName();
			$menu->photoname = $file->getFilename().'.'.$extension;

			$kategori = $menu->kategori;
			$menu->save();
			if($kategori=="Menu Utama"){
				$rute = "utama";
			}
			else if($kategori=="Menu Pembuka"){
				$rute = "pembuka";
			}
			else if($kategori=="Menu Sampingan"){
				$rute = "sampingan";
			}
			else if($kategori=="Menu Penutup"){
				$rute = "Penutup";
			}
			else if($kategori=="Menu Minuman"){
				$rute = "minuman";
			}
			else if($menu->is_rekomendasi=="1"){
				$rute = "rekomendasi";
			}
			else if($menu->is_promosi=="1"){
				$rute = "promosi";
			}
			else {

			}

			Session::flash('message',  $menu->name .' berhasil ditambahkan.');
			Session::flash('alert-class', 'alert-success');


			return Redirect::to('manajermenu/'.$rute);
		}

	}


	public function edit($id)
    {
        $menu = Menu::find($id);

        return View::make('manajer.EditMenuUI')
        	->with('menu', $menu);
    }


    public function update($id)
    {
        //validate
		$rules = array(
			"name" => 'required',
			"harga" => 'required|numeric|min:1',
			"deskripsi" => 'required',
			"kategori" => 'required',
			"is_rekomendasi" => 'required',
			"is_promosi" => 'required',
			"diskon" => 'numeric',
			"durasi_penyelesaian" => 'numeric',
			"status" => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {
			Session::flash('message', 'Gagal mengubah. Silahkan periksa input Anda.');
			Session::flash('alert-class', 'alert-danger');
			return Redirect::to('editmenu/'.$id);
		} else{

			$menu = Menu::find($id);

			$menu->name 				= Input::get('name');
			$menu->harga 				= Input::get('harga');
			$menu->kategori 			= Input::get('kategori');
			$menu->is_rekomendasi		= Input::get('is_rekomendasi');
			$menu->end_date_rekomendasi	= Input::get('end_date_rekomendasi');
			$menu->is_promosi			= Input::get('is_promosi');
			$menu->end_date_promosi		= Input::get('end_date_promosi');
			$menu->diskon				= Input::get('diskon');
			$menu->durasi_penyelesaian	= Input::get('durasi_penyelesaian');
			$menu->status				= Input::get('status');
			$menu->deskripsi			= Input::get('deskripsi');
			$file 						= Input::file('foto');
			if(!is_null($file)){
				$extension 				= $file->getClientOriginalExtension();
				Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
				$menu->mime = $file->getClientMimeType();
				$menu->original_photoname = $file->getClientOriginalName();
				$menu->photoname = $file->getFilename().'.'.$extension;
			}
			$menu->save();
			$kategori = $menu->kategori;

			if($kategori=="Menu Utama"){
				$rute = "utama";
			}
			else if($kategori=="Menu Pembuka"){
				$rute = "pembuka";
			}
			else if($kategori=="Menu Sampingan"){
				$rute = "sampingan";
			}
			else if($kategori=="Menu Penutup"){
				$rute = "Penutup";
			}
			else if($kategori=="Menu Minuman"){
				$rute = "minuman";
			}
			else if($menu->is_rekomendasi=="1"){
				$rute = "rekomendasi";
			}
			else if($menu->is_promosi=="1"){
				$rute = "promosi";
			}
			else {

			}

			Session::flash('message', 'Berhasil mengubah menu '.$menu->name);
			Session::flash('alert-class', 'alert-success');
			return Redirect::to('manajermenu/'.$rute);
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
        $menu = Menu::find($id);
        $kategori = $menu->kategori;
        $name = $menu->name;
        $menu->delete();

        if($kategori=="Menu Utama"){
			$rute = "utama";
		}
		else if($kategori=="Menu Pembuka"){
			$rute = "pembuka";
		}
		else if($kategori=="Menu Sampingan"){
			$rute = "sampingan";
		}
		else if($kategori=="Menu Penutup"){
			$rute = "Penutup";
		}
		else if($kategori=="Menu Minuman"){
			$rute = "minuman";
		}
		else if($menu->is_rekomendasi=="1"){
			$rute = "rekomendasi";
		}
		else if($menu->is_promosi=="1"){
			$rute = "promosi";
		}
		else {

		}
	Session::flash('message',  $menu->name .' berhasil dihapus.');
	Session::flash('alert-class', 'alert-success');
        return Redirect::to('manajermenu/'.$rute);
    }



}
