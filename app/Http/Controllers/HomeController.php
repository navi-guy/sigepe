<?php

namespace CorporacionPeru\Http\Controllers;

use Illuminate\Http\Request;

use CorporacionPeru\Pedido;
use CorporacionPeru\User;
use CorporacionPeru\Producto;
use CorporacionPeru\Categoria;
use CorporacionPeru\Insumo;
use CorporacionPeru\Proveedor;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $numeroPedido= Pedido::all()->count();
        $numeroUsuarios= User::all()->count();
        $numeroProductos= Producto::all()->count();
        $numeroCategorias= Categoria::all()->count();
        $numerodeInsumos= Insumo::all()->count();
        $numeroProveedores= Proveedor::all()->count();
        $array = [
        'npedido'    => $numeroPedido,
        'nusuario'   => $numeroUsuarios,
        'nproductos' => $numeroProductos,
        'ncategoria' => $numeroCategorias,
        'ninsumo'    => $numerodeInsumos,
        'nproveedor' => $numeroProveedores,
        ];
        //dd($array['npedido']);
        //obtener valores de las cartillas y pasarlos a la vista
        return view('home',compact('array'));

    }
}
