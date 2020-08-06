<?php

namespace CorporacionPeru\Http\Controllers;

use CorporacionPeru\Categoria;
use Illuminate\Http\Request;
use CorporacionPeru\Http\Requests\StoreCategoriaRequest;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::orderBy('id', 'DESC')->get();
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoriaRequest $request)
    {
        Categoria::create($request->validated());
        return back()->with('alert-type', 'success')->with('status', 'Categoria Registrada con exito');
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
