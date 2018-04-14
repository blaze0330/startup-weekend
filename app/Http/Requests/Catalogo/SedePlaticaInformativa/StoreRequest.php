<?php

namespace App\Http\Requests\Catalogo\SedePlaticaInformativa;

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
			'id_oficina' => 'required',
			'id_entidad' => 'required',
			'id_municipio' => 'required',
			'clave' => 'required',
			'nombre' => 'required',
			'telefono' => 'required',
			'direccion' => 'required',
			'colonia' => 'required',
			'codigo_postal' => 'required',
			'aulas'=>'required',
		];
	}
}
