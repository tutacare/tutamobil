<?php

use Illuminate\Database\Seeder;

class HargaSlot extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('harga_slot')->insert([
          array('harga_slot' => '100000')
       ]);
    }
}
