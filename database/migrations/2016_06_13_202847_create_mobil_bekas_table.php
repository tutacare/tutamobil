<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMobilBekasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobil_bekas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->integer('city_id')->unsigned();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('restrict');
            $table->integer('merek_id')->unsigned();
            $table->foreign('merek_id')->references('id')->on('merek')->onDelete('restrict');
            $table->integer('design_id')->unsigned();
            $table->foreign('design_id')->references('id')->on('design')->onDelete('restrict');
            $table->string('transmisi');
            $table->string('tahun');
            $table->string('title');
            $table->longText('description');
            $table->string('slug');
            $table->decimal('product_price', 15, 2)->default(0);
            $table->boolean('nego')->default(false);
            $table->dateTime('sundul_at');
            $table->string('foto1');
            $table->string('foto2')->nullable()->default(null);
            $table->string('foto3')->nullable()->default(null);
            $table->string('foto4')->nullable()->default(null);
            $table->string('foto5')->nullable()->default(null);
            $table->string('status')->default('mod');
            $table->integer('viewer')->default(0);
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
        Schema::drop('mobil_bekas');
    }
}
