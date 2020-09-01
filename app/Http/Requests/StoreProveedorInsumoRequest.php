<?php

namespace CorporacionPeru\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProveedorInsumoRequest extends FormRequest
{
    const REQUIRED_NUM = 'required|numeric|gt:0';

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
            'insumo_id'     => self::REQUIRED_NUM,
            'proveedor_id'  => self::REQUIRED_NUM,
            'precio_compra' => self::REQUIRED_NUM     
            ];
    }
}
