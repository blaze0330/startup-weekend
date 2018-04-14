<?php

namespace App\Http\Requests\Catalogo\SancionEducando;

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
            'norma_referencia' => 'required|integer',
            'descripcion' => 'required|max:200',
            'primera_incidencia' => 'required|integer',
            'primera_incidencia_plazo'=> 'required|integer',
            'segunda_incidencia'=> 'required|integer',
            'segunda_incidencia_plazo'=> 'required|integer',
            'tercera_incidencia'=> 'required|integer',
            'tercera_incidencia_plazo'=> 'required|integer',
            'cuarta_incidencia'=> 'required|integer',
            'cuarta_incidencia_plazo'=> 'required|integer',
            'norma_suspension_1'=> 'required|integer',
            'norma_suspension_2'=> 'required|integer',
            'norma_baja'=> 'required|integer',
		];
	}
}
