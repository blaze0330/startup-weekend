<?php

namespace App\Models\Admin;

use App\Models\Catalogo\Calendario\EtapaCalendarioExtemporaneo;
use Illuminate\Database\Eloquent\Model;

class RocExtemporaneo extends Model
{
    protected $fillable=['roc','id_sede','id_etapa','fecha_asignada'];

    protected $dates=['deleted_at'];

    public function etapa()
    {
        return $this->hasOne(EtapaCalendarioExtemporaneo::class,'id','id_etapa');
    }
}
