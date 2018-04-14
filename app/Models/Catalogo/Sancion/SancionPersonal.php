<?php

namespace App\Models\Catalogo\Sancion;

use App\Models\Catalogo\Personal\TipoColaborador;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SancionPersonal extends Model
{
    use SoftDeletes;

    const SUSPENSION = 1, BAJA_TEMPORAL = 2, BAJA_DEFINITIVA = 3;

    protected $fillable = ['clave', 'descripcion', 'id_tipo_colaborador', 'primera_incidencia', 'primera_incidencia_plazo', 'segunda_incidencia', 'segunda_incidencia_plazo', 'tercera_incidencia'];

    protected $dates = ['deleted_at'];

    public static function getTipos()
    {
        return [
            SancionPersonal::SUSPENSION => "Suspensión",
            SancionPersonal::BAJA_TEMPORAL => "Baja Temporal",
            SancionPersonal::BAJA_DEFINITIVA => "Baja Definitiva",
        ];
    }

    public static function getTipoNameById(int $id)
    {
        $tipos = self::getTipos();
        return $tipos[$id] ?? 'No existe este tipo de sancion';
    }

    public function colaborador()
    {
        return $this->hasOne(TipoColaborador::class,'id','id_tipo_colaborador');
    }
}
