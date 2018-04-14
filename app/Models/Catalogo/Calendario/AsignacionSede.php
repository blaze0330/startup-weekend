<?php

namespace App\Models\Catalogo\Calendario;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AsignacionSede extends Model
{
    use SoftDeletes;

    protected $fillable=['id_etapa_ordinario','id_sede'];

    protected $dates=['deleted_at'];
}
