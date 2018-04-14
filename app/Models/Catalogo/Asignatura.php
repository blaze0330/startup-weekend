<?php

namespace App\Models\Catalogo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asignatura extends Model
{
	const NONE = 0, CIENCIAS_ADMINISTRATIVAS_SOCIALES = 1, CIENCIAS_FISICO_MATEMATICAS = 2, HUMANIDADES = 3, NUPLES = 4,
		TRONCO_COMUN = 5;

	use SoftDeletes;

	protected $fillable = ["clave", "nombre", "semestre", "area_1", "area_2", "area_3", "fase", "imprimir_certificado"];
	protected $dates = ["deleted_at"];

	public function area()
    {
        return $this->hasOne(Area::class,'id','id_area');
    }

    public function Rsemestre()
    {
        return $this->hasOne(Semestre::class,'id','semestre');
    }
}
