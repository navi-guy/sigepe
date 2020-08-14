<?php

namespace CorporacionPeru;

use Illuminate\Database\Eloquent\Model;
use CorporacionPeru\Planta;

class Proveedor extends Model
{
    protected $table = 'proveedores';
    protected $primaryKey = 'id';
    protected $fillable= ['id','razon_social','ruc' , 'deuda' ,'representante', 'email',
                         'direccion', 'tipo'];


    public function plantas()
    {
    	//return $this->hasMany('App\PlantaModel', 'id_empleado');
    	return $this->hasMany(Planta::class,'proveedor_id');
    } 

    public function insumos()
    {
        return $this->belongsToMany(Insumo::class,'insumos_proveedor')->withPivot('id','precio_compra');
    }

    public function getTipo(){
        $result="";
        switch($this->tipo){
            case 2: 
                $result="Fábrica";
                break;
            case 1:
                $result="Mecánica";
                break;
        }
        return $result;
    }
}

