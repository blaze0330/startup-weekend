<?php

namespace App\Http\Requests\Catalogo\Personal\ApoyoAplicacion;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

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
            'clave'=>'required|max:50',
            'id_tipo_colaborador'=>'required|integer',
            'nombre' => 'required|max:100',
            'apellido_paterno' => 'required|max:100',
            'apellido_materno' => 'required|max:100',
            'rfc' => 'required|max:100',
            'domicilio' => 'required|max:150',
            'colonia' => 'required|max:150',
            'telefono' => 'required|max:100',
            'codigo_postal' => 'required|max:100',
            'id_entidad' => 'required|integer',
            'id_municipio' => 'required|integer',
            'nivel_estudios' => 'required|max:100',
            'fecha_ingreso' => 'required|date',
            'fecha_egreso' => 'required|date',
            'situacion' => 'required|integer',
		];
	}
}
