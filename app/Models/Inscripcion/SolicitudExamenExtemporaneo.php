<?php

namespace App\Models\Inscripcion;

use App\Models\Catalogo\Calendario\EtapaCalendarioExtemporaneo;
use App\Models\Catalogo\Oficina\SedeAplicacion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SolicitudExamenExtemporaneo extends Model
{
    use SoftDeletes;

    const SIN_GUIA = 1, CON_GUIA = 2;

    protected $fillable=['tipo','id_inscripcion','id_sede','id_banco','id_etapa','folio'];

    protected $dates=['deleted_at'];

    public static function getTipo()
    {
        return [
            SolicitudExamenExtemporaneo::SIN_GUIA => 'Sin Guía',
            SolicitudExamenExtemporaneo::CON_GUIA => 'Con Guía',
        ];

    }

    public static function getTipoById(int $id)
    {
        $tipos=self::getTipo();
        return $tipos[$id]?? 'No existe ese tipo de examen';
    }


    public function sede()
    {
        return $this->hasOne(SedeAplicacion::class,'id','id_sede');
    }

    public function inscripcion()
    {
        return $this->hasOne(Inscripcion::class,'id','id_inscripcion');
    }

    public function etapa()
    {
        return $this->hasOne(EtapaCalendarioExtemporaneo::class,'id','id_etapa');
    }
}
