<?php

namespace CorporacionPeru\Http\Controllers;

use CorporacionPeru\Categoria;
use CorporacionPeru\Producto;
use CorporacionPeru\Notification;
use Illuminate\Http\JsonResponse;
use CorporacionPeru\Http\Requests\StoreCategoriaRequest;

class CategoriaController extends Controller
{
    /**
     * Muestra la vista de categorías.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $categorias = Categoria::orderBy('id', 'DESC')->get();
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Almacena una categoría en la base de datos.
     *
     * @param  StoreCategoriaRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCategoriaRequest $request)
    {
        Categoria::create($request->validated());
        Notification::setAlertSession(Notification::SUCCESS,'Categoria Registrada con exito');
        return back();
    }

    /**
     * Retorna una categoría en JSON.
     *
     * @param  Categoria  $categoria
     * @return JsonResponse
     */
    public function edit(Categoria $categoria)
    {
        return response()->json(['categoria' => $categoria]);
    }

    /**
     * Actualiza la categoría especificada en la base de datos.
     *
     * @param  StoreCategoriaRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreCategoriaRequest $request)
    {
        $id = $request->id;
        Categoria::findOrFail($id)->update($request->validated());
        Notification::setAlertSession(Notification::SUCCESS,'Categoria editada con exito');
        return  back();
    }

    /**
     * Remueve la categoría especificada de la base de datos.
     *
     * @param \CorporacionPeru\Categoria $categoria
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Categoria $categoria)
    {
        $exists = Producto::where('categoria_id', $categoria->id)->exists();
        if ($exists) {
            Notification::setAlertSession(Notification::WARNING,'Categoría tiene un producto asociado');
            return  back();
        }
        $categoria->delete();
        Notification::setAlertSession(Notification::SUCCESS,'Categoría eliminada con exito');
        return  back();
    }
}
