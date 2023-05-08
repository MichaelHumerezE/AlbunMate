<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSuscripcionRequest extends FormRequest
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
            'fechaPago' => ['required'],
            'fechaIni' => ['required'],
            'fechaFin' => ['required'],
            'monto' => ['required'],
            'plan' => ['required'],
            'id_usuario' => ['required'],
        ];
    }
}
