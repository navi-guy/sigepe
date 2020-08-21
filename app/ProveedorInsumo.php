<?php

namespace CorporacionPeru;

use Illuminate\Database\Eloquent\Model;
use CorporacionPeru\Planta;

class ProveedorInsumo extends Model
{
    protected $table = 'insumos_proveedor';
    protected $primaryKey = 'id';
    protected $fillable= ['id','insumo_id','proveedor_id','precio_compra', 'cantidad', 'estado'];


    public function proveedores()
    {
        return $this->belongsToMany(Proveedor::class,'proveedor_id');
    } 

    public function insumos()
    {
        return $this->belongsToMany(Insumo::class);
    }

}

