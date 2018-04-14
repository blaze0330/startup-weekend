<?php

namespace App\Models\Catalogo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EncabezadoReportes extends Model
{
    use SoftDeletes;

    protected $fillable=['imagen','clave','linea_1','linea_2','linea_3'];

    protected $dates=['deleted_at'];
}
