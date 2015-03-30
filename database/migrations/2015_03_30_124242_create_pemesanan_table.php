<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemesananTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pemesanan', function(Blueprint $table)
		{
			$table->increments('id_pemesanan');
			$table->integer('id_meja')->unsigned();
			$table->integer('id_menu')->unsigned();
			$table->foreign('id_meja')->references('id_meja')->on('meja');
			$table->foreign('id_menu')->references('id_menu')->on('menu');
			$table->integer('jumlah');
			$table->timestamp('waktu');
			$table->enum('status', array('Queued','On Process','Done'));
			$table->text('keterangan');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pemesanan');
	}

}
