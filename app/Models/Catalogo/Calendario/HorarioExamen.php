<?php

namespace App\Models\Catalogo\Calendario;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HorarioExamen extends Model
{
    use SoftDeletes;

    const ORDINARIO=1,EXTEMPORANEO=2,EXAMENES_EN_LINEA=3,ADIESTRAMIENTO=4;

    protected $fillable=['clave','hora','tipo'];
    
    protected $dates=['deleted_at'];

    public static function getTipos()
    {
        return [
            HorarioExamen::ORDINARIO => "Ordinario",
            HorarioExamen::EXTEMPORANEO => "Extemporáneo",
            HorarioExamen::EXAMENES_EN_LINEA => "Exámenes en Línea",
            HorarioExamen::ADIESTRAMIENTO => "Adiestramiento",
        ];
    }

    public static function getTipoNameById(int $id)
    {
        $tipos = self::getTipos();
        return $tipos[$id] ?? 'No existe este tipo de exámen';
    }
}
