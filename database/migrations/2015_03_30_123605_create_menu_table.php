<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('menu', function(Blueprint $table)
		{
			$table->increments('id_menu');
			$table->string('name',40);
			$table->integer('harga');
			$table->enum('kategori', array('Menu Pembuka','Menu Utama', 'Menu Sampingan', 'Menu Penutup', 'Menu Minuman'));
			$table->string('photoname');
			$table->string('mime');
			$table->string('original_photoname');
			$table->boolean('is_rekomendasi');
			$table->date('end_date_rekomendasi');
			$table->boolean('is_promosi');
			$table->date('end_date_promosi');
			$table->integer('diskon');
			$table->integer('durasi_penyelesaian');
			$table->boolean('status');
			$table->text('deskripsi');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('menu');
	}

}
