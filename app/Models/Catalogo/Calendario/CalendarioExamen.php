<?php

namespace App\Models\Catalogo\Calendario;

use App\Models\Catalogo\Asignatura;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CalendarioExamen extends Model
{
    use SoftDeletes;

    const ORDINARIO=1, EXTEMPORANEO=2;

    protected $fillable =['id_etapa','id_asignatura','dia_aplicacion','hora_aplicacion', 'tipo'];

    protected $dates=['deleted_at'];


    public static function getTipo()
    {
        return[
            CalendarioExamen::ORDINARIO =>"Ordinario",
            CalendarioExamen::EXTEMPORANEO =>"Extemporaneo",
        ];
    }

    public static function getTipoById(int $id)
    {
        $tipos=self::getTipo();;

        return $tipos[$id] ?? 'No existe ese tipo de calendario';
    }

    protected function etapa()
    {
        return $this->hasOne(EtapaCalendarioOrdinario::class,'id','id_etapa');
    }

    protected function etapaExt()
    {
        return $this->hasOne(EtapaCalendarioExtemporaneo::class,'id','id_etapa');
    }

    public function calendarios()
    {
        return $this->hasMany(CalendarioExamen::class,'id_etapa_ordinario','id');
    }

    protected function asignatura()
    {
        return $this->hasOne(Asignatura::class,'id','id_asignatura');
    }

    public function scopeTipo($query, $tipo)
    {
        if ($tipo != "") {
            $query->where('tipo', $tipo);
        }
    }

    public function scopeEtapa($query, $etapa)
    {
        if ($etapa != "") {
            $query->where('id_etapa', $etapa);
        }
    }

    public function scopeAsignatura($query, $asignatura)
    {
        if ($asignatura != "") {
            $query->where('id_asignatura', $asignatura);
        }
    }

    public function scopeDiaAplicacion($query, $diaAplicacion)
    {
        if ($diaAplicacion != "") {
            $query->where('dia_aplicacion', $diaAplicacion);
        }
    }

    public function scopeHoraAplicacion($query, $horaAplicacion)
    {
        if ($horaAplicacion != "") {
            $query->where('hora_aplicacion', $horaAplicacion);
        }
    }
}
