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
        $this->call(CargoTableSeeder::class);
        $this->call(UbigeoTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(MasterOfTableTableSeeder::class);
    }
}
