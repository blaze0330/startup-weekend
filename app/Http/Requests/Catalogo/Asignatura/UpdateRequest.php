<?php

namespace App\Http\Requests\Catalogo\Asignatura;

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
			'clave' => 'required|max:100',
			'nombre' => 'required|max:200',
			'semestre' => 'required|integer',
			'area_1' => 'required|integer',
			'area_2' => 'integer',
			'area_3' => 'integer',
			'fase' => 'required|integer',
			'imprimir_certificado' => 'integer',
        ];
    }
}