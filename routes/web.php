<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes(['register' => false]);
Route::redirect('/', 'login', 301);

Route::middleware(['auth'])->group(function () {
	Route::get('/home', 'HomeController@index')->name('home.index');

	/* Trabajadores and users*/
	Route::resource('/trabajadores', 'TrabajadorController');
	Route::resource('/users', 'UserController');

	/* Proveedor & insumos asignados y registro compra insumos */	
	Route::resource('/proveedores', 'ProveedorController');
	Route::resource('/asignacion', 'ProveedorInsumoController');
	Route::resource('/comprar_insumos', 'CompraInsumosController');
	Route::post('/approve_insumo', 'CompraInsumosController@approveSolicitud')
			->name('comprarInsumos.approveSolicitud');
	Route::post('/reject_insumo', 'CompraInsumosController@rejectSolicitud')
			->name('comprarInsumos.rejectSolicitud');
	Route::post('/registrar_compra', 'CompraInsumosController@registrarCompra')
			->name('comprarInsumos.registrarCompra');
			

	/** Insumos */
	Route::resource('/insumos', 'InsumoController');
	Route::get('/insumos_disponibles','InsumoController@getDisponibles')
			  ->name('insumos.getDisponibles');

	/* Categoria & Producto  */					
	Route::resource('/categorias', 'CategoriaController');
	Route::resource('/productos', 'ProductoController');
	Route::get('/productos_disponibles','ProductoController@getDisponibles')
			  ->name('productos.getDisponibles');

	/* Pedido Cliente  */					
	Route::resource('/pedidos', 'PedidoController');

    /** Revisar Pedidos */
	Route::resource('/revisarPedidos', 'RevisarPedidosController');
	Route::post('/approve_pedido', 'RevisarPedidosController@approvePedido')
			->name('revisarPedidos.approvePedido');
	Route::post('/reject_pedido', 'RevisarPedidosController@rejectPedido')
			->name('revisarPedidos.rejectPedido');
			
	/** RevisarStock */
	Route::resource('/revisarStock', 'RevisarStockController');

	 /** Seguir Pedidos */
	 Route::resource('/seguirPedidos', 'SeguirPedidosController');
	 Route::post('/ejecutar_pedido', 'SeguirPedidosController@ejecutarPedido')
	 ->name('seguirPedidos.ejecutarPedido');
	 Route::post('/aprobar_pedido', 'SeguirPedidosController@approvePedido')
	 ->name('seguirPedidos.approvePedido');
	 Route::post('/terminar_pedido', 'SeguirPedidosController@terminarPedido')
	 ->name('seguirPedidos.terminarPedido');

});
