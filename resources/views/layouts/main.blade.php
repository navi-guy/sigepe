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
  <link rel="stylesheet" href="{{ asset('adminlte/datatable/DataTables-1.10.21/css/datatables.bootstrap.min.css') }}"/>
  <link rel="stylesheet" href="{{ asset('adminlte/datatable/Responsive-2.2.5/css/responsive.bootstrap.min.css') }}"/>
  @yield('styles')
  @toastr_css
  <style>body {font-family: 'Roboto', sans-serif;font-size: 14px;} li{padding: 6px 0px 6px 0px}</style>
</head>
<body class="hold-transition skin-green sidebar-mini">

<div class="wrapper">
  <header class="main-header">

    <a href="#" class="logo" style="font-size: 15px; background-color: #171717!important;">
      <img class="logo-mini img-circle" src="{{asset('dist/img/iconoCorp.png')}}" width="50px">
      <span class="logo-lg"><b style="font-size: 20px;">SIGEPE</b></span>
    </a>

    <nav class="navbar navbar-static-top" role="navigation" style="font-size: 15px; background-color: #171717!important;">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{asset('dist/img/iconoCorp.png')}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->trabajador->nombres }}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="{{asset('dist/img/iconoCorp.png')}}" class="img-circle" alt="User Image">
                <p>
                  {{ Auth::user()->trabajador->nombres }}
                  <small>{{ Auth::user()->trabajador->created_at }}</small>
                </p>
              </li>
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
    <div style="font-size: 4px; background-color: #3d9970!important;" align="right"><label></label>
    </div>
  </header>
  <aside class="main-sidebar" style="font-size: 15px; background-color: #171717!important;">

    <section class="sidebar">
      <br>

      <ul class="sidebar-menu" data-widget="tree">

        <li id="sidebar-btn-panel-control"><a href="{{route('home.index')}}"><i class="fa fa-bar-chart"></i> <span>Panel de Control</span> </a>
        </li>
        
        <li id="treeview-proveedores" class="treeview">
          <a href="#">
            <i class="fa fa-truck"></i> <span>Proveedores</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" id="treeview-menu-proveedores" style="display: none;">
            <li id="sidebar-btn-proveedores"><a href="{{route('proveedores.index')}}"><i class="fa fa-th-large"></i>Proveedores</a></li>
            <li id="sidebar-btn-insumos-proveedores"><a href="{{route('comprar_insumos.index')}}"><i class="fa fa-cubes"></i>Insumos/Proveedores</a></li>
          </ul>
        </li> 

        <li id="treeview-productos" class="treeview">
          <a href="#">
            <i class="fa fa-archive"></i> <span>Productos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul id="treeview-menu-productos" class="treeview-menu" >
            <li id="sidebar-btn-categorias"><a href="{{route('categorias.index')}}"><i class="glyphicon glyphicon-tasks"></i>Categorías</a></li>
            <li id="sidebar-btn-productos"><a href="{{route('productos.index')}}"><i class="glyphicon glyphicon-tag"></i>Productos</a></li>
          </ul>
        </li>      
        <li id="sidebar-btn-stock-insumos"><a href="{{route('revisarStock.index')}}"><i class="glyphicon glyphicon-search"></i><span>Stock de insumos</span> </a></li>       
        <li id="sidebar-btn-registrar-pedidos"><a href="{{route('pedidos.index')}}"><i class="fa fa-cart-plus"></i><span>Registrar pedidos</span> </a></li>   
        <li id="treeview-revisar-pedidos" class="treeview">
          <a href="#">
            <i class="fa fa-first-order"></i> <span>Revisión de pedidos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" id="treeview-menu-revisar-pedidos" style="display: none;">
            <li id="sidebar-btn-evaluar-pedidos"><a href="{{route('revisarPedidos.index')}}"><i class="fa fa-check-square"></i>Evaluación de pedidos</a></li>
            <li id="sidebar-btn-ejecutar-pedidos"><a href="{{route('seguirPedidos.index')}}"><i class="fa fa-cogs"></i>Ejecución de Pedidos</a></li>
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
            <li  id="sidebar-btn-roles-usuarios"><a href="{{route('trabajadores.index')}}"><i class="fa fa fa-user"></i>Roles de usuario</a></li>
            <li  id="sidebar-btn-usuarios"><a href="{{route('trabajadores.index')}}"><i class="fa fa fa-user"></i>Usuarios</a></li>
          </ul>
        </li>        
      </ul>

    </section>

  </aside>


  <div class="content-wrapper" style="background-color: white !important">

      @yield('breadcrumb')

      @yield('content')

  </div>



  <footer class="main-footer">

    <div class="pull-right hidden-xs">
      <strong>Versión</strong> 1.0.0 Beta
    </div>
    <strong>Copyright &copy; 2020 <a href="#">SIGEPE</a></strong>
  </footer>

  <div class="control-sidebar-bg"></div>
</div>

<script src="{{ asset('adminlte/jquery/jquery.min.js') }}" ></script>
<script src="{{ asset('adminlte/jquery/jquery-ui.min.js') }}" ></script>
@toastr_js
<script src="{{ asset('adminlte/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('adminlte/datatable/DataTables-1.10.21/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminlte/datatable/DataTables-1.10.21/js/datatables.bootstrap.min.js') }}"></script>
<script src="{{ asset('adminlte/datatable/Responsive-2.2.5/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('adminlte/datatable/Responsive-2.2.5/js/responsive.bootstrap.min.js') }}"></script>

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
function removeActiveSideBarButtons(){
  $('#sidebar-btn-panel-control').removeClass("active");
  $('#treeview-proveedores').removeClass("active");
  $('#treeview-productos').removeClass("active");
  $('#stock-insumos').removeClass("active");
  $('#registrar-pedidos').removeClass("active");
  $('#treeview-revision-pedidos').removeClass("active"); 
  $('#treeview-usuarios').removeClass("active");
}

</script>
@yield('scripts')
@include('partials.session-status')
</body>
</html>
