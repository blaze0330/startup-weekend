<?php

namespace App\Http\Requests\Preinscripcion;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
			'nombre' => 'required|max:100',
			'apellido_paterno' => 'required|max:100',
			'apellido_materno' => 'required|max:100',
			'domicilio' => 'required|max:200',
			'id_entidad' => 'required|integer',
			'id_municipio' => 'required|integer',
			'id_sede' => 'required|integer',
			'id_fecha' => 'required|integer',
			'estado_civil' => 'required|integer',
			'codigo_postal' => 'required|max:6|min:5',
			'fecha_nacimiento' => 'required',
			'colonia' => 'required|max:100',
			'telefono' => 'required|max:30',
			'genero' => 'required|integer',
			'id_grupo' => 'required|integer'
		];
	}
}
