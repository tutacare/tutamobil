<?php

use Illuminate\Database\Seeder;

class BanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('banks')->delete();
      DB::table('banks')->insert(array(
          // FRESH SERVER
          array('name' => 'BCA'), //1
          array('name' => 'Mandiri'),
          array('name' => 'BNI'),
          array('name' => 'BRI'),
          array('name' => 'Permata'),
          array('name' => 'Muamalat'),
          array('name' => 'Bank Kaltim'),
          ));
    }
}
