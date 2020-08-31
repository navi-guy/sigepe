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

class PedidoController extends Controller
{
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
        return view('pedidos.create.index', compact('productos','date','cod_pedido'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePedidoRequest $request)
    {
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
        return  redirect()->action('PedidoController@index')->with('alert-type','success')->with('status','Pedido creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \CorporacionPeru\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        return view('revisarPedidos.show.index', compact('pedido'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \CorporacionPeru\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        $pedido = $pedido->load('productos');
        $productos = Producto::all();
        return view('pedidos.edit.index', compact('productos','pedido'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \CorporacionPeru\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePedidoRequest $request,  $id)
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
        
        return redirect()->action('PedidoController@index')->with('alert-type','success')->with('status','Pedido editado con exito');
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
        return  redirect()->action('PedidoController@index')->with('alert-type', 'success')->with('status', 'Pedido eliminado con exito');
    }
}
