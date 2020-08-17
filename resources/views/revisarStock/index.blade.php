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
$(document).ready(function() {
  var table = $('#tabla-stock').DataTable({
    'language': {
      'url' : '//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json'
    }
  });


  $('#insumoProveedorModal').on('show.bs.modal',function(event){
    var id= $(event.relatedTarget).data('id');
    $.ajax({
      type: 'GET',
      url:`./insumos/${id}`,
      dataType : 'json',
      success: (data)=>{
        console.log(data);
        //llenamos datos del insumo
        document.getElementById('nombre-modal').value = data.insumo.nombre;
        document.getElementById('unidad_medida-modal').value = getUnidadMedida(data.insumo.unidad_medida);
        document.getElementById('cantidad-modal').value = data.insumo.cantidad;
        document.getElementById('id_insumo-modal').value = data.insumo.id;
        
        //llenamos la tabla (de manera dinamica :'v)
        let prov = "";
        let html = "";
        html += '<table id="tabla-proveedor" class="table table-bordered table-striped">';
        html +=    '<thead>';
        html +=       '<tr>';
        html +=          '<th>Razon Social Proveedor</th>';
        html +=          '<th>Ruc</th>';
        html +=          '<th>Precio Insumo</th>';
        html +=          '<th>Cantidad por unidad</th>';        
        /*html +=          '<th>Seleccionar</th>';*/
        html +=        '</tr>';
        html +=     '</thead>';
        html +=     '<tbody>';
        data.insumo.proveedores.forEach(function(proveedor) {
          let keys = Object.keys(proveedor);
          console.log(proveedor);
          let prueba = 'futuro proveedoror para saber si hay deuda con el proveedor';
          if( proveedor != null ) {
            prov = proveedor['id'];
            console.log(prov);
            html +='<tr>';
            html +='<input name="proveedor_id[]" value='+prov+' class="form-control" type="hidden">';
            html +='<td>'+proveedor['razon_social']+'</td>';
            html +='<td>'+proveedor['ruc']+'</td>';
            html +='<td>S/. '+proveedor.pivot['precio_compra']+'</td>';
            html +='<td> <input name="cantidad[]" class="form-control" type="number" value=0 min="0"> </td>';
            /*html +='<td> <input type="checkbox" name="proveedor_id[]" value="'+proveedor['id']+'"></td>';*/
            html +='</tr>';   
          }
        });  
        html +=     '</tbody>';
        html += '</table>';
        $(".show-proveedores").html(html);
        $('#tabla-proveedor').DataTable({
          'language': {
            'url' : '//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json'
          }
      });
      },
      error: (error)=>{
        toastr.error('Ocurrio al cargar los datos', 'Error Alert', {timeOut: 2000});
      }
    }); 
  });
});

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