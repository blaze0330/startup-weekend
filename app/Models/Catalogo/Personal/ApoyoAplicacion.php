<?php

namespace App\Models\Catalogo\Personal;

use App\Models\Catalogo\Entidad;
use App\Models\Catalogo\Municipio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApoyoAplicacion extends Model
{
    use SoftDeletes;

    protected $fillable=['clave','id_tipo_colaborador','nombre','apellido_paterno','apellido_materno','rfc','domicilio','colonia','telefono','codigo_postal','id_entidad','id_municipio','nivel_estudios','fecha_ingreso','fecha_egreso','ordinarios_a','ordinarios_b','extemporaneos','situacion'];

    protected $dates=['deleted_at'];

    public function colaborador()
    {
        return $this->hasOne(TipoColaborador::class,'id','id_tipo_colaborador');
    }

    public function entidad()
    {
        return $this->hasOne(Entidad::class,'id','id_entidad');
    }

    public function municipio()
    {
        return $this->hasOne(Municipio::class,'id','id_municipio');
    }

}
