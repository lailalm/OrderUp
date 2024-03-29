<?php namespace app;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Menu extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	public $timestamps = false;
	public $primaryKey = 'id_menu';

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'menu';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'harga', 'kategori', 'photoname', 'mime', 'original_photoname', 'is_rekomendasi', 'end_date_rekomendasi', 'deskripsi', 'is_promosi', 'end_date_promosi', 'diskon', 'durasi_penyelesaian', 'status'];

}