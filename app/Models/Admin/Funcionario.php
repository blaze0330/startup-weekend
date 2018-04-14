<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Funcionario extends Model
{
    use SoftDeletes;

    const MASCULINO = 1, FEMENINO = 2;

    protected $fillable = ['clave', 'titulo', 'nombre', 'puesto', 'genero', 'certificar', 'cancela_reposicion', 'autoriza_extemporaneo', 'imagen_firma'];

    protected $dates = ['deleted_at'];

    public static function getGeneros()
    {

        return [
            Funcionario::MASCULINO => 'Masculino',
            Funcionario::FEMENINO => 'Femenino',
        ];
    }
}
