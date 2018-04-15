<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
	protected $fillable = ['name', 'description', 'keywords', 'image'];

	protected $dates = ['deleted_at'];

	public function productos()
	{
		return $this->hasMany(PaqueteProducto::class, 'id_paquete', 'id');
	}
}
