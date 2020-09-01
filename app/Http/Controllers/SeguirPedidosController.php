<?php

namespace CorporacionPeru\Http\Controllers;

use Illuminate\Http\Request;
use CorporacionPeru\Pedido;
use CorporacionPeru\Insumo;
use CorporacionPeru\Traits\EvaluarPedido;
use CorporacionPeru\Producto;
use CorporacionPeru\Notification;

class SeguirPedidosController extends Controller
{
    use EvaluarPedido;

    const SEGUIR_PEDIDOS = 'SeguirPedidosController@index';

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
     **/

    public function approvePedido(Request $request)
    {

        $pedido_id = $request->id_pedido_por_aprobar;
        $isAprobado = $this->aprobarPedido($pedido_id);
        if ($isAprobado) {
            Notification::setAlertSession(Notification::SUCCESS,'Pedido aprobado');
            return redirect()->action(self::SEGUIR_PEDIDOS);
        } else{
            Notification::setAlertSession(Notification::WARNING,'No hay insumos suficientes');
            return redirect()->action(self::SEGUIR_PEDIDOS);
        }    
    }


    public function ejecutarPedido(Request $request)
    {           
        $id = $request->id_pedido_ejecutar;
        $pedido = Pedido::findOrFail($id);
        $pedido->estado_pedido = 5; 
        $pedido->save();   

        Notification::setAlertSession(Notification::SUCCESS,'Pedido ejecutado');
        return redirect()->action(self::SEGUIR_PEDIDOS);
    }

    
    public function terminarPedido(Request $request)
    {            
        $id = $request->id_pedido;
        $pedido = Pedido::findOrFail($id);
        $pedido->estado_pedido = 6; 
        $pedido->save();   
        Notification::setAlertSession(Notification::SUCCESS,'Pedido terminado');
        return redirect()->action(self::SEGUIR_PEDIDOS);
    }
}
