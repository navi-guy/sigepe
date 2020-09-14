<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIGEPE | {{ __('Login') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('iconoCorp.ico') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('adminlte/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/Ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">


    <link rel="stylesheet" href="{{ asset('adminlte/plugins/iCheck/square/blue.css') }}">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            font-size: 16px;
        }

        li {
            padding: 6px 0px 6px 0px;
        }

    </style>
</head>

<body class="hold-transition login-page" style="background:url('dist/img/background/background2.jpg'); 
      background-position: center;
        background-repeat: no-repeat;
        background-size: cover;">
    <div class="login-box" style="margin: 0;position: absolute;top: 50%;left: 50%;-ms-transform: translate(-50%, -50%);transform: translate(-50%, -50%);">
        <div class="login-box-body" style="border-radius: 1em!important;">
            <div style="text-align: center;">
                <p class="login-box-msg" style="font-size: 200%;
           font-weight: thin; color: black;"><strong>SIGEPE</strong></p>
                <img src="{{ asset('dist/img/icons/key.png') }}" alt=“icono de llave”
                    style="width: 20%; height: auto;" />
            </div>
            <br>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group has-feedback">
                    <label for="exampleInputEmail1">CORREO ELECTRÓNICO</label>
                    <input id="email" name="email" type="email" class="form-control"
                        placeholder="Ingrese su correo electrónico">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @error('email')
                    <label class="label-danger" role="alert" style="padding: 5px;font-weight: 400;width: 100%;text-align: center;font-size: 13.5px;">
                        {{ $message }}
                    </label>
                    @enderror
                </div>
                <div class="form-group has-feedback">
                    <label for="exampleInputPassword1">CONTRASEÑA</label>
                    <input id="password" name="password" type="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @error('password')
                    <label class="label-danger" role="alert" style="padding: 5px;font-weight: 400;width: 100%;text-align: center;font-size: 13.5px;">
                        {{ $message }}
                    </label>
                    @enderror
                </div>
                <br>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn bg-navy btn-lg btn-block">{{ __('Iniciar sesión') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('adminlte/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%'
            });
        });

    </script>
</body>

</html>
