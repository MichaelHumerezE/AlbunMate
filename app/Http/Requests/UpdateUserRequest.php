<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'apellidos' => [''],
            'email' => ['required'],
            'face' => ['required'],
            'password' => [''],
            'password_confirmation' => [''],
            'ci' => [''],
            'sexo' => [''],
            'phone' => [''],
            'domicilio' => [''],
            'suscripcion' => [''],
            'tipo_p' => ['required'],
            'tipo_o' => ['required'],
            'tipo_f' => ['required'],
            'tipo_i' => ['required'],
        ];
    }
}
