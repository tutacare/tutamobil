<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMesinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mesin', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('spesifikasi_mobil_baru_id')->unsigned();
            $table->foreign('spesifikasi_mobil_baru_id')->references('id')->on('spesifikasi_mobil_baru')->onDelete('cascade');
            $table->string('jenis_mesin');
            $table->string('kapasitas_silinder');
            $table->string('daya_maksimum');
            $table->string('torsi_maksimum');
            $table->string('perbandingan_kompresi');
            $table->string('sistem_pembakaran');
            $table->string('bahan_bakar');
            $table->string('kapasitas_bahan_bakar');
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
        Schema::drop('mesin');
    }
}
