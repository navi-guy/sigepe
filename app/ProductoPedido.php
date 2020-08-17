<?php

namespace CorporacionPeru;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ProductoPedido extends Model
{
    protected $table = 'productos_pedido';
    protected $fillable= ['pedido_id','producto_id','cantidad'];  
}
