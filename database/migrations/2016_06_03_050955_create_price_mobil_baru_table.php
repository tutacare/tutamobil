<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriceMobilBaruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_mobil_baru', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('city_id')->unsigned();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('restrict');
            $table->integer('merek_id')->unsigned();
            $table->foreign('merek_id')->references('id')->on('merek')->onDelete('restrict');
            $table->integer('design_id')->unsigned();
            $table->foreign('design_id')->references('id')->on('design')->onDelete('restrict');
            $table->integer('tipe_id')->unsigned();
            $table->foreign('tipe_id')->references('id')->on('tipe')->onDelete('restrict');
            $table->decimal('harga', 15,2);
            $table->string('download_brosur')->nullable();
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
        Schema::drop('price_mobil_baru');
    }
}
