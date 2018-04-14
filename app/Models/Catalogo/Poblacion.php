<?php

namespace App\Models\Catalogo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Poblacion extends Model
{
	use SoftDeletes;

	protected $fillable = ["id_entidad", "clave", "descripcion"];

	protected $dates = ["deleted_at"];
}
