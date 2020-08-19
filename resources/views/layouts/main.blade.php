<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIGEPE | @yield('title')</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" nombres="viewport">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('iconoCorp.ico') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/skins/skin-green.min.css') }}">
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900italic,900' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
  <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet"/>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
  @yield('styles')
  <style>body {font-family: 'Roboto', sans-serif;font-size: 14px;} li{padding: 6px 0px 6px 0px}</style>
</head>
<body class="hold-transition skin-green sidebar-mini">

<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo" style="font-size: 15px; background-color: #171717!important;">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>P</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b style="font-size: 20px;">SIGEPE</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation" style="font-size: 15px; background-color: #171717!important;">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="{{asset('dist/img/iconoCorp.png')}}" class="user-image" alt="User Image">
              <!-- hidden-xs hides the usernombres on small devices so only the image appears. -->
              <span class="hidden-xs">{{ Auth::user()->trabajador->nombres }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="{{asset('dist/img/iconoCorp.png')}}" class="img-circle" alt="User Image">
                <p>
                  {{ Auth::user()->trabajador->nombres }}
                  <small>{{ Auth::user()->trabajador->created_at }}</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Home</a>
                </div>
                <div class="pull-right">
                  <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-default btn-flat">{{ __('Salir') }}</button>
                  </form>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
    <div class="bg-orange" style="font-size: 5px; background-color: #3d9970!important;" align="right"> <label> </label></div>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar" style="font-size: 15px; background-color: #171717!important;">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <br>

      <ul class="sidebar-menu" data-widget="tree">

        <li><a href="{{route('home.index')}}"><i class="fa fa-bar-chart"></i> <span>Panel de Control</span> </a>
        </li>
        
        <li id="treeview-proveedores" class="treeview">
          <a href="#">
            <i class="fa fa-truck"></i> <span>Proveedores</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li><a href="{{route('proveedores.index')}}"><i class="fa fa-th-large"></i>Proveedores</a></li>
            <li><a href="{{route('proveedores.index')}}"><i class="fa fa-th-large"></i>Insumos/Proveedores</a></li>
          </ul>
        </li> 

        <li id="treeview-productos" class="treeview">
          <a href="#">
            <i class="fa fa-archive"></i> <span>Productos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li id="categorias"><a href="{{route('categorias.index')}}"><i class="glyphicon glyphicon-tasks"></i>Categorías</a></li>
            <li id="productos"><a href="{{route('productos.index')}}"><i class="glyphicon glyphicon-tag"></i>Productos</a></li>
          </ul>
        </li>      
        <li id="stock-insumos"><a href="{{route('revisarStock.index')}}"><i class="glyphicon glyphicon-search"></i><span>Stock de insumos</span> </a></li>       
        <li id="registrar-pedidos"><a href="{{route('pedidos.index')}}"><i class="fa fa-cart-plus"></i><span>Registrar pedidos</span> </a></li>   
        <li id="treeview-revision-pedidos" class="treeview">
          <a href="#">
            <i class="fa fa-first-order"></i> <span>Revisión de pedidos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li><a href="{{route('revisarPedidos.index')}}"><i class="fa fa-check-square"></i>Evaluación de pedidos</a></li>
            <li><a href="{{route('seguirPedidos.index')}}"><i class="fa fa-check-square"></i>Ejecución de Pedidos</a></li>
          </ul>
        </li> 
        <li id="treeview-usuarios" class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Usuarios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li><a href="{{route('trabajadores.index')}}"><i class="fa fa fa-user"></i>Roles de usuario</a></li>
            <li><a href="{{route('trabajadores.index')}}"><i class="fa fa fa-user"></i>Usuarios</a></li>
          </ul>
        </li>        
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color: white !important">
    <!-- Content Header (Page header) -->
      @yield('breadcrumb')
    <!-- Main content -->
      @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      <strong>Versión</strong> 1.0.0 Beta
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2020 <a href="#">SIGEPE</a></strong>
  </footer>

  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<script src="{{ asset('adminlte/jquery/jquery.min.js') }}" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="{{ asset('adminlte/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.js"></script>
<script>
 $.datepicker.regional['es'] = {
  closeText: 'Cerrar',
  prevText: '< Ant',
  nextText: 'Sig >',
  currentText: 'Hoy',
  monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
  monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
  dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
  dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
  dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
  weekHeader: 'Sm',
  dateFormat: 'dd/mm/yy',
  firstDay: 1,
  isRTL: false,
  showMonthAfterYear: false,
  yearSuffix: ''
 };
 $.datepicker.setDefaults($.datepicker.regional['es']);
 $('.box').on('click',function(){
  $('.box').removeClass('box-success');
  $(this).addClass('box-success');
})
</script>
@yield('scripts')
@include('partials.session-status')
</body>
</html>
