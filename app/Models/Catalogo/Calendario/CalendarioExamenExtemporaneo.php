<?php

namespace App\Models\Catalogo\Calendario;

use App\Models\Catalogo\Asignatura;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CalendarioExamenExtemporaneo extends Model
{
    use SoftDeletes;

    protected $fillable=['id_etapa_extemporaneo','id_asignatura','dia_aplicacion','hora_aplicacion'];

    protected $dates=['deleted_at'];

    protected function etapa()
    {
        return $this->hasOne(EtapaCalendarioExtemporaneo::class,'id','id_etapa_extemporaneo');
    }

    protected function asignatura()
    {
        return $this->hasOne(Asignatura::class,'id','id_asignatura');
    }
}
