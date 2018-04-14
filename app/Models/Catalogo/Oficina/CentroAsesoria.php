<?php

namespace App\Models\Catalogo\Oficina;

use App\Models\Catalogo\Entidad;
use App\Models\Catalogo\Municipio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CentroAsesoria extends Model
{
	use SoftDeletes;

	const TIPO_PUBLICO = 1, TIPO_PARTICULAR = 2, TIPO_SOCIAL = 3, TIPO_OTRO = 4;

	protected $fillable = ["id_entidad", "id_municipio", "id_oficina", "tipo", "clave", "nombre", "direccion",
		"colonia", "telefono", "codigo_postal", "giro", "gestor", "responsable", "tipo_otro"];

	protected $dates = ["deleted_at"];

	public static function getTipos()
	{
		return [
			self::TIPO_PUBLICO => "Público",
			self::TIPO_PARTICULAR => "Particular",
			self::TIPO_SOCIAL => "Social",
			self::TIPO_OTRO => "Otro"
		];
	}

	public static function getTipoNameById(int $id)
	{
		$tipos = self::getTipos();
		return $tipos[$id] ?? 'No existe este tipo';
	}

	public function entidad()
	{
		return $this->hasOne(Entidad::class, 'id', 'id_entidad');
	}

	public function municipio()
	{
		return $this->hasOne(Municipio::class, 'id', 'id_municipio');
	}

	public function oficina()
	{
		return $this->hasOne(Oficina::class, 'id', 'id_oficina');
	}
}
