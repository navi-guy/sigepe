<?php

namespace CorporacionPeru;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pedido extends Model
{
    protected $table = 'pedidos';
    protected $fillable= ['id','cod_pedido','fecha', 
    							'nombre_cli', 'direccion_cli','telefono_cli' , 'ruc_cli' ,
                                'estado_pedido', 'monto_bruto', 
    							'descuento','monto_neto'];

   
    public function productos(){
        return $this->belongsToMany(Producto::class,'productos_pedido')->withPivot('cantidad','pu','monto');
    }

    public function getPrecioTotalBruto(){
        $productos = $this->productos;
        $total_bruto = 0;
        foreach ($productos as $producto) {
            $total_bruto += $producto->pivot->monto; 
        }
        return $total_bruto;
    }

    public function getPrecioTotalNeto(){
        return $this->monto_bruto-$this->descuento;
    }

    public function getNewCodigo($last_id=0){
        $current_pedido_id = $last_id + 1;
        $num_pedido = str_pad($current_pedido_id, 6, "0", STR_PAD_LEFT);
        $cod_pedido =   'FISI-PED-'. $num_pedido;   
        return $cod_pedido;
    }

    public function getEstado(){
        $result="";
        switch($this->estado_pedido){
                       
          case 1:
                $result="En espera";
                break;
          case 2: 
                 $result="Aprobado";
                 break;
          case 3: 
                 $result="Rechazado";
                 break;
         case 4: 
                 $result="Esperando insumos";
                 break;
         case 5: 
                $result="En Ejecución";
                break;
         case 6: 
                $result="Terminado";
                break;
        }
        return $result;
    }

    public function isUnconfirmed(){
        return $this->estado_pedido==1;
    }  

    public function isFinished(){
        return $this->estado_pedido==6;
    }  
    
    
    public function isAprobed(){
        return $this->estado_pedido==2;
    }

    public function isRejected(){
        return $this->estado_pedido==3;
    }  
    
    public function isEsperaInsumos(){
        return $this->estado_pedido==4;
    }  
    
    public function isEjecucion(){
        return $this->estado_pedido==5;
    }

    public function isTerminado(){
        return $this->estado_pedido==6;
    }     
}
