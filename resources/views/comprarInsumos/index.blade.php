@extends('layouts.main')

@section('title','Comprar Insumos')

@section('styles')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@endsection

@section('breadcrumb')
<ol class="breadcrumb" style="background-color: white !important">
  <li><a href="{{ route('home.index') }}">Inicio</a></li>
  <li><a href="{{ route('proveedores.index') }}">Proveedores</a></li>
  <li><a href="#" class="text-muted">Comprar Insumos</a></li>
</ol>
@endsection

@section('content')
<section class="content-header">
</section>
<section class="content">
  @include('comprarInsumos.table')
  <!-- Modales -->
  @include('comprarInsumos.modales.aceptar')
  @include('comprarInsumos.modales.rechazar')
  <!-- end.Modales -->   
</section>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
//sidebar
  $('#treeview-proveedores').addClass("active").addClass("menu-open");
  document.getElementById('treeview-menu-proveedores').style.display = 'block';
  $('#sidebar-btn-insumos-proveedores').addClass("active");  
//end sidebar
  var table = $('#tabla-insumos-solicitados').DataTable({
    // "order": [[ 3 , "asc" ]], 
    'language': {
      'url' : '//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json'
    }
  });
});

</script>
@endsection