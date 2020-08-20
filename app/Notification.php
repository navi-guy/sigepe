<?php

namespace CorporacionPeru;

use Illuminate\Support\Facades\Session;

class Notification
{
    const STATUS  = 'status';
    const ALERT   = 'alert-type';
    const SUCCESS = 'success';
    const WARNING = 'warning';
    const DANGER  = 'error';
    const INFO    = 'info';
    const TYPES_ALLOWED = [self::SUCCESS, self::WARNING, self::DANGER, self::DANGER];

    /**
     * Agregar a la sesión el tipo y mensaje especificado
     * @param string $type
     * @param string $message
     * @return void
     */
    public static function setAlertSession( $type = "" ,$message="" )
    {
        if (!in_array($type, self::TYPES_ALLOWED)){
            $type = 'error';
        }
        Session::flash(self::ALERT, $type);
        Session::flash(self::STATUS, $message);
    }


}
