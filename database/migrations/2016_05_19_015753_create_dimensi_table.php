<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDimensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dimensi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('spesifikasi_mobil_baru_id')->unsigned();
            $table->foreign('spesifikasi_mobil_baru_id')->references('id')->on('spesifikasi_mobil_baru')->onDelete('cascade');
            $table->string('panjang');
            $table->string('lebar');
            $table->string('tinggi');
            $table->string('jarak_sumbu_roda');
            $table->string('jarak_pijak_depan');
            $table->string('jarak_pijak_belakang');
            $table->string('jarak_terendah_ke_tanah');
            $table->string('radius_putar');
            $table->string('berat_kosong');
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
        Schema::drop('dimensi');
    }
}
