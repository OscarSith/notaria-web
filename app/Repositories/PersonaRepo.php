<?php
namespace App\Repositories;

use App\Entities\Persona;

class PersonaRepo extends Persona
{
	public function getAll($limit = 50)
	{
		return Persona::actives()->latest()->paginate($limit, [
			'id',
			'per_nombre1',
			'per_nombre2',
			'per_ape_paterno',
			'per_ape_materno',
			'per_dcmto_numero',
			'per_sexo'
		]);
	}

	public function add($values)
	{
		$persona = new Persona();
		$persona->fill($values);

		return $persona->save();
	}
}