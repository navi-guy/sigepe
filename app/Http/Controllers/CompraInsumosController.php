<?php

namespace CorporacionPeru\Http\Controllers;

use CorporacionPeru\Insumo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use CorporacionPeru\ProveedorInsumo;
use CorporacionPeru\Notification;

class CompraInsumosController extends Controller
{
    /**
     * Mostrar todos los insumos con solicitudes
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $insumos = Insumo::groupBy('insumos.id','proveedores.id')
                    ->join('insumos_proveedor', 'insumos_proveedor.insumo_id', '=', 'insumos.id')
                    ->join('proveedores', 'insumos_proveedor.proveedor_id', '=', 'proveedores.id')
                    ->selectRaw('insumos.id, insumos.nombre, insumos.cantidad,
                             insumos.unidad_medida, insumos_proveedor.insumo_id,
                             proveedores.razon_social,
                             insumos_proveedor.id as insumo_proveedor_id,
                             MAX(insumos_proveedor.estado) AS estado, insumos_proveedor.precio_compra,
                             SUM(insumos_proveedor.cantidad) AS solicitado')
                    ->where('estado','=','2')
                    ->orWhere('estado','=','3')
                    ->orderBy('insumos.id', 'DESC')
                    ->get();

        return view('comprarInsumos.index', compact('insumos'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function rejectSolicitud(Request $request)
    {
        $id = $request->id_insumo_proveedor;
        $solicitudInsumo = ProveedorInsumo::findOrFail($id);
        $solicitudInsumo->estado = 1;
        $solicitudInsumo->cantidad = 0;
        $solicitudInsumo->save();
        Notification::setAlertSession(Notification::WARNING,'Solicitud rechazada');
        return back();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function approveSolicitud(Request $request)
    {
        $id = $request->id_insumo_proveedor;
        $solicitudInsumo = ProveedorInsumo::findOrFail($id);
        $solicitudInsumo->estado = 3;
        $solicitudInsumo->save();
        Notification::setAlertSession(Notification::SUCCESS,'Solicitud aceptada');
        return back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registrarCompra(Request $request)
    {
        /**Transaction*/
        DB::beginTransaction();
        try {
            $id = $request->id_insumo_proveedor;
            $solicitudInsumo = ProveedorInsumo::findOrFail($id);
            $id_insumo = $solicitudInsumo->insumo_id;
            $insumo = Insumo::findOrFail($id_insumo);
            $insumo->cantidad += $solicitudInsumo->cantidad;
            $solicitudInsumo->estado = 1;
            $solicitudInsumo->cantidad = 0;
            $solicitudInsumo->save();
            $insumo->save();
            Notification::setAlertSession(Notification::SUCCESS,'Compra de insumos registrada');
        DB::commit();
        return back();
        } catch (\Exception  $e) {
            DB::rollback();
            Notification::setAlertSession(Notification::DANGER,'Ocurrió un error en el servidor');
            return  back();
        }
    }
}

