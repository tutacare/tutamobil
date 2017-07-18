<?php

use Illuminate\Database\Seeder;

class MerekTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('merek')->insert([
          array('merek' => 'Honda'),
          array('merek' => 'Daihatsu'),
          array('merek' => 'Mercedes'),
          array('merek' => 'Ford'),
          array('merek' => 'Chevrolet'),
          array('merek' => 'KIA'),
          array('merek' => 'Mazda'),
          array('merek' => 'Mitsubishi'),
          array('merek' => 'Nissan'),
          array('merek' => 'Suzuki'),
          array('merek' => 'Toyota'),
       ]);
    }
}
