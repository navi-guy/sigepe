@extends('layouts.main')

@section('title','Proveedores')

@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('dist/css/alt/AdminLTE-select2.min.css')}}">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
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

  $('#tabla-proveedores').DataTable({
      "order": [[ 0, "desc" ]],       
        "responsive": true,             
      'language': {
      'url' : '//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json'
    }, columnDefs: [
        { orderable: false, targets: -1},
        { searchable: false, targets: [-1]},
        { responsivePriority: 1, targets: 0 },
        { responsivePriority: 10001, targets: 3 },
        { responsivePriority: 10002, targets: 2 },
        { responsivePriority: 2, targets: -1 }
      ]
  });

  $("#proveedor").select2();

  $('#modal-edit-proveedor').on('show.bs.modal',function(event){
    var id= $(event.relatedTarget).data('id');
    console.log(id);
    $.ajax({
      type: 'GET',
      url:`./proveedores/${id}/edit`,
      dataType : 'json',

    success: (data)=>{
      console.log(data);
      document.getElementById('razon_social-edit').value = data.razon_social;
      document.getElementById('ruc-edit').value = data.ruc;
      document.getElementById('direccion-edit').value = data.direccion;
      document.getElementById('tipo-edit').value = data.tipo;
      document.getElementById('id-edit').value = data.id;
    },
    error: (error)=>{
      toastr.error('Ocurrio al cargar los datos', 'Error Alert', {timeOut: 2000});
    }
    }); 
  });
});

function confirmarDeleteProveedor(){
  if(confirm('¿Realmente quieres eliminar este proveedor?'))
    return true;
  else
    return false;
}
</script>
@endsection

