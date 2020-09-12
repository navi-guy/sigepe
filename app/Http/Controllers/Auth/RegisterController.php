<?php

namespace CorporacionPeru\Http\Controllers\Auth;

use CorporacionPeru\User;
use CorporacionPeru\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    const CORREO = 'correo electrónico';
    const CONTRASENA = 'password';

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            self::CORREO => ['required', 'string', self::CORREO, 'max:255', 'unique:users'],
            self::CONTRASENA => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \CorporacionPeru\User
     */
    protected function create(array $data)
    {
        return User::create([
            self::CORREO => $data[self::CORREO],
            self::CONTRASENA => Hash::make($data[self::CONTRASENA]),
            'trabajador_id'=>$data['trabajador_id']
        ]);
    }
}
