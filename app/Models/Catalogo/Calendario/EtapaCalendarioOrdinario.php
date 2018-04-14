<?php

namespace App\Models\Catalogo\Calendario;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EtapaCalendarioOrdinario extends Model
{
    use SoftDeletes;

    protected $fillable=['etapa','fase','fecha_certificacion','periodo_solicitud_inicio','periodo_solicitud_final','periodo_presentacion_inicio','periodo_presentacion_final','comentario'];

    protected $dates=['deleted_at'];

    public function calendarios()
    {
        return $this->hasMany(CalendarioExamen::class,'id_etapa','id');
    }

    public function scopeEtapa($query,$etapa){

        if($etapa != ""){
            $query->where('etapa',$etapa);
        }
    }

    public function scopeFase($query,$fase){

        if($fase != ""){
            $query->where('fase',$fase);
        }
    }

    public function scopePeriodoSolicitudInicio($query,$periodoInicio){

        if($periodoInicio != ""){
            $query->where('periodo_solicitud_inicio',$periodoInicio);
        }
    }

    public function scopePeriodoSolicitudFinal($query,$periodoFinal){

        if($periodoFinal != ""){
            $query->where('periodo_solicitud_final',$periodoFinal);
        }
    }

    public function scopePeriodoPresentacionInicio($query,$periodoInicio){

        if($periodoInicio != ""){
            $query->where('periodo_presentacion_inicio',$periodoInicio);
        }
    }

    public function scopePeriodoPresentacionFinal($query,$periodoFinal){

        if($periodoFinal != ""){
            $query->where('periodo_presentacion_final',$periodoFinal);
        }
    }

    public function scopeFechaCertificacion($query,$fecha){
        $query->where('fecha_certificacion',$fecha);
    }




}
