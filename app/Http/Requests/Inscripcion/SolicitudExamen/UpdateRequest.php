<?php

namespace App\Http\Requests\Inscripcion\SolicitudExamen;


use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

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

            'tipo' => 'required',
            'id_inscripcion'=>'required',
            'id_sede'=>'required',
            'id_banco'=>'required',
        ];
    }
}