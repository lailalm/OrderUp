<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemesananTable extends Migration
{
    public function up(): void
    {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->increments('id_pemesanan');
            $table->unsignedInteger('id_meja');
            $table->foreign('id_meja')->references('id_meja')->on('meja');
            $table->unsignedInteger('id_menu');
            $table->foreign('id_menu')->references('id_menu')->on('menu');
            $table->integer('jumlah');
            $table->timestamp('waktu')->useCurrent();
            $table->enum('status', ['Queued', 'On Process', 'Done', 'Paid'])->default('Queued');
            $table->text('keterangan')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pemesanan');
    }
}
