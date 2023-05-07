<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required'],
            'descripcion' => [''],
            'carpeta' => ['required'],
            'image' => ['required'],
            'direccion' => ['required'],
            'fecha' => ['required'],
            'hora' => ['required'],
            'codigo' => ['required'],
            'id_tipoEvento' => ['required'],
            'id_organizador' => ['required'],
        ];
    }
}
