<?php

namespace CorporacionPeru\Http\Controllers;

use CorporacionPeru\Producto;
use CorporacionPeru\Insumo;
use CorporacionPeru\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use CorporacionPeru\Http\Requests\StoreProductoRequest;


class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();       
        return view('productos.index',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $insumos = Insumo::where('cantidad','>',0)->get();
        $categorias = Categoria::all();
        return view('productos.create.index', compact('insumos','categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductoRequest $request)
    {
        $producto = Producto::create($request->validated());

        if($request->file('image')){
            $path = Storage::disk('public')->put('img_products', $request->file('image'));
            $producto->fill(['image'=> $path]);
        }
        $insumos_id = $request->insumo;
        $qty_insumos = $request->qty;        
        for ($i=0; $i < count($insumos_id); $i++) { 
            $cantidad = $qty_insumos[$i];
            $producto->insumos()->attach($insumos_id[$i],['cantidad'=> $cantidad ]);
        }
        $producto->save();

        return  redirect()->action('ProductoController@index')->with('alert-type','success')->with('status','Producto creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \CorporacionPeru\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \CorporacionPeru\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        $insumos = Insumo::where('cantidad','>',0)->get();
        $categorias = Categoria::all();
        return view('productos.create.index', compact('insumos','producto','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \CorporacionPeru\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProveedorRequest $request,  $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \CorporacionPeru\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        /* add restricciones
        Eliminar imagenes too
        */
        $producto->insumos()->detach();
        $producto->delete();
        return  back()->with('alert-type', 'success')->with('status', 'Producto eliminado con exito');
    }
}
