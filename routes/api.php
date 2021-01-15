<?php

use Illuminate\Http\Request;


/* PRODUCTOS  */	
# Lista de productos disponibles
# /api/productos_disponibles 	
Route::get('/productos','ProductoController@getDisponibles');

# Lista de productos por categoria
# /api/productos_by_categoria/{id} 
Route::get('/productos_by_categoria/{id}','ProductoController@productosByCategoria');

# Detalles de un producto
# /api/productos/{id}
Route::get('/producto_details/{id}','ProductoController@getDetails');

	/* PEDIDOS  */	
# Crear un pedido
# /api/pedidos 
Route::post('/pedidos','PedidoController@savePedido');

# Lista de pedidos
# /api/pedidos 
Route::get('/pedidos','PedidoController@getAllPedidos');