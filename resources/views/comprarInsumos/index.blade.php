@extends('layouts.main')

@section('title','Comprar Insumos')

@section('styles')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@endsection

@section('breadcrumb')
<ol class="breadcrumb" style="background-color: white !important">
  <li><a href="{{ route('home.index') }}">Inicio</a></li>
  <li><a href="{{ route('proveedores.index') }}">Proveedores</a></li>
  <li><a href="#" class="text-muted">Comprar Insumos</a></li>
</ol>
@endsection

@section('content')
<section class="content-header">
</section>
<section class="content">
  @include('comprarInsumos.table')
  <!-- Modales -->
  @include('comprarInsumos.modales.aceptar')
  @include('comprarInsumos.modales.rechazar')
  @include('comprarInsumos.modales.registrar')
  <!-- end.Modales -->
</section>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
//sidebar
  $('#treeview-proveedores').addClass("active").addClass("menu-open");
  document.getElementById('treeview-menu-proveedores').style.display = 'block';
  $('#sidebar-btn-insumos-proveedores').addClass("active");
//end sidebar
  $('#tabla-insumos-solicitados').DataTable({
    // "order": [[ 3 , "asc" ]],
    'language': {
      'url' : '//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json'
    }
  });

$('#modal-aprobar-solicitud').on('show.bs.modal',function(event){
    let id= $(event.relatedTarget).data('insumoproveedor');
    let insumo = $(event.relatedTarget).data('insumo');
    let proveedor = $(event.relatedTarget).data('proveedor');
    console.log(proveedor);
    let cantidad_insumos = $(event.relatedTarget).data('solicitado');
    let precio_compra = $(event.relatedTarget).data('preciocompra');
    $(event.currentTarget).find('#id-insumo_proveedor').val(id);
    document.getElementById("modal-insumo").textContent = insumo;
    document.getElementById("modal-proveedor").textContent = proveedor;
    document.getElementById("modal-precio_compra").textContent = precio_compra;
    document.getElementById("modal-cantidad").textContent = cantidad_insumos;
    document.getElementById("modal-total").textContent = cantidad_insumos*precio_compra;
  
  });

$('#modal-rechazar-solicitud').on('show.bs.modal',function(event){
    let id =  $(event.relatedTarget).data('insumoproveedor');
    let cantidad_insumos = $(event.relatedTarget).data('cantidad');
    $(event.currentTarget).find('#id-insumo_proveedor').val(id);
    document.getElementById("cantidad-insumos").textContent = cantidad_insumos;
});

$('#modal-registrar-compra').on('show.bs.modal',function(event){
    let id =  $(event.relatedTarget).data('insumoproveedor');
    let cantidad_insumos = $(event.relatedTarget).data('solicitado');
    $(event.currentTarget).find('#id-insumo_proveedor').val(id);
    document.getElementById("nuevos-insumos").textContent = cantidad_insumos;
  });
});

</script>
@endsection
