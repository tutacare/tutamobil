<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeatureKeamananKelengkapanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feature_keamanan_kelengkapan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('spesifikasi_mobil_baru_id')->unsigned();
            $table->foreign('spesifikasi_mobil_baru_id')->references('id')->on('spesifikasi_mobil_baru')->onDelete('cascade');
            $table->string('keamanan_kelengkapan');
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
        Schema::drop('feature_keamanan_kelengkapan');
    }
}
