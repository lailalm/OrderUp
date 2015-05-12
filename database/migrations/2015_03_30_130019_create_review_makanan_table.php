<?php



use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;



class CreateReviewMakananTable extends Migration {



	/**

	 * Run the migrations.

	 *

	 * @return void

	 */

	public function up()

	{

		Schema::create('review_makanan', function(Blueprint $table)

		{

			$table->increments('id_review');

			$table->integer('id_meja')->unsigned();

			$table->foreign('id_meja')->references('id_meja')->on('meja');

			$table->integer('id_menu')->unsigned();

			$table->foreign('id_menu')->references('id_menu')->on('menu');

			$table->date('tanggal');

			$table->integer('nilai');->unsigned();

			$table->text('komentar');

		});

	}



	/**

	 * Reverse the migrations.

	 *

	 * @return void

	 */

	public function down()

	{

		Schema::drop('review_makanan');

	}



}

