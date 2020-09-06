<?php

namespace CorporacionPeru\Http\Controllers;
use Illuminate\Http\Request;
use CorporacionPeru\Proveedor;
use CorporacionPeru\ProveedorInsumo;
use CorporacionPeru\Insumo;
use CorporacionPeru\Http\Requests\StoreProveedorInsumoRequest;
use CorporacionPeru\Notification;

class ProveedorInsumoController extends Controller
{

    const PROVEEDOR_INSUMO_INDEX = 'ProveedorInsumoController@index';
    /**
     * Asigna un insumo a un proveedor
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProveedorInsumoRequest $request)
    {
        ProveedorInsumo::create($request->validated());

        Notification::setAlertSession(Notification::SUCCESS,'Asignación creada con exito');
        return  back();
     
    }

    /**
     * Muestra el insumo proveedor
     *
     * @param  \CorporacionPeru\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show($proveedor_id)
    {
        $proveedor = Proveedor::findOrFail($proveedor_id);
        return view('proveedores.insumos.index',compact('proveedor'));
    }

    /**
     * Retorna insumos no asociados al proveedor
     *
     * @param  \CorporacionPeru\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $array_ids_insumo = $proveedor->insumos->pluck('id');
        $insumos = Insumo::whereNotIn('id',$array_ids_insumo)
            ->select('id', 'nombre as text')->get();
        return response()->json(['insumos' => $insumos]);
    }

    /**
     * Actualiza el precio de venta del insumo
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \CorporacionPeru\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProveedorInsumoRequest $request)
    {
        $id=$request->id;
        $proveedorInsumo=ProveedorInsumo::findOrFail($id);
        $proveedorInsumo->update($request->validated());
        Notification::setAlertSession(Notification::SUCCESS,'Insumo asignado editado con exito');
        return  back();
    }

    /**
     * Desasigna un insumo a un proveedor
     *
     * @param  \CorporacionPeru\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proveedorInsumo = ProveedorInsumo::findOrFail($id);
        if ($proveedorInsumo->cantidad > 0) {
            Notification::setAlertSession(Notification::WARNING,'Debes culminar el proceso de solicitud de este insumo primero');
            return  back();
        }
        ProveedorInsumo::destroy($id);
        Notification::setAlertSession(Notification::SUCCESS,'Insumo asignado removido con exito');
        return  back(); 
    }

}