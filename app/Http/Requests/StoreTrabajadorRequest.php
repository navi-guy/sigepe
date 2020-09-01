<?php

namespace CorporacionPeru\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTrabajadorRequest extends FormRequest
{
    const REQUIRED_STR = 'required|min: 2|max: 255';
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
            'dni'=>'required|digits: 8|unique:trabajadores,dni,'.$this->id,
            'nombres'=> self::REQUIRED_STR,
            'apellido_paterno'=> self::REQUIRED_STR,
            'apellido_materno'=> self::REQUIRED_STR,
            'telefono'=>'nullable|regex:/^([9]{1})([0-9]{8})$/i',
            'genero'=>'nullable',
            'email'=>'nullable|email|unique:trabajadores,email,'.$this->id,
            'direccion'=>'nullable|max: 255'
        ];
    }
}
