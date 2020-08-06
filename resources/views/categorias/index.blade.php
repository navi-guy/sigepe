@extends('layouts.main')

@section('title','Categorias')

@section('styles')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@endsection

@section('breadcrumb')
<ol class="breadcrumb">
  <li><a href="{{ route('categorias.index') }}">Categorias</a></li>
  <li><a href="{{ route('categorias.index') }}">Registro</a></li>
</ol>
@endsection

@section('content')
<section class="content-header">
    <h3>Gestionar Categorias</h3>
</section>
<section class="content">
  <div class="row">
    @include('categorias.create')
    @include('categorias.table')
  </div>   
  <!-- Modales-->
  @include('categorias.edit')
  <!--/.end-modales-->
</section>
<!-- BOTONES EN views/actions/proveedor  -->
@endsection
@section('scripts')
{{-- <script src="{{ asset('js/categorias.js') }}"></script>  --}}
<script>
$(document).ready(function() {
  $('#tabla-categorias').DataTable({
      'language': {
               'url' : '//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json'
          }
  });
 
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
  });
});
</script>
@endsection

