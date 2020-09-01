<?php

namespace CorporacionPeru\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePedidoRequest extends FormRequest
{
    const ONLY_REQUIRED = 'required';
    const REQUIRED_STR = 'required|max: 255';
    const REQUIRED_NUM = 'required|numeric|gt:0';
    const REQUIRED_ARR = 'required|array|min:1';
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
            'cod_pedido'    => self::REQUIRED_STR,            
            'nombre_cli'    => self::REQUIRED_STR,
            'direccion_cli' => self::REQUIRED_STR,         
            'telefono_cli'  => self::REQUIRED_NUM,
            'ruc_cli'       => 'required|digits: 11',
            'monto_bruto'   => self::REQUIRED_NUM,
            'descuento'     => 'nullable|numeric|gte:0',
            'monto_neto'    => self::REQUIRED_NUM,
            'fecha'         => self::ONLY_REQUIRED,
            'product'       => self::REQUIRED_ARR,
            'product.*'     =>'required|distinct',
            'qty'           => self::REQUIRED_ARR,
            'qty.*'         => self::ONLY_REQUIRED,
        ];
    }
}
