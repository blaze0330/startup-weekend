<?php

namespace App\Models\Inscripcion;

use App\Models\Catalogo\Documento;
use Illuminate\Database\Eloquent\Model;

class InscripcionDocumento extends Model
{
	protected $fillable = ["id_inscripcion", "tipo", "documento"];

	public function tipoDocumento()
	{
		return $this->hasOne(Documento::class, "id", "tipo");
	}

	public function inscripcion()
	{
		return $this->hasOne(Inscripcion::class, "id", "id_inscripcion");
	}
}
