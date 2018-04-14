<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ParametroGeneral extends Model
{
    protected $fillable=['clave','descripcion','valor'];

    protected $dates=['deleted_at'];
}
