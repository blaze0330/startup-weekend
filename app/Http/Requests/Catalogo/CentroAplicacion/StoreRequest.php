<?php

namespace App\Http\Requests\Catalogo\CentroAplicacion;

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
			'clave' => 'required|max:100',
			'nombre' => 'required|max:200'
		];
	}
}
