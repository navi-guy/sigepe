@extends('layouts.main')

@section('title','Pedidos')

@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('dist/css/alt/AdminLTE-select2.min.css')}}">
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@endsection

@section('breadcrumb')
<ol class="breadcrumb">
  <li><a href="{{ route('home.index') }}">Inicio</a></li>
  <li><a href="#" class="text-muted">Pedidos</a></li> 
</ol>
@endsection

@section('content')
<section class="content-header">
    <a href="{{ route('pedidos.create') }}">
      <button class="btn bg-olive pull-left">
      <span class="fa fa-plus"></span> &nbsp; Añadir pedido
      </button>
    </a> 
    <p><br></p>
</section>
<section class="content">
  @include('pedidos.table')
</section>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
<script>
$(document).ready(function() {
  $('#tabla-pedidos').DataTable({
      'language': {
               'url' : '//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json'
          },
        columnDefs: [
          { orderable: false, targets: -1},
          { searchable: false, targets: [-1]},
          { responsivePriority: 1, targets: [0,-1] },
          { responsivePriority: 2, targets: [1,2] },
          { responsivePriority: 3, targets: 4},
          { responsivePriority: 4, targets: [7] },
          { responsivePriority: 1001, targets: 2 }         
        ]
  });


});
  function confirmarDeletePedido(){
    if(confirm('¿Estás seguro de eliminar el pedido?'))
      return true;
    else
      return false;
    
  }
</script>
@endsection