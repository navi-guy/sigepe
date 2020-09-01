<?php

namespace CorporacionPeru\Http\Controllers;

use CorporacionPeru\Trabajador;
use Illuminate\Http\Request;
use CorporacionPeru\Notification;
use CorporacionPeru\Http\Requests\StoreTrabajadorRequest;

class TrabajadorController extends Controller
{
    const TRABAJADOR_INDEX = 'TrabajadorController@index';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trabajadores = Trabajador::all();
        return view('trabajadores.index', compact('trabajadores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrabajadorRequest $request)
    {
        Trabajador::create($request->validated());
        Notification::setAlertSession(Notification::SUCCESS,'Trabajador creado con exito');
        return redirect()->action(self::TRABAJADOR_INDEX);
    }

    /**
     * Display the specified resource.
     *
     * @param  \CorporacionPeru\Trabajador  $trabajador
     * @return \Illuminate\Http\Response
     */
    public function show(Trabajador $trabajadore)
    {
        return response()->json(['trabajador' => $trabajadore]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \CorporacionPeru\Trabajador  $trabajador
     * @return \Illuminate\Http\Response
     */
    public function edit(Trabajador $trabajadore)
    {
        return response()->json(['trabajador' => $trabajadore]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTrabajadorRequest $request)
    {
        $id = $request->id;
        Trabajador::findOrFail($id)->update($request->validated());
        Notification::setAlertSession(Notification::SUCCESS,'Trabajador editado con exito');
        return redirect()->action(self::TRABAJADOR_INDEX);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \CorporacionPeru\Trabajador  $trabajador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trabajador $trabajadore)
    {
        $trabajadore->delete();
        Notification::setAlertSession(Notification::WARNING,'Trabajador eliminado con exito');
        return redirect()->action(self::TRABAJADOR_INDEX);
    }
}
