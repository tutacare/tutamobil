<?php

use Illuminate\Database\Seeder;

class SocialMediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('sosial_media')->insert([
          'facebook' => 'https://facebook.com',
          'twitter' => 'https://twitter.com',
          'google' => 'https://plus.google.com',
          'linkedin' => 'https://linkedin.com',
          'youtube' => 'https://youtube.com'
      ]);
    }
}
