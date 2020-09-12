<?php

namespace CorporacionPeru\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProveedorRequest extends FormRequest
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
            'razon_social' => 'required|min: 3|max: 150|regex:/^[ a-zA-ZÀ-ÿ0-9\x{00f1}\x{00d1} \.\-]*$/|unique:proveedores,razon_social,'.$this->id,
            'ruc'          => 'required|digits: 11|unique:proveedores,ruc,'.$this->id,
            'direccion'    => 'nullable|min: 3|regex:/^[ a-zA-ZÀ-ÿ0-9\u00f1\u00d1\.\-]*$/|max: 150',
            'tipo'         => 'nullable|numeric|gt:0'      
            ];
    }
}
