<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class PaqueteProducto extends Model
{
	protected $fillable = ['id_paquete', 'id_producto'];

	public function producto()
	{
		return $this->hasOne(Producto::class, 'id', 'id_producto');
	}

	public function paquete()
	{
		return $this->hasOne(Paquete::class, 'id', 'id_paquete');
	}
}
