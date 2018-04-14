<?php

namespace App\Models\Catalogo;

use App\Models\Estado;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DireccionEmisora extends Model
{
	use SoftDeletes;

	protected $fillable = ["clave", "descripcion", "id_entidad", "clave_centro", "descripcion_centro",
		"complemento_centro"];

	protected $dates = ["deleted_at"];

	public function entidad()
	{
		return $this->hasOne(Entidad::class, 'id', 'id_entidad');
	}
}
