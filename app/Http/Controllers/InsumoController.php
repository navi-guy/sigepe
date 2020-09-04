<?php

namespace CorporacionPeru\Http\Controllers;

use CorporacionPeru\Producto;
use Illuminate\Http\Request;
use CorporacionPeru\Notification;
use CorporacionPeru\Insumo;

class InsumoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDisponibles(){
        $insumos = Insumo::where('cantidad','>',0)->get();
        return response()->json(['insumos' => $insumos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \CorporacionPeru\Insumo  $insumo
     * @return \Illuminate\Http\Response
     */
    public function show(Insumo $insumo)
    {
        $insumo = $insumo->load('proveedores');
        return response()->json(['insumo' => $insumo]);
    }

}
