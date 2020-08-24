<?php

namespace CorporacionPeru;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Trabajador extends Model
{
    protected $table = 'trabajadores';
    protected $fillable=[ 'dni','nombres','apellido_paterno','apellido_materno',
        'telefono','genero','email','direccion'
    ];

    public function user()
    {
    	return $this->hasOne(User::class,'trabajador_id');
    }

    public function hasAccount()
    {
    	return $this->user!=null;
    }

}
