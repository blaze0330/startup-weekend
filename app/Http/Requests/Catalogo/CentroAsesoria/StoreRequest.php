<?php

namespace App\Http\Requests\Catalogo\CentroAsesoria;

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
			'id_oficina' => 'required|integer',
			'id_entidad' => 'required|integer',
			'id_municipio' => 'required|integer',
			'tipo' => 'required|integer',
			'clave' => 'required|max:100',
			'nombre' => 'required|max:200',
			'direccion' => 'required|max:200',
			'colonia' => 'required|max:100',
			'telefono' => 'required|max:50',
			'codigo_postal' => 'required|max:10',
			'giro' => 'required|max:100',
			'gestor' => 'required|max:100',
			'responsable' => 'required|max:100',
			'tipo_otro' => 'max:100'
		];
	}
}
