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
	Route::get('/home', 'HomeController@index')->name('home');
	/* Clientes*/
	Route::get('/clientes/all', 'ClienteController@getAllClientes');
	Route::get('/clientes/tipo/{tipo}', 'ClienteController@getByTipo');
	Route::resource('/clientes', 'ClienteController');

	/* Pedidos Clientes*/
	Route::put('/pedido_clientes/{id}/confirmar', 'PedidoClienteController@confirmarPedido')->name('pedido_clientes.confirmarPedido');
	Route::get('/pedido_clientes/cliente/{id}', 'PedidoClienteController@getByRazonSocial');
	Route::get('/pedido_clientes/detalles/{id}', 'PedidoClienteController@getDetalles')->name('pedido_clientes.detalles');
	Route::resource('/pedido_clientes', 'PedidoClienteController');

	/* Trabajadores*/
	Route::resource('/trabajadores', 'TrabajadorController');
	Route::resource('/users', 'UserController');

	/* Proveedor & planta */	
	Route::resource('/proveedores', 'ProveedorController');
	Route::resource('/planta', 'PlantaController');

	/* Pedido Proveedor  */					
	Route::resource('/pedidos', 'PedidoController');

	/* Categoria & Producto  */					
	Route::resource('/categorias', 'CategoriaController');
	Route::resource('/productos', 'ProductoController');

});
