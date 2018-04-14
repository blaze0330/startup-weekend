<?php

namespace App\Http\Requests\Catalogo\EtapaCalendarioOrdinario;

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
            'etapa'=>'required|max:100',
            'fase' => 'required|max:50',
            'fecha_certificacion' => 'required',
            'periodo_solicitud_inicio' => 'required',
            'periodo_solicitud_final' => 'required',
            'periodo_presentacion_inicio' => 'required',
            'periodo_presentacion_final' => 'required',
            'comentario' => 'max:200',
        ];
    }
}