<?php

namespace App\Http\Requests\Preinscripcion\PlaticaInformativa;

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
            'id_oficina' => 'required',
            'id_sede' => 'required',
            'anio' => 'required',
            'tipo' => 'required',
            'capacidad' => 'required',
            'dia' => 'required',
            'hora' => 'required|max:10',
            'grupo' => 'required|max:50',
            'disponibilidad' => 'required|max:50',
            'en_linea' => 'required',
		];
	}
}
