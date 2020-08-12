<?php

namespace CorporacionPeru\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePedidoRequest extends FormRequest
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
            'cod_pedido'    =>'required|unique:pedidos,cod_pedido,'.$this->cod_pedido,
            'nombre_cli'    =>'required|max: 255',
            'direccion_cli' =>'required|max: 255',         
            'telefono_cli'  =>'required|numeric|gt:0',
            'ruc_cli'       =>'required|digits: 11',
            'monto_bruto'   =>'required|numeric|gt:0',
            'descuento'     =>'required|numeric|gte:0',
            'monto_neto'    =>'required|numeric|gt:0',
            'fecha'         =>'required',
            'product'       =>'required|array|min:1',
            'product.*'     =>'required|distinct',
            'qty'           =>'required|array|min:1',
            'qty.*'         =>'required',
        ];
    }
}
