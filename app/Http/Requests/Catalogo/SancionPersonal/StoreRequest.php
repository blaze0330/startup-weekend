<?php

namespace App\Http\Requests\Catalogo\SancionPersonal;

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
			'clave' => 'required|max:50',
			'descripcion' => 'required|max:200',
			'id_tipo_colaborador' => 'required|integer',
            'primera_incidencia' => 'required|integer',
            'primera_incidencia_plazo'=> 'required',
            'segunda_incidencia'=> 'required|integer',
            'segunda_incidencia_plazo'=> 'required|integer',
            'tercera_incidencia'=> 'required|integer',
		];
	}
}
