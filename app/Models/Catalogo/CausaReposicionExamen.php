<?php

namespace App\Models\Catalogo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CausaReposicionExamen extends Model
{
    use softDeletes;

    protected $fillable=['clave','descripcion'];

    protected $dates=['deleted_at'];
}
