<?php

namespace App\Models\Catalogo\Calendario;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AsignacionSedeExtemporanea extends Model
{
    use SoftDeletes;

    protected $fillable=['id_etapa_extemporaneo','id_sede'];

    protected $dates=['deleted_at'];
}
