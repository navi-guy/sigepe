@extends('layouts.main')

@section('title','Pedidos')

@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('dist/css/alt/AdminLTE-select2.min.css')}}">
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@endsection

@section('breadcrumb')
<ol class="breadcrumb">
  <li><a href="{{ route('pedidos.index') }}">Pedidos</a></li>
</ol>
@endsection

@section('content')
<section class="content-header">
    <h3>Editar Pedido</h3>
</section>
<section class="content">
  En construcción
 {{--  @include('pedidos.table') --}}
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
          { responsivePriority: 1, targets: -1 },
          { responsivePriority: 2, targets: 2 },
          { responsivePriority: 3, targets: 3 },
          { responsivePriority: 4, targets: 4 }          
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