<?php

namespace CorporacionPeru\Traits;

use CorporacionPeru\Pedido;
use CorporacionPeru\Producto;
use CorporacionPeru\Http\Requests\StorePedidoRequest;

trait GuardarPedido {
    
    /**
     * Apruebe el pedido especificado
     * @param  
     * @return 
     */
    public function almacenarPedido(StorePedidoRequest $request) {

        $pedido = Pedido::create($request->validated());
        $productos_id = $request->product;
        $qty_insumos = $request->qty;        
        for ($i=0; $i < count($productos_id); $i++) { 
            $producto = Producto::findOrFail($productos_id[$i]);
            $cantidad = $qty_insumos[$i];
            $pu = $producto->precio_unitario;
            $monto = $cantidad*$pu;
            $pedido->productos()->attach($producto->id,
                ['cantidad'=> $cantidad ,'pu'=>$pu, 'monto'=>$monto]);
        }
        $pedido->save();
        return $pedido;
    }

}