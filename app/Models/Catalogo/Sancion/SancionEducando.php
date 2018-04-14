<?php

namespace App\Models\Catalogo\Sancion;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SancionEducando extends Model
{
    use SoftDeletes;

    const BAJA_DEFINITIVA=1,CANCELACION_DE_EXAMEN=2,CANCELACION_Y_SUSPENSION=3,INACTIVO_TEMPORAL=4,SUSPENSION_DE_SERVICIOS=5;

    protected $fillable = ['clave', 'norma_referencia', 'descripcion', 'primera_incidencia', 'primera_incidencia_plazo', 'segunda_incidencia', 'segunda_incidencia_plazo', 'tercera_incidencia', 'tercera_incidencia_plazo', 'cuarta_incidencia', 'cuarta_incidencia_plazo','norma_suspension_1','norma_suspension_2', 'norma_baja', 'vigente','sanciones_vigentes'];

    protected $dates = ['deleted_at'];

    public static function getTipos()
    {
        return [
            SancionEducando::BAJA_DEFINITIVA => "Baja Definitiva",
            SancionEducando::CANCELACION_DE_EXAMEN => "Cancelación de Examen",
            SancionEducando::CANCELACION_Y_SUSPENSION => "Cancelación y Suspensión",
            SancionEducando::INACTIVO_TEMPORAL => "Inactivo Temporal",
            SancionEducando::SUSPENSION_DE_SERVICIOS => "Suspensión de Servicios",
        ];
    }

    public static function getTipoNameById(int $id)
    {
        $tipos = self::getTipos();
        return $tipos[$id] ?? 'No existe este tipo de sancion';
    }
}
