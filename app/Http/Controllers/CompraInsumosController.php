<?php

namespace CorporacionPeru\Http\Controllers;

use CorporacionPeru\Insumo;
use Illuminate\Http\Request;
use CorporacionPeru\Pedido;
use CorporacionPeru\Producto;

class CompraInsumosController extends Controller
{
    /**
     * Mostrar todos los insumos con solicitudes
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $insumos = Insumo::groupBy('insumos.id','proveedores.id')
                    ->join('insumos_proveedor', 'insumos_proveedor.insumo_id', '=', 'insumos.id')
                    ->join('proveedores', 'insumos_proveedor.proveedor_id', '=', 'proveedores.id')
                    ->selectRaw('insumos.id, insumos.nombre, insumos.cantidad,
                             insumos.unidad_medida, insumos_proveedor.insumo_id, proveedores.razon_social,
                             MAX(insumos_proveedor.estado) AS estado, insumos_proveedor.precio_compra,
                             SUM(insumos_proveedor.cantidad) AS solicitado')
                    ->where('estado','=','2')
                    ->orderBy('insumos.id', 'DESC')
                    ->get();

        // $insumos = Insumo::all()->load('proveedorInsumo');
        // return $insumos;
        // $insumos->load(['proveedorInsumo' => function($query){
        //          $query->where('estado','=','2');
        // }]);

        return view('comprarInsumos.index', compact('insumos'));
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
        $pedidoUpdate = Pedido::findOrFail($pedido_id);
        $pedidoUpdate->estado_pedido = 2;
        $pedidoUpdate->save();
        return redirect()->action('RevisarPedidosController@index'
                )->with('alert-type','success')->with('status','Pedido aprobado');
    }
}
