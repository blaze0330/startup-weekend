<?php

namespace App\Models\Inscripcion;

use App\Models\Catalogo\Calendario\EtapaCalendarioOrdinario;
use App\Models\Catalogo\Oficina\SedeAplicacion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class SolicitudExamen extends Model
{
    use SoftDeletes;

    const ORDINARIO = 1, EXTEMPORANEO = 2, EN_LINEA = 3;

    protected $fillable = ['tipo', 'id_inscripcion', 'id_sede', 'id_banco', 'id_etapa'];

    protected $dates = ['deleted_at'];

    public static function getTipo()
    {
        return [
            SolicitudExamen::ORDINARIO => 'Ordinario',
            SolicitudExamen::EXTEMPORANEO => 'Extemporaneo',
            SolicitudExamen::EN_LINEA=>'En Línea',
        ];

    }

    public static function getTipoById(int $id)
    {
        $tipos = self::getTipo();
        return $tipos[$id] ?? 'No existe ese tipo de examen';
    }


    public function sede()
    {
        return $this->hasOne(SedeAplicacion::class, 'id', 'id_sede');
    }

    public function inscripcion()
    {
        return $this->hasOne(Inscripcion::class, 'id', 'id_inscripcion');
    }

    public function etapa()
    {
        return $this->hasOne(EtapaCalendarioOrdinario::class, 'id', 'id_etapa');
    }

}
