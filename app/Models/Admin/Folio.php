<?php

namespace App\Models\Admin;

use App\Models\Catalogo\Oficina\Oficina;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Folio extends Model
{
	use SoftDeletes;

	const TIPOS = [11 => "Autorización de Extemporáneos", 18 => "Autorización para Exámenes Ordinarios",
		5 => "Credenciales Extemporáneos", 6 => "Credenciales Extemporáneos Duplicados", 3 => "Credenciales Ordinarios",
		4 => "Credenciales Ordinarios Duplicados", 12 => "Inscripción a Extemporáneos", 2 => "Matriculas de Inscripción",
		1 => "Número de Preinscripción", 33 => "Nuples Autorización Aula Computarizada",
		31 => "Nuples Autorización de Extemporáneos", 38 => "Nuples Autorización para Exámenes Ordinarios",
		37 => "Nuples Calendaasdrio de Adiestramiento Aula", 25 => "Nuples Credenciales Extemporáneos",
		26 => "Nuples Credenciales Extemporáneos Duplicados", 23 => "Nuples Credenciales Ordinarios",
		24 => "Nuples Credenciales Ordinarios Duplicados", 32 => "Nuples Inscripción a Extemporáneos",
		22 => "Nuples Matrículas de Inscripción", 21 => "Nuples Número de Inscripción",
		39 => "Nuples Selpa Solicitud de Exámenes en Línea", 40 => "Nuples Selpa Solicitud Individual de Exámen",
		36 => "Nuples Solicitud de Adiestramiento Para El Aula", 34 => "Nuples Solicitud de Exámenes en Línea",
		29 => "Nuples Solicitud de Exámenes Extemporáneos", 27 => "Nuples Solicitud de Exámenes Ordinarios",
		35 => "Nuples Solicitud Individual de Exámenes En Linea", 30 => "Nuples Solicitud Individual de Exámenes Extemporáneos",
		28 => "Nuples Solicitud Individual de Exámenes Ordinarios", 19 => "Selpa Solicitud de Exámenes En Línea",
		9 => "Solicitud de Exámenes Extemporáneos", 7 => "Solicitud de Exámenes Ordinarios",
		10 => "Solicitud Individual de Exámenes Extemporáneos", 8 => "Solicitud Individual de Exámenes Ordinarios"
	];

	protected $fillable = ["id_oficina", "folio", "tipo"];

	protected $dates = ["deleted_at"];

	public function oficina()
	{
		return $this->hasOne(Oficina::class, 'id', 'id_oficina');
	}
}
