<?php

namespace App\Models\Catalogo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Motivo extends Model
{
	use SoftDeletes;

	const TIPO_CANCELACION_CERTIFICADOS = 1, TIPO_EXTEMPORANEOS = 2, TIPO_BAJA_CALIFICACIONES = 3;

	protected $fillable = ['descripcion', 'tipo'];

	protected $dates = ['deleted_at'];

	public static function getTipos()
	{
		return [
			self::TIPO_CANCELACION_CERTIFICADOS => "Cancelación de Certificados",
			self::TIPO_EXTEMPORANEOS => "Extemporáneos",
			self::TIPO_BAJA_CALIFICACIONES => "Baja de Calificaciones"
		];
	}

	public static function getTipoNameById(int $id)
	{
		$tipos = self::getTipos();
		return $tipos[$id] ?? 'No existe este tipo.';
	}
}
