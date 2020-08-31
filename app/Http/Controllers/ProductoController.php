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
        $productos = Producto::orderBy('id','DESC')->get();
        return view('productos.index',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $insumos = Insumo::disponibles()->get();
        $categorias = Categoria::all();
        $unidades_medida = config('constants.unidades_medida');
        return view('productos.create.index', compact('insumos','categorias','unidades_medida'));
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
        $this->saveImageOnStorage($request, $producto);
        $insumos_id = $request->insumo;
        $qty_insumos = $request->qty;
        for ($i=0; $i < count($insumos_id); $i++) {
            $cantidad = $qty_insumos[$i];
            $producto->insumos()->attach($insumos_id[$i], $this->getKeyValueCantidad($cantidad));
        }
        $producto->save();

        return  redirect()->action('ProductoController@index')->with('alert-type','success')->with('status','Producto creado con exito');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDisponibles(){
        $productos = Producto::all();
        return response()->json(['productos' => $productos]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \CorporacionPeru\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return $producto;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \CorporacionPeru\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        $producto = $producto->load('insumos');
        $insumos = Insumo::disponibles()->get();
        $categorias = Categoria::all();
        $unidades_medida = config('constants.unidades_medida');
        return view('productos.edit.index', compact('insumos','producto','categorias','unidades_medida'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \CorporacionPeru\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductoRequest $request,  $id)
    {
        Producto::findOrFail($id)->update($request->validated());
        $producto = Producto::findOrFail($id);
        $this->saveImageOnStorage($request, $producto);
        $insumos_id = $request->insumo;
        $qty_insumos = $request->qty;
        $producto->save();

        $producto_insumo = [];
        for ($i=0; $i < count($insumos_id); $i++) {
            $cantidad = $qty_insumos[$i];
            $producto_insumo += array( $insumos_id[$i]  => $this->getKeyValueCantidad($cantidad));
        }
        $producto->insumos()->sync($producto_insumo);

        return redirect()->action('ProductoController@index')->with('alert-type','success')->with('status','Producto editado con exito');
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
        return  redirect()->action('ProductoController@index')->with('alert-type', 'success')->with('status', 'Producto eliminado con exito');
    }

    public function getKeyValueCantidad($value){
        $key = 'cantidad';
        return [$key => $value];
    }

    /**
     * Guarda imagen en la carpeta public y asocia la ruta de
     * la imagen al producto especificado.
     * @param $request
     * @param $producto
     * @return void
     */
    public function saveImageOnStorage($request, $producto){
        $image_requested = $request->file(Producto::IMAGE);
        if($image_requested){//si envia img
            $path = Storage::disk('public')->put('img_products', $image_requested);
            $producto->fill([ Producto::IMAGE => $path]);
        }
    }

}
