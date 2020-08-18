<?php

namespace CorporacionPeru\Http\Controllers;

use CorporacionPeru\Insumo;
use CorporacionPeru\Categoria;
use CorporacionPeru\ProveedorInsumo;
use Illuminate\Http\Request;
use CorporacionPeru\Http\Requests\StoreCategoriaRequest;

class RevisarStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //   $categorias = Categoria::orderBy('id', 'DESC')->get();
        //$insumos = Insumo::orderBy('id', 'DESC')->get();

        $insumos = Insumo::groupBy('insumos.id')->join('insumos_proveedor', 'insumos_proveedor.insumo_id', '=', 'insumos.id')->selectRaw('insumos.id, insumos.nombre, insumos.cantidad, insumos.unidad_medida, insumos_proveedor.insumo_id, MAX(insumos_proveedor.estado) AS estado, SUM(insumos_proveedor.cantidad) AS solicitado')->orderBy('insumos.id', 'DESC')->get();

        return view('revisarStock.index', compact('insumos'));
        //return $insumos;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;

        //$ret = ProveedorInsumo::find($request->input('id_insumo'), '*');

        // En $ret almacenaremos todos los registros de tal forma que
        // el id_insumo es el que llega con $request
        //$retorno = ProveedorInsumo::where('insumo_id', '=', $request->input('id_insumo'))->get('id');
        
        // Lo que hay en la BD
        $idInsProv = ProveedorInsumo::where('insumo_id', '=', $request->input('id_insumo'))->select('id', 'cantidad')->get();
        // Para recorrer las cantidades pedidas
        $i = 0;

        echo "IDRequest: ".$idInsProv."\n\n";

        foreach ($idInsProv as $idr) {
            echo "Fila actual: ".$idr."\n";
            echo "ID actual: ".$idr->id."\n";
            echo "Cant request: ".$request->cantidad[$i]."\n";
            $cant = $request->cantidad[$i];

            if ($cant != 0) {
                $row = ProveedorInsumo::find($idr->id);

                echo "Antes    : ".$row."\n";

                $row->cantidad += $cant;

                $row->estado = 2;
                $row->save();

                echo "Guardardo: ".$row."\n\n";
            }

            $i += 1;
        }

        // $request->proveedor_id[x] es lo mismo que $request->input('proveedor_id')[x]
        // $request->input('*') devuelve un arreglo con los valores de request (sin claves)

        // return $request->input('*');
    //  return $request;

        // return "lo que se hace con la solicitud de insumos.";
        return  back()->with('alert-type', 'success')->with('status', 'Solicitud agregada con éxito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \CorporacionPeru\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        return response()->json(['categoria' => $categoria]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \CorporacionPeru\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoriaRequest $request, $id)
    {
        //
        $id = $request->id;
        Categoria::findOrFail($id)->update($request->validated());
        return  back()->with('alert-type', 'success')->with('status', 'Categoria editada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \CorporacionPeru\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        // $exists = PedidoCliente::where('cliente_id', $cliente->id)->exists();
        // if ($exists) {
        //     return  back()->with('alert-type', 'warning')->with('status', 'Cliente tiene un saldo pendiente');
        // }
        $categoria->delete();
        return  back()->with('alert-type', 'success')->with('status', 'Categoria eliminada con exito');
    }
}
