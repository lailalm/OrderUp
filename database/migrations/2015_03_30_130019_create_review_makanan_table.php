<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewMakananTable extends Migration
{
    public function up(): void
    {
        Schema::create('review_makanan', function (Blueprint $table) {
            $table->increments('id_review');
            $table->unsignedInteger('id_meja');
            $table->foreign('id_meja')->references('id_meja')->on('meja');
            $table->unsignedInteger('id_menu');
            $table->foreign('id_menu')->references('id_menu')->on('menu');
            $table->date('tanggal');
            $table->unsignedInteger('nilai');
            $table->text('komentar');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('review_makanan');
    }
}
