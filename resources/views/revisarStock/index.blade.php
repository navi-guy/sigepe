@extends('layouts.main')

@section('title','Revisar Stock')

@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('dist/css/alt/AdminLTE-select2.min.css')}}">
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@endsection

@section('breadcrumb')
<ol class="breadcrumb">
  <li><a href="{{ route('home.index') }}">Inicio</a></li>
  <li><a href="#" class="text-muted">Revisar Stock</a></li>
</ol>
@endsection

@section('content')
<section class="content-header">

</section>
<section class="content">
  @include('revisarStock.table')
  @include('revisarStock.insumo_proveedor')
</section>
@endsection
{{-- <section class="content">
  @include('revisarStock.table')
</section>
@endsection --}}

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
<script>
/*
$(document).ready(function() {
 $('#tabla-productos').DataTable({
      'language': {
               'url' : '//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json'
          }
  });

  function confirmarDeleteProducto(){
    if(confirm('¿Estás seguro de eliminar producto?'))
      return true;
    else
      return false;
  }
});*/

//$(document).ready(function() {
//  $('#tabla-stock').DataTable();


 /*
  $('#modal-edit-categoria').on('show.bs.modal',function(event){
    var id= $(event.relatedTarget).data('id');
    console.log(id);
    $.ajax({
      type: 'GET',
      url:`./categorias/${id}/edit`,
      dataType : 'json',

      success: (data)=>{
        console.log(data);
        document.getElementById('nombre-edit').value = data.categoria.nombre;
        document.getElementById('id-edit').value = data.categoria.id;
      },
      error: (error)=>{
        toastr.error('Ocurrio al cargar los datos', 'Error Alert', {timeOut: 2000});
      }
    }); 
  });*/
//});

$(document).ready(function() {
  var table = $('#tabla-stock').DataTable({
    'language': {
      'url' : '//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json'
    }
  });

  // // Start edit record
  // table.on('click', '.solicitar', function() {
  //   $tr = $(this).closest('tr');

  //   if ($($tr).hasClass('child')) {
  //     $tr = $tr.prev('.parent');
  //   }

  //   var data = table.row($tr).data();
  //   console.log(data);

  //   $('#idInsumo').val(data[0]);

  //   $('#insumoProveedorForm').attr('action', '/insumos/' + data[0]);
  //   $('#insumoProveedorModal').modal('show');
  // });
});

  $('#insumoProveedorModal').on('show.bs.modal',function(event){
    var id= $(event.relatedTarget).data('id');
    console.log(id);
    $.ajax({
      type: 'GET',
      url:`./insumos/${id}`,
      dataType : 'json',

      success: (data)=>{
        console.log(data);
        document.getElementById('nombre-edit').value = data.categoria.nombre;
        document.getElementById('id-edit').value = data.categoria.id;
      },
      error: (error)=>{
        toastr.error('Ocurrio al cargar los datos', 'Error Alert', {timeOut: 2000});
      }
    }); 
  });
</script>
@endsection