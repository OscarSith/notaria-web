<?php

use Illuminate\Database\Seeder;
use App\Entities\Cargo;

class CargoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cargo::create([
        	'car_nombre' => 'Administrador',
        	'car_dias' => '0'
        ]);
    }
}
