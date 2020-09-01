<?php

namespace CorporacionPeru\Http\Controllers;

use CorporacionPeru\Insumo;
use CorporacionPeru\ProveedorInsumo;
use Illuminate\Http\Request;
use CorporacionPeru\Notification;

class RevisarStockController extends Controller
{
    const REVISAR_STOCK= 'RevisarStockController@index';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $insumos = Insumo::groupBy('insumos.id')->join('insumos_proveedor', 'insumos_proveedor.insumo_id', '=', 'insumos.id')->selectRaw('insumos.id, insumos.nombre, insumos.cantidad, insumos.unidad_medida, insumos_proveedor.insumo_id, MAX(insumos_proveedor.estado) AS estado, SUM(insumos_proveedor.cantidad) AS solicitado')->orderBy('insumos.id', 'DESC')->get();

        return view('revisarStock.index', compact('insumos'));
    }

    /**
     * Realiza la solicitud de insumos, de los insumos pasados
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ids_proveedor = $request->proveedor_id;
        for ($i=0; $i < count($ids_proveedor) ; $i++) { 
            $cantSolicitud = $request->cantidad[$i];
            if ($cantSolicitud != 0) {
                $proveedorInsumo = ProveedorInsumo::where('proveedor_id',$request->proveedor_id[$i])->where('insumo_id',$request->id_insumo)->first();
                $proveedorInsumo->cantidad += $cantSolicitud;
                $proveedorInsumo->estado = 2;
                $proveedorInsumo->save();
            }
        }
        Notification::setAlertSession(Notification::SUCCESS,'Solicitud agregada con éxito');
        return redirect()->action(self::REVISAR_STOCK);
    }

}
