<?php

namespace CorporacionPeru\Http\Controllers;

use CorporacionPeru\Insumo;
use CorporacionPeru\ProveedorInsumo;
use Illuminate\Http\Request;

class RevisarStockController extends Controller
{
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
        $idInsProv = ProveedorInsumo::where('insumo_id', '=', $request->input('id_insumo'))->select('id', 'cantidad')->get();
        // Para recorrer las cantidades pedidas
        $i = 0;
        foreach ($idInsProv as $idr) {
            $cant = $request->cantidad[$i];
            if ($cant != 0) {
                $proveedorInsumo = ProveedorInsumo::find($idr->id);
                $proveedorInsumo->cantidad += $cant;
                $proveedorInsumo->estado = 2;
                $proveedorInsumo->save();
            }
            $i += 1;
        }
        return  back()->with('alert-type', 'success')->with('status', 'Solicitud agregada con éxito');
    }

}
