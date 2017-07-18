<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
          'name' => 'Admin Otomotif',
          'email' => 'admin@my.tuta',
          'username' => 'adminotomotif',
          'phone' => '082155000851',
          'password' => bcrypt('admin'),
          'role' => 'admin',
          'confirmed' => 1,
      ]);
    }
}
