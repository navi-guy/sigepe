<?php

namespace CorporacionPeru;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;
    const PASSWORD_ATTRIB = 'password';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'email', self::PASSWORD_ATTRIB,'trabajador_id','role_id'
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        self::PASSWORD_ATTRIB, 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function trabajador()
    {
    	return $this->belongsTo(Trabajador::class,'trabajador_id');
    }

    public function rol()
    {
        return $this->belongsTo(Role::class,'role_id');
    }

    public function setPasswordAttribute($value){ 
        $this->attributes[self::PASSWORD_ATTRIB]=bcrypt($value);
    }

    public function authorizeRoles($roles){
        abort_unless($this->hasAnyRole($roles), 401);
        return true;
    }

    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach($roles as $role){
                if($this->hasRole($role)){
                    return true;
                }
            }
        } else {
            return $this->hasRole($roles);
        }
        return false;
    }

    public function hasRole($role)
    {
        if ( $this->rol()->where('nombre', $role)->first()) {
            return true;
        }
        return false;
    }
}
