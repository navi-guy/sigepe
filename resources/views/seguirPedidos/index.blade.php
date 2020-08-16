@extends('layouts.main')

@section('title','Ejecutar Pedidos')

@section('styles')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@endsection

@section('breadcrumb')
<ol class="breadcrumb" style="background-color: white !important">
  <li><a href="{{ route('home.index') }}">Inicio</a></li>
  <li><a href="#" class="text-muted">Ejecutar Pedidos</a></li>
</ol>
@endsection

@section('content')
<section class="content">
  @include('seguirPedidos.table')
  {{-- modals --}}
   @include('seguirPedidos.modales.aprobar')
   @include('seguirPedidos.modales.terminar')  
   @include('seguirPedidos.modales.ejecutar') 
  {{-- end.modals --}}
</section>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
  $('#tabla-seguirPedidos').DataTable({
      'language': {
               'url' : '//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json'
          },
        columnDefs: [
          { orderable: false, targets: -1},
          { searchable: false, targets: [-1]},
          { responsivePriority: 1, targets: [0,-1] },
          { responsivePriority: 2, targets: [1,2] },
          { responsivePriority: 3, targets: 4},
          // { responsivePriority: 4, targets: [7] },
          { responsivePriority: 1001, targets: 2 }         
        ]
  });
  
$('#modal-aprobar-pedido').on('show.bs.modal',function(event){
    const id= $(event.relatedTarget).data('id');
    $(event.currentTarget).find('#id_pedido').val(id);
  });

// $('#modal-rechazar-pedido').on('show.bs.modal',function(event){
//     var id= $(event.relatedTarget).data('id');
//     $(event.currentTarget).find('#id_pedido').val(id);
//   });
  $('#modal-ejecutar-pedido').on('show.bs.modal',function(event){
    var id= $(event.relatedTarget).data('id');
    $(event.currentTarget).find('#id_pedido').val(id);
  });

  $('#modal-terminar-pedido').on('show.bs.modal',function(event){
    var id= $(event.relatedTarget).data('id');
    $(event.currentTarget).find('#id_pedido').val(id);
  });

}); 

</script>
@endsection