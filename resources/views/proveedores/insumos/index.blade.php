@extends('layouts.main')

@section('title','Insumos')
@section('styles')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<style  rel="stylesheet" type="text/css">
  .mandatory {
    color: red;
    font-weight: bold;
  }
</style>
@endsection
@section('breadcrumb')
<ol class="breadcrumb" style="background-color: white !important"> 
  <li><a href="{{ route('home.index') }}">Inicio</a></li>
  <li><a href="{{ route('proveedores.index') }}">Proveedores</a></li>
  <li><a href="#"  class="text-muted">Insumos asignados</a></li>
</ol>
@endsection

@section('content')
<section class="content-header">
        <a href="{{route('proveedores.index')}}">
            <button class="btn bg-olive pull-right">
            VOLVER PROVEEDORES &nbsp; <span class="fa fa-reply"></span>
            </button>
    </a> 
    <h3>&nbsp;&nbsp;Insumos proveidos por  
      <span class="label label-primary">{{$proveedor->razon_social}}</span>

    </h3>

</section>
<section class="content">
  @include('proveedores.insumos.show')
</section>
@endsection

@section('scripts')
<script>
  function confirmarDeleteInsumo(){
  if(confirm('¿Realmente quieres quitar este insumo de la lista de insumos del proveedor?'))
    return true;
  else
    return false;
}
</script>
@endsection


