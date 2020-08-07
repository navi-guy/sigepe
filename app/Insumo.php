<?php

namespace CorporacionPeru;

use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    protected $table = 'insumos';
    protected $primaryKey = 'id';
    protected $fillable= ['id', 'nombre','unidad_medida' ,'cantidad'];

    public function getUnidadMedida(){
        $result="";
        switch($this->unidad_medida){
           
            case 2: 
                $result="Medidas en Litro (L)";
                break;
            case 1: 
                $result="Medidas en Kilogramo (Kg)";
                break;
            case 0:
                $result="Unidad (u)";
                break;
        }
        return $result;
    }
}
