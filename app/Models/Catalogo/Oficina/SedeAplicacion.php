<?php

namespace App\Models\Catalogo\Oficina;

use App\Models\Admin\Roc;
use App\Models\Admin\RocExtemporaneo;
use App\Models\Catalogo\Entidad;
use App\Models\Catalogo\Municipio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SedeAplicacion extends Model
{
    use softDeletes;

    const TIPO_OFICIAL = 1, TIPO_SOCIAL = 2, TIPO_OTRO = 3;

    const PROPIA = 1, OFICIAL = 2, OTROS = 3;

    const  SIN_GUIA = 0, CON_GUIA = 1;

    protected $fillable = ['id_oficina', 'id_entidad', 'id_municipio', 'aulas', 'clave', 'nombre', 'telefono', 'direccion', 'colonia', 'codigo_postal', 'responsable', 'segundo_responsable', 'extemporaneos', 'tipo', 'guia', 'clasificacion'];

    protected $dates = ['deleted_at'];

    protected $with = ["oficina"];

    public static function getGuia()
    {
        return [
            self::SIN_GUIA => "Sin guía",
            self::CON_GUIA => "Con guía",
        ];
    }

    public static function getTipos()
    {
        return [
            self::TIPO_OFICIAL => "Oficial",
            self::TIPO_SOCIAL => "Social",
            self::TIPO_OTRO => "Otro"
        ];
    }

    public static function getClasificacion()
    {
        return [
            self::PROPIA => "Propia",
            self::OFICIAL => "Oficial",
            self::OTROS => "Otros"
        ];
    }

    public static function getGuiaById(int $id)
    {
        $tiposGuia = self::getGuia();
        return $tiposGuia[$id] ?? 'No existe ese tipo Guia';
    }

    public static function getTipoNameById(int $id)
    {
        $tipos = self::getTipos();
        return $tipos[$id] ?? 'No existe este tipo';
    }

    public static function getClasificacionById(int $id)
    {
        $clasificaciones = self::getTipos();
        return $clasificaciones[$id] ?? 'No existe este tipo';
    }

    public function entidad()
    {
        return $this->hasOne(Entidad::class, 'id', 'id_entidad');
    }

    public function municipio()
    {
        return $this->hasOne(Municipio::class, 'id', 'id_municipio');
    }

    public function oficina()
    {
        return $this->hasOne(Oficina::class, 'id', 'id_oficina');
    }

    public function roc()
    {
        return $this->hasOne(Roc::class, 'id_sede', 'id');
    }

    public function rocExt()
    {
        return $this->hasOne(RocExtemporaneo::class, 'id_sede', 'id');
    }
}
