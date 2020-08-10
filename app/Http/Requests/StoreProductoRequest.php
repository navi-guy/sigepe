<?php

namespace CorporacionPeru\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductoRequest extends FormRequest
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
            'nombre'          =>'required|max: 255',
            'material'        =>'required|numeric|gt:0',
            'unidad_medida'   =>'required|numeric|gte:0',
            'descripcion'     =>'nullable|max: 255',
            'image'           =>'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'precio_unitario' =>'required|numeric|gt:0',
            'categoria_id'    =>'required',
          //  'insumo'          =>'required|array|min:1',
         //   'insumo.*'        =>'required|distinct',
          //  'qty'             =>'required|array|min:1',
          //  'qty.*'           =>'required',

        ];
    }
}
