<?php

namespace App\Models\Catalogo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Documento extends Model
{
	use SoftDeletes;

	const TIPO_OBLIGATORIO = 1, TIPO_CIRCUNSTANCIA = 2, TIPO_OPCIONAL = 3;

	protected $fillable = ["clave", "descripcion", "tipo"];

	protected $dates = ["deleted_at"];

	public function subdocumentos()
	{
		return $this->hasMany(Subdocumento::class, 'id_documento', 'id');
	}

	public static function getTipos()
	{
		return [
			Subdocumento::TIPO_OBLIGATORIO => "Obligatorio",
			Subdocumento::TIPO_CIRCUNSTANCIA => "Circunstancial",
			Subdocumento::TIPO_OPCIONAL => "Opcional",
		];
	}

	public static function getTipoNameById(int $id)
	{
		$tipos = self::getTipos();
		return $tipos[$id] ?? 'No existe este tipo';
	}
}
