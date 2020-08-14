<?php

namespace CorporacionPeru\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProveedorInsumoRequest extends FormRequest
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
            'insumo_id'     => 'required|numeric|gt:0',
            'proveedor_id'  => 'required|numeric|gt:0',
            'precio_compra' => 'required|numeric|gt:0'     
            ];
    }
}
