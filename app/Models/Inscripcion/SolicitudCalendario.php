<?php

namespace App\Models\Inscripcion;

use App\Models\Catalogo\Calendario\CalendarioExamen;
use Illuminate\Database\Eloquent\Model;

class SolicitudCalendario extends Model
{
    protected $fillable=['id_solicitud','id_calendario'];

    public function calendario()
    {
        return $this->hasOne(CalendarioExamen::class,'id','id_calendario');
    }

}
