<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Persona;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$User = User::create(['name' => 'admin', 'lastname' => 'Larriega', 'email' => 'admin@gmail.com', 'numero_documento' => '44000355', 'password' => bcrypt('123456'), 'cargo_id' => 1]);
    	Persona::create([
    		'per_tipo' => '0100',
    		'per_nacion' => '0200',
    		'per_dcmto_tipo' => '0300',
    		'per_sexo' => '0400',
    		'per_dcmto_numero' => '67263748',
    		'per_ruc' => '21526152454',
    		'per_ape_paterno' => 'Larriega',
			'per_ape_materno' => 'Grandez',
			'per_nombre1' => 'Oscar',
			'per_nombre2' => 'Augusto',
			'per_fe_naci' => '1986-12-26',
			'per_razon_social' => '',
			'per_direccion' => 'Av kani jsbabdhasd',
			'per_direc_referencia' => 'Alt cdra 12 brasil',
			'per_alfabetico' => 'larriega grandes oscar augusto 67263748',
			'per_crea_user' => $User->getKey(),
			'per_act_user' => '',
			'per_ubg_id' => 1,
			'per_estado' => 1,
    	]);
    }
}
