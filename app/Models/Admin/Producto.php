<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
	use SoftDeletes;

	protected $fillable = ['name', 'price', 'id_category', 'description', 'image'];
	protected $dates = ['deleted_at'];

	public function categoria()
	{
		return $this->hasOne(Categoria::class, 'id', 'id_category');
	}
}
