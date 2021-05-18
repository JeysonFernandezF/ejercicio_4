<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrarRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required|max:70',
            'email' => 'required|unique:users|max:100|regex:/(.+)@(.+)\.(.+)/i',
            'contrasena_inicio' => 'required|min:6|confirmed|max:100|regex:/[a-zA-Z]/',
            'contrasena_inicio_confirmation' => 'required|min:6|max:100',     
        ];
    }
    public function attributes()
    {
        return [
            'nombre' => 'Nombres',
            'email' => 'Correo Electrónico',
            'contrasena_inicio' => 'Contraseña',
            'contrasena_inicio_confirmation' => 'Repetir Contraseña',
        ];
    }
    public function messages()
    {
        return [

            'email.max' => 'El campo Correo Electrónico debe tener máximo 100 carácteres', 
            'contrasena_inicio.max' => 'El campo Contraseña debe tener máximo 100 carácteres',
            'contrasena_inicio.confirmed' => 'Los campos contraseña no coinciden',
            '*.max' => 'El campo :attribute debe tener máximo 70 carácteres',
            'email.unique' => 'Este Correo Electrónico ya existe en nuestro sistema',
            '*min' => 'El campo :attribute debe tener mínimo 6 carácteres',
            'contrasena_inicio.regex' => 'Tu contraseña debe tener un mínimo de 6 caracteres y al menos 1 letra',
            'email.regex' => 'Por favor ingresa un correo electrónico válido',
            '*.required' => 'Por favor completa el campo :attribute',
        ];
    }
}
