<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpesifikasiMobilBaruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spesifikasi_mobil_baru', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('merek_id')->unsigned();
            $table->foreign('merek_id')->references('id')->on('merek')->onDelete('restrict');
            $table->integer('design_id')->unsigned();
            $table->foreign('design_id')->references('id')->on('design')->onDelete('restrict');
            $table->integer('tipe_id')->unsigned();
            $table->foreign('tipe_id')->references('id')->on('tipe')->onDelete('restrict');
            $table->string('slug')->unique()->nullable();
            $table->string('negara_pembuat');
            $table->string('foto')->default('no-foto.png');
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
        Schema::drop('spesifikasi_mobil_baru');
    }
}
