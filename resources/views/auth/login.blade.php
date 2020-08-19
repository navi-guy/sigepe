<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIGEPE | {{ __('Login') }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('iconoCorp.ico') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{ asset('adminlte/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('adminlte/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css')}}">
    
    <link rel="stylesheet" href="{{ asset('dist/css/main.css')}}">
    <link rel="stylesheet" href="{{ asset('dist/css/util.css')}}">

    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/iCheck/square/blue.css')}}">
    <style>body {font-family: 'Roboto', sans-serif;font-size: 16px;} li{padding: 6px 0px 6px 0px}</style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page" style=
     "background:url('dist/img/background/background2.jpg'); 
      background-position: center;
        background-repeat: no-repeat;
        background-size: cover;">
    <div class="login-box" >
      <div class="login-box-body" style="border-radius: 1em!important; width: 120%; %;">
        <div align="center">
           <p class="login-box-msg"  style="font-size: 200%;
           font-weight: thin; color: black;">Sistema de Gestión de Pedidos</p>
        <img src="{{ asset('dist/img/icons/key.png')}}" style="width: 20%; height: auto;" />
        </div>
        <br>
        <form action="{{ route('login') }}" method="post">
          @csrf
          <div class="form-group has-feedback">
            <label for="exampleInputEmail1">CORREO ELECTRÓNICO</label>
            <input id="email" name="email" type="email" class="form-control" placeholder="Ingrese su correo electrónico">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group has-feedback">
            <label for="exampleInputPassword1">CONTRASEÑA</label>
            <input id="password" name="password" type="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <br>
          <div class="row">
            <div class="col-xs-12">
              <button type="submit" class="btn bg-navy btn-lg btn-block" >{{ __('Iniciar sesión') }}</button>
            </div><!-- /.col -->
          </div>
        </form>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="{{ asset('adminlte/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset('adminlte/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{ asset('adminlte/plugins/iCheck/icheck.min.js')}}"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
