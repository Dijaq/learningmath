<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Multiplicacion;

class SeccionEjercicios extends Model
{
    public $table = 'seccion_ejercicios';

    public function multiplicaciones()
	{
		return $this->hasMany(Multiplicacion::class, 'seccionejercicios_id');
	}
}
