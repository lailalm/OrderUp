<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemanggilanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pemanggilan', function(Blueprint $table)
		{
			$table->increments('id_pemanggilan');
			$table->integer('id_meja')->unsigned();
			$table->foreign('id_meja')->references('id_meja')->on('meja');
			$table->timestamp('timestamp');
			$table->text('pesan');
			$table->boolean('status_pemanggilan');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pemanggilan');
	}

}
