@extends('layouts.main')

@section('title','Proveedores')

@section('styles')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@endsection

@section('breadcrumb')
<ol class="breadcrumb" style="background-color: white !important">
  <li><a href="{{ route('home.index') }}">Inicio</a></li>
  <li><a href="#"  class="text-muted">Proveedores</a></li>
</ol>
@endsection

@section('content')
<section class="content-header">
      <a href="{{ route('proveedores.create') }}">
      <button class="btn bg-olive pull-left">
      <span class="fa fa-plus"></span> &nbsp; Nuevo proveedor
      </button>
    </a> 
    <p><br></p>
</section>
<section class="content">
  @include('proveedores.table')
  <!-- Modales-->
  @include('proveedores.edit')
  <!--/.end-modales-->
</section>
<!-- BOTONES EN views/actions/proveedor  -->
@endsection
@section('scripts')
<script src="{{ asset('js/proveedor.js') }}"></script> 
@if( count($errors) > 0 )
  <script type="text/javascript">
      $('#modal-edit-proveedor').modal('show');
  </script>
@endif
<script>

$(document).ready(function() {
//sidebar
  $('#treeview-proveedores').addClass("active").addClass("menu-open");
  document.getElementById('treeview-menu-proveedores').style.display = 'block';
  $('#sidebar-btn-proveedores').addClass("active");  
//end sidebar
});
function confirmarDeleteProveedor(){
  if(confirm('¿Realmente quieres eliminar este proveedor?'))
    return true;
  else
    return false;
}
</script>
@endsection

