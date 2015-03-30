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
			$table->string('name',15);
			$table->integer('harga');
			$table->enum('kategori', array('makanan','minuman'));
			$table->string('gambar',32);
			$table->boolean('is_rekomendasi');
			$table->date('end_date_rekomendasi');
			$table->boolean('is_promosi');
			$table->date('end_date_promosi');
			$table->integer('diskon');
			$table->integer('durasi_penyelesaian');
			$table->boolean('status');

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
