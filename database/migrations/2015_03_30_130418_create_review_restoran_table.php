<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewRestoranTable extends Migration
{
    public function up(): void
    {
        Schema::create('review_restoran', function (Blueprint $table) {
            $table->increments('id_review');
            $table->unsignedInteger('id_meja');
            $table->foreign('id_meja')->references('id_meja')->on('meja');
            $table->date('tanggal');
            $table->string('nama')->nullable();
            $table->text('review');
            $table->unsignedInteger('nilai');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('review_restoran');
    }
}
