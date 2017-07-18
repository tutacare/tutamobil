<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepositTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposit', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->decimal('deposit', 15, 2)->default(0);
            $table->string('from_bank');
            $table->string('no_rekening');
            $table->string('atas_nama');
            $table->integer('status')->default(0); //0 = 'Belum Dibayar' // 1 = 'Konfirmasi' // 2 = 'Sudah Dibayar'
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
        Schema::drop('deposit');
    }
}
