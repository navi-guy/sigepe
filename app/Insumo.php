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
