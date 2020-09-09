<?php

namespace CorporacionPeru\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePedidoRequest extends FormRequest
{
    const ONLY_REQUIRED = 'required';
    const REQUIRED_NUM = 'required|numeric|gt: 0|lte: 99999999999999999999';
    const REQUIRED_NUM_BILL = 'required|numeric|gt: 0|lte: 999999999';
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
            'cod_pedido'    => self::ONLY_REQUIRED,            
            'nombre_cli'    => 'required|min: 3|max: 150|regex:/^[ a-zA-ZÀ-ÿ\x{00f1}\x{00d1}]*$/',
            'direccion_cli' => 'required|min: 3|max: 150|regex:/^[ a-zA-ZÀ-ÿ0-9\x{00f1}\x{00d1}\.\-]*$/',         
            'telefono_cli'  => self::REQUIRED_NUM,
            'ruc_cli'       => 'required|digits: 11',
            'monto_bruto'   => self::REQUIRED_NUM_BILL,
            'descuento'     => 'nullable|numeric|gte:0|lte: 999999999',
            'monto_neto'    => self::REQUIRED_NUM_BILL,
            'fecha'         => self::ONLY_REQUIRED,
            'product'       => self::REQUIRED_ARR,
            'product.*'     => 'required|distinct',
            'qty'           => self::REQUIRED_ARR,
            'qty.*'         => self::ONLY_REQUIRED,
        ];
    }
}
