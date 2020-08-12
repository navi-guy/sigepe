@extends('layouts.main')

@section('title','Proveedores')

@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('dist/css/alt/AdminLTE-select2.min.css')}}">
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@endsection

@section('breadcrumb')
<ol class="breadcrumb">
  <li><a href="{{ route('home.index') }}">Inicio</a></li>
  <li><a href="#"  class="text-muted">Proveedores</a></li>
</ol>
@endsection

@section('content')
<section class="content-header">
      <a href="{{ route('proveedores.create') }}">
      <button class="btn bg-olive pull-left">
      <span class="fa fa-plus"></span> &nbsp; AÑADIR PROVEEDOR
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
<script src="{{ asset('js/proveedor.js') }}"></script> 
@if( count($errors) > 0 )
  <script type="text/javascript">
      $('#modal-edit-proveedor').modal('show');
  </script>
@endif
<script>
function confirmarDeleteProveedor(){
  if(confirm('¿Realmente quieres eliminar este proveedor?'))
    return true;
  else
    return false;
}
</script>
@endsection

