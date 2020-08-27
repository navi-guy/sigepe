<?php

namespace CorporacionPeru\Http\Controllers;
use Illuminate\Http\Request;
use CorporacionPeru\Proveedor;
use CorporacionPeru\Insumo;
use CorporacionPeru\Http\Requests;
use CorporacionPeru\Http\Requests\StoreProveedorRequest;
use CorporacionPeru\Http\Requests\UpdateProveedorRequest;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $proveedores = Proveedor::all();       
        return view('proveedores.index',compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 

        $proveedores=Proveedor::orderBy('id','asc')->get();
        $insumos = Insumo::all();
        return view('proveedores.create.index',compact('proveedores','insumos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \CorporacionPeru\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function getInsumosSinAsignar($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $array_ids_insumo = $proveedor->insumos->pluck('id');
        $insumos_sin_asignar = Insumo::whereNotIn('id',$array_ids_insumo)->get();
        return $insumos_sin_asignar;
    }

    /**
     * Display the specified resource.
     *
     * @param  \CorporacionPeru\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function getInsumosAsignados($proveedor_id)
    {
        $proveedor = Proveedor::findOrFail($proveedor_id);
        return view('proveedores.insumos.index',compact('proveedor'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProveedorRequest $request)
    {
   
        Proveedor::create($request->validated());
        return  redirect()->action('ProveedorController@index')->with('alert-type','success')->with('status','Proveedor creado con exito');
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \CorporacionPeru\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $planta = Planta::findOrFail($id);
        $id = $planta->proveedor_id;
        $proveedor = Proveedor::findOrFail($id);
        return $proveedor;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \CorporacionPeru\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return $proveedor;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \CorporacionPeru\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProveedorRequest $request)
    {
        $id=$request->id;
        $proveedor=Proveedor::findOrFail($id);
        $proveedor->update($request->validated());
        return  redirect()->action('ProveedorController@index')->with('alert-type','success')->with('status','Proveedor editado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \CorporacionPeru\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proveedor=Proveedor::findOrFail($id);
        if (count($proveedor->insumos)==0) {
            $proveedor->insumos()->detach();
            $proveedor->delete();
            return  back()->with('alert-type','warning')->with('status','Proveedor borrado con exito');
        } else{
            return  back()->with('alert-type','warning')->with('status','Elimine los insumos asociados al proveedor primero');
        }       
            
        
    }

}