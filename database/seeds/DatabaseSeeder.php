<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(UcioniceTableSeeder::class);
         $this->call(TipoviNastaveTableSeeder::class);
         $this->call(RazineNastaveTableSeeder::class);
    }
}
