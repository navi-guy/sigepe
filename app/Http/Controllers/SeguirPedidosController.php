<?php

namespace CorporacionPeru\Http\Controllers;

use Illuminate\Http\Request;
use CorporacionPeru\Pedido;
use CorporacionPeru\Producto;
use CorporacionPeru\Proveedor;
use CorporacionPeru\Http\Requests;
use CorporacionPeru\Http\Requests\StorePedidoRequest;
use Carbon\Carbon;

class SeguirPedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::all();   
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
        return view('revisarPedidos.index',compact('pedidos'))->with('alert-type','warning')->with('status','Pedido rechazado');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function approvePedido(Request $request)
    {       
        $id = $request->id_pedido;
        $pedido = Pedido::findOrFail($id);
        $pedido->estado_pedido = 2; 
        $pedido->save();   
        $pedidos = Pedido::all();   
        return view('revisarPedidos.index',compact('pedidos'))->with('alert-type','success')->with('status','Pedido aprobado');
    }

}
