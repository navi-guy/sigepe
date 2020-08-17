@extends('layouts.main')

@section('title','Revisar Pedidos')

@section('styles')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@endsection

@section('breadcrumb')
<ol class="breadcrumb" style="background-color: white !important">
  <li><a href="{{ route('home.index') }}">Inicio</a></li>
  <li><a href="#" class="text-muted">Revisar Pedidos</a></li>
</ol>
@endsection

@section('content')
<section class="content">
  @include('revisarPedidos.table')
  {{-- modals --}}
  @include('revisarPedidos.modales.aprobar')
  @include('revisarPedidos.modales.rechazar')
  {{-- end.modals --}}
</section>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
  $('#tabla-revisarPedidos').DataTable({
      'language': {
               'url' : '//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json'
          }, info: false,
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
$('#modal_aprobar_pedido').on('show.bs.modal',function(event){
    console.log('Aprobar pedido: Mensaje de confirmación de aprobación de pedido.');
    const id= $(event.relatedTarget).data('id');
    $(event.currentTarget).find('#id_pedido_por_aprobar').val(id);
  });

$('#modal-rechazar-pedido').on('show.bs.modal',function(event){
    var id= $(event.relatedTarget).data('id');
    $(event.currentTarget).find('#id_pedido_rechazar').val(id);
  });
}); 

</script>
@endsection