<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(MerekTableSeeder::class);
        $this->call(DesignTableSeeder::class);
        $this->call(TipeTableSeeder::class);
        $this->call(SocialMediaTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(HargaSlot::class);
    }
}
