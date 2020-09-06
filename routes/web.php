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

	Route::group(['middleware' => ['role:Admin,JefeCompras']], function () {
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
	});
	
	Route::group(['middleware' => ['role:JefeProduccion,Admin']], function () {
		/* Categoria & Producto  */					
		Route::resource('/categorias', 'CategoriaController');
		Route::resource('/productos', 'ProductoController');
		Route::get('/productos_disponibles','ProductoController@getDisponibles')
				  ->name('productos.getDisponibles');
	});

	Route::group(['middleware' => 'role:Admin,AtencionCliente'], function () {
		/* Pedido Cliente  */					
		Route::resource('/pedidos', 'PedidoController');
	});

	Route::group(['middleware' => 'role:Admin,AtencionCliente,JefeProduccion,OperarioProduccion'], function () {
		/* Solo visualizar pedidos */					
		Route::get('/visualizar_pedido/{id}/tipo/{type}', 'PedidoController@visualizarPedido')
				->name('pedidos.visualizarPedido');
	});

	Route::group(['middleware' => ['role:Admin,JefeProduccion']], function () {
    	/** Revisar Pedidos */
		Route::resource('/revisarPedidos', 'RevisarPedidosController');
		Route::post('/approve_pedido', 'RevisarPedidosController@approvePedido')
				->name('revisarPedidos.approvePedido');
		Route::post('/reject_pedido', 'RevisarPedidosController@rejectPedido')
				->name('revisarPedidos.rejectPedido');
	});
	

	Route::group(['middleware' => 
			['role:Admin,JefeCompras,JefeProduccion,OperarioProduccion']], function () {
					/** Insumos */
		Route::resource('/insumos', 'InsumoController');
		Route::get('/insumos_disponibles','InsumoController@getDisponibles')
				  ->name('insumos.getDisponibles');
			/** Revisar Stock  */
		Route::resource('/revisarStock', 'RevisarStockController');

	});

	Route::group(['middleware' => ['role:Admin,OperarioProduccion']], function () {
		 /** Seguir Pedidos */
		Route::resource('/seguirPedidos', 'SeguirPedidosController');
		Route::post('/ejecutar_pedido', 'SeguirPedidosController@ejecutarPedido')
				->name('seguirPedidos.ejecutarPedido');
		Route::post('/aprobar_pedido', 'SeguirPedidosController@approvePedido')
				->name('seguirPedidos.approvePedido');
		Route::post('/terminar_pedido', 'SeguirPedidosController@terminarPedido')
				->name('seguirPedidos.terminarPedido');
	});

	Route::group(['middleware' => ['role:Admin']], function () {
		/* Trabajadores and users*/
		Route::resource('/trabajadores', 'TrabajadorController');
		Route::resource('/users', 'UserController');
	});
});
