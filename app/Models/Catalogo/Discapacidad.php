<?php

namespace App\Models\Catalogo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discapacidad extends Model
{
    use SoftDeletes;

    protected $fillable=['clave','descripcion'];

    protected $dates=['deleted_at'];
}
