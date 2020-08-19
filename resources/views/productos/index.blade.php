@extends('layouts.main')

@section('title','Productos')

@section('styles')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@endsection

@section('breadcrumb')
<ol class="breadcrumb" style="background-color: white !important">
  <li><a href="{{ route('home.index') }}">Inicio</a></li>
  <li><a href="#" class="text-muted">Productos</a></li>
</ol>
@endsection

@section('content')
<section class="content-header">
      <a href="{{ route('productos.create') }}">
      <button class="btn bg-olive pull-left">
      <span class="fa fa-plus"></span> &nbsp; Nuevo producto
      </button>
    </a> 
    <p><br></p>
</section>
<section class="content">
  @include('productos.table')
</section>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
//sidebar
  $('#treeview-productos').addClass("active").addClass("menu-open");
  document.getElementById('treeview-menu-productos').style.display = 'block';
  $('#sidebar-btn-productos').addClass("active");  
//end sidebar
  $('#tabla-productos').DataTable({
      'language': {
               'url' : '//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json'
          },"order": [[ 0, "desc" ]], info: false, 
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
  function confirmarDeleteProducto(){
    if(confirm('¿Estás seguro de eliminar producto?'))
      return true;
    else
      return false;
  }
</script>
@endsection