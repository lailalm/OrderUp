<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKaryawanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Karyawan', function(Blueprint $table)
		{
			$table->increments('id_karyawan');
			$table->string('name');
			$table->string('email')->unique();
			$table->string('password', 60)->nullable();
			$table->string('role');
			$table->string('telepon');
			$table->text('alamat');
			$table->date('tanggal_mulai');
			$table->rememberToken();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Karyawan');
	}

}
