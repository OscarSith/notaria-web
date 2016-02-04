<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Ubigeo extends Model
{
    protected $table = 'ubigeo';

    public function scopeGetByParentId($query, $parent_id)
    {
    	return $query->where('parent_id', $parent_id)->get(['master', 'nombre']);
    }
}
