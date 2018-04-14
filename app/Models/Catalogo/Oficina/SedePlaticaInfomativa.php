<?php

namespace App\Models\Catalogo\Oficina;

use App\Models\Catalogo\Entidad;
use App\Models\Catalogo\Municipio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SedePlaticaInfomativa extends Model
{
    use SoftDeletes;

    protected $fillable=['id_oficina','id_entidad','id_municipio','clave','nombre','telefono','colonia','direccion','codigo_postal','aulas'];

    protected $dates=['deleted_at'];

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
}
