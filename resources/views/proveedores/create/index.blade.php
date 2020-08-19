@extends('layouts.main')

@section('title','Proveedores')

@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('dist/css/alt/AdminLTE-select2.min.css')}}">
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
  <li><a href="#"  class="text-muted">Registro</a></li>
</ol>
@endsection

@section('content')
<section class="content-header">
  <div>
      <h3> Registrar proveedor 
      <a href="{{route('proveedores.index')}}">
      <button class="btn bg-olive pull-right">
       <span class="fa fa-list"></span> &nbsp; IR PROVEEDORES 
      </button>
    </a> </h3>
  </div>
</section>
<section class="content">
  <div class="row">
    @include('proveedores.create.register')
    @include('proveedores.create.assignment')
  </div>
</section>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
<script src="{{ asset('js/proveedor.js') }}"></script> 
<script type="text/javascript">

$(document).ready(function () {
  $select_insumo = $("#insumo_id");
  $datos_asignacion = $('#datos-asignacion :input').prop('disabled', true);
  let $proveedor = $('#proveedor');
  inicializarSelect2($proveedor, 'Seleccione el proveedor', '');
 $proveedor.on('change', function () {
    let id_proveedor = $proveedor.val();
    if (id_proveedor) {
      getInsumosSinAsignar(id_proveedor).done((data) => {
        //console.log(data);
        $select_insumo.html('');
        inicializarSelect2($select_insumo, 'Seleccione el insumo a asignar', data.insumos);
        if (data.insumos.length >= 1) {
          const id_insumo = $select_insumo.val();
          handleInsumosChanges(id_insumo);
          $datos_asignacion.prop('disabled', false);
        }else {
          toastr.info('El proveedor ya está asignado a todos los insumos', 'Info Alert', { timeOut: 3000 });
        }
      }).fail((error) => {
        toastr.error('Ocurrio un Error!', 'Error Alert', { timeOut: 2000 });
      });
    } 
    
  });

 $select_insumo.on('change', function () {
    let id_insumo = $select_insumo.val();
    handleInsumosChanges(id_insumo);
   });
});


function handleInsumosChanges(id_insumo){
  if (id_insumo) {
    getInsumoById(id_insumo).done((data) => {
      //console.log(data);
      $('#unidad_medida').val(getUnidadMedida(data.insumo.unidad_medida));    
    }).fail((error) => {
      toastr.error('Ocurrio un Error!', 'Error Alert', { timeOut: 2000 });
    });
  } else {
    $('#unidad_medida').val('');
  }
}


function inicializarSelect2($select, text, data) {
  $select.prop('selectedIndex', -1);
  $select.select2({
    placeholder: text,
    allowClear: true,
    data: data
  }); 
}

function getInsumosSinAsignar(id_proveedor) {
  return $.ajax({
    type: 'GET',
    url: `../asignacion/${id_proveedor}/edit`,
    dataType: 'json',
  });
}   

function getInsumoById(id_insumo) {
  return $.ajax({
    type: 'GET',
    url: `../insumos/${id_insumo}`,
    dataType: 'json',
  });
}  

function getUnidadMedida(u_medida){
  result="";
  switch(u_medida){
     
     case 3:
          result="Metros cúbicas (m3)";
          break;
      case 2: 
          result="Pulgadas (µm)";
          break;
      case 1: 
          result="Toneladas (Tn)";
          break;
      case 0:
          result="Unidad (u)";
          break;
  }
  return result;   
}

</script>
@endsection



