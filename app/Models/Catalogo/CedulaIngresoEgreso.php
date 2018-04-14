<?php

namespace App\Models\Catalogo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CedulaIngresoEgreso extends Model
{
	const TIPO_SECUNDARIA = 1, TIPO_ASIGNATURAS_SECUNDARIA = 2, TIPO_SOSTEN_ECONOMICO = 3, TIPO_MOTIVO_INGRESO = 4,
		TIPO_ESCOLARIDADES = 5, TIPO_OCUPACIONES = 6, TIPO_EDUCACION_SUPERIOR = 7, TIPO_ATENCION_MEDICA = 8,
		TIPO_MOTIVOS_INTERRUPCION = 9, TIPO_GRUPOS_CARRERAS = 10, TIPO_FAMILIARES = 11;

	use SoftDeletes;

	protected $fillable = ["clave", "descripcion", "tipo"];

	protected $dates = ["deleted_at"];

	public static function getTipos()
	{
		return [
			self::TIPO_SECUNDARIA => "Tipos de Secundaria",
			self::TIPO_ASIGNATURAS_SECUNDARIA => "Asignaturas de Secundaria",
			self::TIPO_SOSTEN_ECONOMICO => "Sostén Económico",
			self::TIPO_MOTIVO_INGRESO => "Motivos de Ingreso",
			self::TIPO_ESCOLARIDADES => "Escolaridades",
			self::TIPO_OCUPACIONES => "Ocupaciones",
			self::TIPO_EDUCACION_SUPERIOR => "Educación Superior",
			self::TIPO_ATENCION_MEDICA => "Atención Médica",
			self::TIPO_MOTIVOS_INTERRUPCION => "Motivos de Interrupción",
			self::TIPO_GRUPOS_CARRERAS => "Grupos de Carreras",
			self::TIPO_FAMILIARES => "Familiares",
		];
	}

	public static function getTipoNameById(int $id)
	{
		$tipos = self::getTipos();
		return $tipos[$id] ?? 'No existe el tipo.';
	}

	public static function getRoutesArray()
	{
		return [
			CedulaIngresoEgreso::TIPO_SECUNDARIA => "/catalogo/tipo-secundaria",
			CedulaIngresoEgreso::TIPO_ASIGNATURAS_SECUNDARIA => "/catalogo/asignatura-secundaria",
			CedulaIngresoEgreso::TIPO_SOSTEN_ECONOMICO => "/catalogo/sosten-economico",
			CedulaIngresoEgreso::TIPO_MOTIVO_INGRESO => "/catalogo/motivo-ingreso",
			CedulaIngresoEgreso::TIPO_ESCOLARIDADES => "/catalogo/escolaridad",
			CedulaIngresoEgreso::TIPO_OCUPACIONES => "/catalogo/ocupacion",
			CedulaIngresoEgreso::TIPO_EDUCACION_SUPERIOR => "/catalogo/educacion-superior",
			CedulaIngresoEgreso::TIPO_ATENCION_MEDICA => "/catalogo/atencion-medica",
			CedulaIngresoEgreso::TIPO_MOTIVOS_INTERRUPCION => "/catalogo/motivo-interrupcion",
			CedulaIngresoEgreso::TIPO_GRUPOS_CARRERAS => "/catalogo/grupo-carrera",
			CedulaIngresoEgreso::TIPO_FAMILIARES => "/catalogo/familiar",
		];
	}
}
