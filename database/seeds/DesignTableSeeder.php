<?php

use Illuminate\Database\Seeder;

class DesignTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('design')->insert([
          array('design' => 'All New Accord'),
          array('design' => 'All New CR-V'),
          array('design' => 'All New Odyssey'),
          array('design' => 'All New Jazz'),
          array('design' => 'Brio'),
          array('design' => 'KIA'),
          array('design' => 'CR-Z'),
          array('design' => 'HR-V'),
          array('design' => 'Mobilio'),
          array('design' => 'New Freed'),
          array('design' => 'Ayla'),
       ]);
    }
}
