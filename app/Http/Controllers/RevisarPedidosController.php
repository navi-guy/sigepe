<?php

namespace CorporacionPeru\Http\Controllers;

use CorporacionPeru\Insumo;
use Illuminate\Http\Request;
use CorporacionPeru\Pedido;
use CorporacionPeru\Producto;

class RevisarPedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pedidos = Pedido::all();   
        $pedidos = Pedido::where('estado_pedido', '=', '1')
            ->orWhere('estado_pedido', '=', '4')->get();

        return view('revisarPedidos.index', compact('pedidos'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function rejectPedido(Request $request)
    {
        $id = $request->id_pedido_rechazar;
        $pedido = Pedido::findOrFail($id);
        $pedido->estado_pedido = 3;
        $pedido->save();
        return redirect()->action('RevisarPedidosController@index'
                )->with('alert-type','error')->with('status','Pedido rechazado');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function approvePedido(Request $request)
    {
        $pedido_id = $request->id_pedido_por_aprobar;
        $order = Pedido::findOrFail($pedido_id);
        $orderProducts = $order->productos;
        $insumos = array();
        foreach ($orderProducts as $product) {
            $insumosProducto = $product->insumos;
            foreach ($insumosProducto as $insumo) {
                $cantidadInsumoProducto = $insumo->pivot['cantidad'] * $product->material;
                $insumos[$insumo->id] = 0;
                $insumosStock[$insumo->id] = $insumo->cantidad;
            }
        }

        foreach ($orderProducts as $product) {
            $insumosProducto = $product->insumos;
            foreach ($insumosProducto as $insumo) {
                $cantidadInsumoProducto = $insumo->pivot['cantidad'] * $product->material;
                $insumos[$insumo->id] = $insumos[$insumo->id] + $cantidadInsumoProducto;
                if ($insumos[$insumo->id] > $insumosStock[$insumo->id]) {
                    $pedidoUpdate = Pedido::findOrFail($pedido_id);
                    $pedidoUpdate->estado_pedido = 4;
                    $pedidoUpdate->save();
                    return redirect()->action('RevisarPedidosController@index')
                            ->with('alert-type','warning')->with('status','No hay insumos suficientes');
                }
            }
        }
        foreach($insumos as $key => $insumoCantidad) {
            $insumo = Insumo::findOrFail($key);
            $insumo->cantidad = $insumo->cantidad - $insumoCantidad;
            $insumo->save();
        }
        $pedidoUpdate = Pedido::findOrFail($pedido_id);
        $pedidoUpdate->estado_pedido = 2;
        $pedidoUpdate->save();
        return redirect()->action('RevisarPedidosController@index'
                )->with('alert-type','success')->with('status','Pedido aprobado');
            
    }
}
