<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
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
            'descripcion' => 'required|max:200',
        ];
    }
    public function attributes()
    {
        return [
            'nombre' => 'Nombre',
            'descripcion' => 'Descripción',
        ];
    }
    public function messages()
    {
        return [

            'nombre.max' => 'El campo Nombre debe tener máximo 70 carácteres', 
            'descripcion.max' => 'El campo Descripción debe tener máximo 200 carácteres',
            '*.required' => 'Por favor completa el campo :attribute',
        ];
    }
}
