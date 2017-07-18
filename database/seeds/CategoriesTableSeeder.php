<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('categories')->insert([
          array('category' => 'Financial', 'slug' => 'financial'),
          array('category' => 'Trial Run', 'slug' => 'trial-run'),
          array('category' => 'New Launch', 'slug' => 'new-launch'),
          array('category' => 'Advice', 'slug' => 'advice')
       ]);
    }
}
