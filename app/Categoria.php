<?php

namespace CorporacionPeru;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    protected $primaryKey = 'id';
    protected $fillable= ['id','nombre','active'];

    public function productos(){
        return $this->hasMany(Producto::class);
    }
}
