<?php

namespace CorporacionPeru\Traits;

use CorporacionPeru\Pedido;
use CorporacionPeru\Insumo;

trait EvaluarPedido {
    
    /**
     * Apruebe el pedido especificado
     * @param  
     * @return 
     */
    public function aprobarPedido($id_pedido) {

        $isAprobado = false;

        $order = Pedido::findOrFail($id_pedido);
        $orderProducts = $order->productos;
        $insumos = array();
        foreach ($orderProducts as $product) {
            $insumosProducto = $product->insumos;
            foreach ($insumosProducto as $insumo) {
                $insumos[$insumo->id] = 0;
                $insumosStock[$insumo->id] = $insumo->cantidad;
            }
        }

        foreach ($orderProducts as $product) {
            $insumosProducto = $product->insumos;
            foreach ($insumosProducto as $insumo) {
                $cantidadInsumoProducto = $insumo->pivot['cantidad'] * $product->material;
                $insumos[$insumo->id] += $cantidadInsumoProducto;
                if ($insumos[$insumo->id] > $insumosStock[$insumo->id]) {
                    $pedidoUpdate = Pedido::findOrFail($id_pedido);
                    $pedidoUpdate->estado_pedido = 4;
                    $pedidoUpdate->save();
                    return $isAprobado;// no hay insumos| FALSE
                }
            }
        }
        foreach($insumos as $key => $insumoCantidad) {
            $insumo = Insumo::findOrFail($key);
            $insumo->cantidad = $insumo->cantidad - $insumoCantidad;
            $insumo->save();
        }
        $pedidoUpdate = Pedido::findOrFail($id_pedido);
        $pedidoUpdate->estado_pedido = 2;
        $pedidoUpdate->save();
        $isAprobado = true;
        //return $isAprobado; // aprobado! | TRUE
        return true;
    }

}