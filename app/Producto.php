<?php

namespace CorporacionPeru;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    const IMAGE = 'image'; 
    protected $table = 'productos';
    protected $primaryKey = 'id';
    protected $fillable= ['id','nombre','categoria_id' , 'material' ,'unidad_medida',
                         'descripcion', 'image', 'precio_unitario'];


    public function insumos()
    {
        return $this->belongsToMany(Insumo::class,'producto_insumos')->withPivot('cantidad');
    }   

    public function pedidos(){
        return $this->belongsToMany(Pedido::class,'productos_pedido')->withPivot('cantidad','pu','monto');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }  

    public function getMaterial(){
        $result="";
        switch($this->material){
            case 3: 
                $result="Material de Cobre";
                break;
            case 2: 
                $result="Material de Acero";
                break;
            case 1:
                $result="Material de Laton";
                break;
        }
        return $result;
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
