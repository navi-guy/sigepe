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

	/* Trabajadores*/
	Route::resource('/trabajadores', 'TrabajadorController');
	Route::resource('/users', 'UserController');

	/* Proveedor & planta */	
	Route::resource('/proveedores', 'ProveedorController');
	Route::resource('/planta', 'PlantaController');

	/* Pedido Proveedor  */					
	Route::resource('/pedidos', 'PedidoController');
	Route::get('/procesar/{id}', 'PedidoController@confirmarPedido')->name('pedidos.confirmarPedido');

	/* Categoria & Producto  */					
	Route::resource('/categorias', 'CategoriaController');
	Route::resource('/productos', 'ProductoController');
	Route::get('/productos_disponibles','ProductoController@getDisponibles')
			  ->name('productos.getDisponibles');

	/** Insumos */
	Route::resource('/insumos', 'InsumoController');
	Route::get('/insumos_disponibles','InsumoController@getDisponibles')
			  ->name('insumos.getDisponibles');

	/** RevisarStock */
	Route::resource('/revisarStock', 'RevisarStockController');
});
