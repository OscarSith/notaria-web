<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
	protected $table = "persona";

	protected $fillable = [
		'per_tipo',
		'per_nacion',
		'per_dcmto_tipo',
		'per_sexo',
		'per_dcmto_numero',
		'per_ruc',
		'per_ape_paterno',
		'per_ape_materno',
		'per_nombre1',
		'per_nombre2',
		'per_fe_naci',
		'per_razon_social',
		'per_direccion',
		'per_direc_referencia',
		'per_alfabetico',
		'per_crea_user',
		'per_act_user',
		'per_ubg_id'
	];

	public function scopeActives($query, $status = 1)
	{
		return $query->where('per_estado', $status);
	}

    public function getFullNameAttribute()
    {
    	return $this->attributes['per_nombre1'] . ' ' . $this->attributes['per_nombre2'];
    }

    public function getFullLastnameAttribute()
    {
    	return $this->attributes['per_ape_paterno'] . ' ' . $this->attributes['per_ape_materno'];
    }
}
