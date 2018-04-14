<?php

namespace App\Http\Requests\Catalogo\Oficina;

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
			'id_entidad' => 'required',
			'id_municipio' => 'required',
			'clave' => 'required|max:50',
			'nombre' => 'required|max:100',
			'colonia' => 'required|max:100',
			'codigo_postal' => 'required|max:50',
			'direccion' => 'required|max:200',
			'telefono' => 'required|max:100',
			'area_responsable' => 'required|max:200',
			'responsable' => 'required|max:100',

		];
	}
}
