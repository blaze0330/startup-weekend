<?php

namespace App\Models\Admin;

use App\Models\Catalogo\Calendario\EtapaCalendarioOrdinario;
use App\Models\Catalogo\Oficina\SedeAplicacion;
use Illuminate\Database\Eloquent\Model;

class Roc extends Model
{
    protected $fillable=["roc","id_sede","etapa","fecha_asignada"];

    protected $dates=["deleted_at"];


    public function etapa()
    {
        return $this->hasOne(EtapaCalendarioOrdinario::class,'id','id_etapa');
    }

}
