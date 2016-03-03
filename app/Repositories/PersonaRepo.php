<?php
namespace App\Repositories;

use App\Entities\Persona;

class PersonaRepo extends Persona
{
	public function getAll($limit = 50)
	{
		return Persona::actives()->latest()->paginate($limit, [
			'id',
			'per_tipo',
			'per_nacion',
			'per_dcmto_tipo',
			'per_nombre1',
			'per_nombre2',
			'per_ape_paterno',
			'per_ape_materno',
			'per_dcmto_numero',
			'per_sexo',
			'per_razon_social',
			'per_ruc'
		]);
	}

	public function add($values, $user_id)
	{
		$persona = new Persona();
		$persona->per_alfabetico = $this->setAlfabetico($values);
		$persona->per_crea_user = $user_id;
		$persona->fill($values);

		return $persona->save();
	}

	public function getById($id)
	{
		return Persona::find($id);
	}

	public function edit($values, $id)
	{
		$persona = $this->getById($id);
		$persona->fill($values);
		$persona->per_alfabetico = $this->setAlfabetico($values);
		$persona->per_act_user = $id;
		return $persona->save();
	}

	private function setAlfabetico($values)
	{
		$alfabetico = '';
		if ($values['per_tipo'] == '0001') {
			$alfabetico = $values['per_nombre1'] . ' ' . $values['per_nombre2'] . ' ' . $values['per_ape_paterno'] . ' ' . $values['per_ape_materno'] . ' ' . $values['per_dcmto_numero'];
		} else {
			$alfabetico = $values['per_razon_social'] . ' ' . $values['per_ruc'];
		}

		return $alfabetico;
	}

	public function search($tipop, $tipod, $query)
	{
		return Persona::where('per_tipo', $tipop)->where('per_dcmto_tipo', $tipod)->where('per_alfabetico', 'like', '%' . $query . '%')->take(10)->get(['id AS data', 'per_alfabetico AS value', 'per_ape_paterno', 'per_ape_materno', 'per_nombre1']);
	}
}