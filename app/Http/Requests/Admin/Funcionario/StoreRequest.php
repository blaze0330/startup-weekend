<?php

namespace App\Http\Requests\Admin\Funcionario;

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
            'titulo' => 'required|max:10',
            'nombre' => 'required|max:100',
            'puesto' => 'required|max:100',
            'genero' => 'required',

        ];
    }
}