<?php

namespace CorporacionPeru\Http\Controllers;

use CorporacionPeru\Insumo;
use Illuminate\Http\Request;
use CorporacionPeru\Pedido;
use CorporacionPeru\Producto;
use CorporacionPeru\Traits\EvaluarPedido;
use CorporacionPeru\Notification;

class RevisarPedidosController extends Controller
{
    use EvaluarPedido;

    const REVISAR_PEDIDOS = 'RevisarPedidosController@index';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
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

        Notification::setAlertSession(Notification::DANGER,'Pedido rechazado');
        return redirect()->action(self::REVISAR_PEDIDOS);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function approvePedido(Request $request)
    {
        $pedido_id = $request->id_pedido_por_aprobar;
        $isAprobado = $this->aprobarPedido($pedido_id);

        if ($isAprobado) {
            Notification::setAlertSession(Notification::SUCCESS,'Pedido aprobado');
            return redirect()->action(self::REVISAR_PEDIDOS);
        } else{
            Notification::setAlertSession(Notification::WARNING,'No hay insumos suficientes');
            return redirect()->action(self::REVISAR_PEDIDOS);
        }
            
    }
}
