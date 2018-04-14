<?php

namespace App\Models\Catalogo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entidad extends Model
{
    use SoftDeletes;

    protected $fillable=['clave','descripcion','id_pais'];

    protected $dates=['deleted_at'];

    public function pais()
    {
        return $this->hasOne(Pais::class, 'id', 'id_pais');
    }
}
