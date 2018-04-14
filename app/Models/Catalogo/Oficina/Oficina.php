<?php

namespace App\Models\Catalogo\Oficina;

use App\Models\Catalogo\Entidad;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Oficina extends Model
{
    use SoftDeletes;

    protected $fillable = ['id_entidad', 'id_municipio', 'clave', 'nombre', 'colonia', 'codigo_postal', 'puede_certificar', 'direccion', 'telefono', 'area_responsable', 'tiene extemporaneos', 'responsable'];

    protected $dates = ['deleted_at'];

    protected function entidad()
    {
         return $this->hasOne(Entidad::class,'id','id_entidad');
    }
}
