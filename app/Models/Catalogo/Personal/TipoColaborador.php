<?php

namespace App\Models\Catalogo\Personal;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoColaborador extends Model
{
	use SoftDeletes;

	protected $fillable = ["nombre"];

	protected $dates = ["deleted_at"];
}
