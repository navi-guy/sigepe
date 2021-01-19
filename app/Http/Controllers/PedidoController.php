<?php

namespace CorporacionPeru\Http\Controllers;

use Illuminate\Http\Request;
use CorporacionPeru\Pedido;
use CorporacionPeru\Producto;
use CorporacionPeru\Proveedor;
use CorporacionPeru\Http\Requests;
use CorporacionPeru\Http\Requests\StorePedidoRequest;
use CorporacionPeru\Http\Requests\UpdatePedidoRequest;
use Carbon\Carbon;
use CorporacionPeru\Notification;
use CorporacionPeru\Traits\GuardarPedido;

class PedidoController extends Controller
{
    use GuardarPedido; # trait

    const PEDIDO_INDEX = 'PedidoController@index';
    const PRODUCTS = 'productos';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::orderBy('id','DESC')->get();    
        return view('pedidos.index',compact('pedidos'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllPedidos()
    {
        return $pedidos = Pedido::orderBy('id','DESC')->get();    
       //return view('pedidos.index',compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Producto::all();
        $last_pedido = Pedido::all()->last();
        $pedidoX = new Pedido; 
        $last_id = ($last_pedido)?$last_pedido->id:0;
        $cod_pedido = $pedidoX->getNewCodigo($last_id);
        $date = Carbon::now()->format('Y-m-d');
        return view('pedidos.create.index', compact(self::PRODUCTS,'date','cod_pedido'));
    }

   /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function savePedido(StorePedidoRequest $request)
    {        
        try {
            $pedido = $this->almacenarPedido($request);
            $last_pedido = Pedido::all()->last();
            $last_id = ($last_pedido)?$last_pedido->id:0;
            $last_id -= 1; # Se le quita uno yaque el código es para el pedido actual y no para el sgte
            $cod_pedido = $pedido->getNewCodigo($last_id);
            $pedido->cod_pedido = $cod_pedido;
            $pedido->save();
            return response()->json(['success' => 'success', 'pedido'=>$pedido], 200);

        } catch (\Exception $e) {
            return response()->json(['error' => 'invalid', 'e'=> $e->getMessage()], 401);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePedidoRequest $request)
    {
        try {
            $pedido = $this->almacenarPedido($request);
            Notification::setAlertSession(Notification::SUCCESS,'Pedido creado con exito');

        } catch (\Exception $e) {
            Notification::setAlertSession(Notification::ERROR,'Ocurrio un problema en el servidor');
        }
        return redirect()->action(self::PEDIDO_INDEX);
    }


    /**
     * Display the specified resource.
     *
     * @param  \CorporacionPeru\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function visualizarPedido($id, $type)
    {
        $pedido  = Pedido::findOrFail($id);        
        return view('revisarPedidos.show.index', compact('pedido', 'type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \CorporacionPeru\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        $pedido = $pedido->load(self::PRODUCTS);
        $productos = Producto::all();
        return view('pedidos.edit.index', compact(self::PRODUCTS,'pedido'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \CorporacionPeru\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(StorePedidoRequest $request,  $id)
    {
        Pedido::findOrFail($id)->update($request->validated());
        $pedido = Pedido::findOrFail($id);
        $productos_id = $request->product;
        $qty_productos = $request->qty;
         
        $pedido_producto = [];
        for ($i=0; $i < count($productos_id); $i++) { 
            $producto = Producto::findOrFail($productos_id[$i]);
            $cantidad = $qty_productos[$i];
            $pu = $producto->precio_unitario;
            $monto = $cantidad*$pu;

            $pedido_producto += array( $productos_id[$i]
                                        => ['cantidad'=> $cantidad ,'pu'=>$pu, 'monto'=>$monto]);            
        }
        $pedido->productos()->sync($pedido_producto);
        Notification::setAlertSession(Notification::SUCCESS,'Pedido editado con exito');

        return redirect()->action(self::PEDIDO_INDEX);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \CorporacionPeru\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        $pedido->productos()->detach();
        $pedido->delete();
        Notification::setAlertSession(Notification::SUCCESS,'Pedido eliminado con exito');
        return redirect()->action(self::PEDIDO_INDEX);

    }
}
