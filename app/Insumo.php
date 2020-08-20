<?php

namespace CorporacionPeru;

use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    protected $table = 'insumos';
    protected $primaryKey = 'id';
    protected $fillable= ['id', 'nombre','unidad_medida' ,'cantidad'];

    public function productos(){
        return $this->belongsToMany(Producto::class, 'producto_insumos');
    }

    public function proveedores(){
        return $this->belongsToMany(Proveedor::class, 'insumos_proveedor')->withPivot('precio_compra');;
    }

    public function proveedorInsumo(){
        return $this->hasMany(ProveedorInsumo::class, 'insumo_id');
    }

    /**
     * Scope a query to only include insumos disponibles
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDisponibles($query)
    {
        return $query->where('cantidad', '>', 0);
    }

    public function getUnidadMedida(){
        $result="";
        switch($this->unidad_medida){
           
           case 3:
                $result="Metros cúbicas (m3)";
                break;
            case 2: 
                $result="Pulgadas (µm)";
                break;
            case 1: 
                $result="Toneladas (Tn)";
                break;
            case 0:
                $result="Unidad (u)";
                break;
        }
        return $result;
    }
}
