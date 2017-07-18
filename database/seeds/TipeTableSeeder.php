<?php

use Illuminate\Database\Seeder;

class TipeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('tipe')->insert([
          array('tipe' => 'VTi 2.4L A/T'),
          array('tipe' => 'VTiL 2.4L M/T'),
          array('tipe' => 'TIPE D MT'),
          array('tipe' => 'TIPE M MT/AT'),
          array('tipe' => 'TIPE M SPORTY MT/AT'),
          array('tipe' => 'TIPE X AIRBAG MT/AT'),
          array('tipe' => 'TIPE X ELEGANT MT/AT'),
          array('tipe' => 'TIPE X MT/AT'),
       ]);
    }
}
