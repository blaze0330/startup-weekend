<?php

namespace App\Models\Catalogo\Calendario;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EtapaCalendarioExtemporaneo extends Model
{
    use SoftDeletes;

    protected $fillable=['etapa','fase','periodo_solicitud_inicio','periodo_solicitud_final','dia_presentacion_1','dia_presentacion_2','dia_presentacion_3','comentario'];

    protected $dates=['deleted_at'];

    public function calendarios()
    {
        return $this->hasMany(CalendarioExamen::class,'id_etapa','id');
    }

    public function scopeEtapa($query, $etapa)
    {
        if ($etapa != "") {
            $query->where('etapa', $etapa);
        }
    }

    public function scopeFase($query, $fase)
    {
        if ($fase != "") {
            $query->where('fase', $fase);
        }
    }

    public function scopePeriodoInicio($query, $periodoInicio)
    {
        if ($periodoInicio != "") {
            $query->where('periodo_solicitud_inicio', $periodoInicio);
        }
    }

    public function scopePeriodoFinal($query, $periodoFinal)
    {
        if ($periodoFinal != "") {
            $query->where('periodo_solicitud_final', $periodoFinal);
        }
    }

    public function scopeDiaPresentacion($query, $diaPresentacion)
    {
        if ($diaPresentacion != "") {
            $query->where('dia_presentacion_1', $diaPresentacion)
            ->orWhere('dia_presentacion_2',$diaPresentacion)
            ->orWhere('dia_presentacion_3',$diaPresentacion);
        }
    }


}
