<?php

namespace App\Models\Catalogo\Oficina;

use App\Models\Catalogo\Oficina\Oficina;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CentroAplicacion extends Model
{
	use SoftDeletes;

	protected $fillable = ["id_oficina", "clave", "nombre"];

	protected $dates = ["deleted_at"];

	public function oficina()
	{
		return $this->hasOne(Oficina::class, 'id', 'id_oficina');
	}
}
