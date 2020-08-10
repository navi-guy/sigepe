<?php

namespace CorporacionPeru;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id';
    protected $fillable= ['id','nombre','categoria_id' , 'material' ,'unidad_medida',
                         'descripcion', 'image', 'precio_unitario'];


    // public function producto_insumo()
    // {
    //     return $this->hasMany(ProductoInsumo::class);
    // } 

    public function insumos()
    {
        return $this->belongsToMany(Insumo::class,'producto_insumos');
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
