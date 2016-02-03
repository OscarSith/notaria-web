<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = "persona";

	public function scopeActives($query, $status = 1)
	{
		return $query->where('per_estado', $status);
	}

	// public function scopePaginator($query, $limit = 50)
	// {
	// 	return $query->where('')->latest()->paginator($limit, [
	// 		'per_nombre1',
	// 		'per_nombre2',
	// 		'per_ape_paterno',
	// 		'per_ape_materno',
	// 		'per_dcmto_numero',
	// 		'per_sexo'
	// 	]);
	// }

    public function getFullNameAttribute()
    {
    	return $this->attributes['per_nombre1'] . ' ' . $this->attributes['per_nombre2'];
    }

    public function getFullLastnameAttribute()
    {
    	return $this->attributes['per_ape_paterno'] . ' ' . $this->attributes['per_ape_materno'];
    }
}
