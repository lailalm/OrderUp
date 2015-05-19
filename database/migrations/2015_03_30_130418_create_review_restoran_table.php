<?php



use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;



class CreateReviewRestoranTable extends Migration {



	/**

	 * Run the migrations.

	 *

	 * @return void

	 */

	public function up()

	{

		Schema::create('review_restoran', function(Blueprint $table)

		{

			$table->increments('id_review');

			$table->integer('id_meja')->unsigned();

			$table->foreign('id_meja')->references('id_meja')->on('meja');

			$table->date('tanggal');

			$table->string('nama');

			$table->text('review');

			$table->integer('nilai');->unsigned();

			$table->timestamps();

		});

	}



	/**

	 * Reverse the migrations.

	 *

	 * @return void

	 */

	public function down()

	{

		Schema::drop('review_restoran');

	}



}

