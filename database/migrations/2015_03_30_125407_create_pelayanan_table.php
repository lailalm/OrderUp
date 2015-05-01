<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePelayananTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pelayanan', function(Blueprint $table)
		{
			$table->increments('id_pelayanan');
			$table->integer('id_pemesanan')->unsigned();
			$table->foreign('id_pemesanan')->references('id_pemesanan')->on('pemesanan');
			$table->integer('id_karyawan')->unsigned();
			$table->foreign('id_karyawan')->references('id_karyawan')->on('karyawan');
			$table->integer('durasi_masak');
			$table->integer('durasi_pengantaran');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pelayanan');
	}

}
