<?php

namespace App\Models\Catalogo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Municipio extends Model
{
    use SoftDeletes;

    protected $fillable=['clave','descripcion','id_entidad'];

    protected $dates=['deleted_at'];

    public function entidad()
    {
        return $this->hasOne(Entidad::class,'id','id_entidad');
    }
}
