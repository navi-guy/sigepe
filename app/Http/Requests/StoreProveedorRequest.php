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
            'razon_social' => 'required|min: 3|max: 150|regex:/^[A-Za-z0-9. -]+$/|unique:proveedores,razon_social,'.$this->id,
            'ruc'          => 'required|digits: 11|unique:proveedores,ruc,'.$this->id,
            'direccion'    => 'nullable|min: 3|regex:/^[\pL.\s-]+$/u|max: 150',
            'tipo'         => 'nullable|numeric|gt:0'      
            ];
    }
}
