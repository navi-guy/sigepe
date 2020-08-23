<?php

namespace CorporacionPeru\Http\Controllers;

use Illuminate\Http\Request;
use CorporacionPeru\Pedido;
use CorporacionPeru\Insumo;

use CorporacionPeru\Producto;

class SeguirPedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::where('estado_pedido', '>', '3')->orWhere('estado_pedido', '=', '2')->get(); 
        
        return view('seguirPedidos.index',compact('pedidos'));
    }

  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function rejectPedido(Request $request)
    {
        $id = $request->id_pedido;
        $pedido = Pedido::findOrFail($id);
        $pedido->estado_pedido = 3; 
        $pedido->save();   
        $pedidos = Pedido::all();  
        return view('seguirPedidos.index',compact('pedidos'))->with('alert-type','warning')->with('status','Pedido rechazado');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
    public function approvePedido(Request $request)
    {       
        $id = $request->id_pedido;
        $pedido = Pedido::findOrFail($id);
        $pedido->estado_pedido = 2; 
        $pedido->save();   
        // $pedidos = Pedido::all();   
        $pedidos = Pedido::where('estado_pedido', '>', '3')->orWhere('estado_pedido', '=', '2')->get(); 
        return redirect()->action('SeguirPedidosController@index'
                )->with('alert-type','success')->with('status','Pedido aprobado');
    }
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
                    return redirect()->action('SeguirPedidosController@index')
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
        return redirect()->action('SeguirPedidosController@index'
                )->with('alert-type','success')->with('status','Pedido aprobado');
            
    }


    public function ejecutarPedido(Request $request)
    {           
        $id = $request->id_pedido_ejecutar;
        $pedido = Pedido::findOrFail($id);
        $pedido->estado_pedido = 5; 
        $pedido->save();   
        return redirect()->action('SeguirPedidosController@index')->with('alert-type','success')->with('status','Pedido ejecutado');
    }

    
    public function terminarPedido(Request $request)
    {            
         $id = $request->id_pedido;
         $pedido = Pedido::findOrFail($id);
         $pedido->estado_pedido = 6; 
         $pedido->save();   
         return redirect()->action('SeguirPedidosController@index')->with('alert-type','success')->with('status','Pedido ejecutado');
    }
}
