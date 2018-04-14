<?php

namespace App\Models\Preinscripcion;

use App\Models\Catalogo\Oficina\Oficina;
use App\Models\Catalogo\Oficina\SedePlaticaInfomativa;
use App\Models\Catalogo\Personal\ApoyoAplicacion;
use App\Models\Catalogo\Personal\TipoColaborador;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlaticaInformativa extends Model
{
	use SoftDeletes;

	const ADULTOS = 1, MENORES = 2, ADULTOSYMENORES = 3;

	protected $fillable = ['id_oficina', 'id_sede', 'anio', 'tipo', 'capacidad', 'dia', 'hora', 'grupo', 'disponibilidad', 'id_conductor'];


	public static function getTipo()
	{
		return [

			PlaticaInformativa::ADULTOS => 'Adultos',
			PlaticaInformativa::MENORES => 'Menores',
			PlaticaInformativa::ADULTOSYMENORES => 'Adultos/Menores',
		];

	}

	public static function getTipoNameById(int $id)
	{
		$tipos = self::getTipo();
		return $tipos[$id] ?? 'No existe ese tipo';
	}


	public function sede()
	{
		return $this->hasOne(SedePlaticaInfomativa::class, 'id', 'id_sede');
	}

	public function oficina()
	{
		return $this->hasOne(Oficina::class, 'id', 'id_oficina');
	}

	public function conductor()
	{
		return $this->hasOne(ApoyoAplicacion::class, 'id', 'id_conductor');
	}

	public function preinscripcion()
	{
		return $this->hasMany(Preinscripcion::class, 'id_grupo', 'id');
	}


}
