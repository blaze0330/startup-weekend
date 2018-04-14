<?php

namespace App\Http\Requests\Inscripcion;


use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return User::isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'escuela_procedencia'=>'required',
            'curp'=>'required|max:50',
            'id_municipio_nacimiento'=>'required',
            'id_entidad_nacimiento'=>'required',
            'id_ultimoestudio'=>'required',
            'id_area'=>'required',
            'nombre' => 'required|max:100',
            'apellido_paterno' => 'required|max:100',
            'apellido_materno' => 'required|max:100',
            'domicilio' => 'required|max:200',
            'id_entidad' => 'required',
            'id_municipio' => 'required',
            'codigo_postal' => 'required|max:6|min:5',
            'fecha_nacimiento'=>'required',
            'estado_civil'=>'required',
            'id_sede'=>'required',
            'id_grupo'=>'required',
            'genero'=>'required'

        ];
    }
}