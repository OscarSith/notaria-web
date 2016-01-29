<?php

use Illuminate\Database\Seeder;

class UbigeoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('ubigeo')->insert([
        	'codigo' => '01',
        	'master' => '1000',
        	'parent_id' => '0100',
        	'nombre' => 'Lima'
        ]);
    }
}
