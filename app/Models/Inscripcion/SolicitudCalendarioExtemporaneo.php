<?php

namespace App\Models\Inscripcion;

use App\Models\Catalogo\Calendario\CalendarioExamenExtemporaneo;
use Illuminate\Database\Eloquent\Model;

class SolicitudCalendarioExtemporaneo extends Model
{
    protected $fillable=['id_solicitud','id_calendario'];

    protected $dates=['deleted_at'];

    public function calendario()
    {
        return $this->hasOne(CalendarioExamenExtemporaneo::class,'id','id_calendario');
    }
}
