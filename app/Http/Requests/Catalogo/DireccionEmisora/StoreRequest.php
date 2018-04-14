<?php

namespace App\Http\Requests\Catalogo\DireccionEmisora;

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
			"clave" => 'required|max:100',
			"descripcion" => 'required|max:200',
			"id_entidad" => 'required|integer',
			"clave_centro" => 'required|max:100',
			"descripcion_centro" => 'required|max:100',
			"complemento_centro" => 'required|max:100'
		];
	}
}
