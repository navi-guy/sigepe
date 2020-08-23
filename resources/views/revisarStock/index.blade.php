@extends('layouts.main')

@section('title','Revisar Stock')

@section('styles')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@endsection

@section('breadcrumb')
<ol class="breadcrumb" style="background-color: white !important">
  <li><a href="{{ route('home.index') }}">Inicio</a></li>
  <li><a href="#" class="text-muted">Revisar Stock</a></li>
</ol>
@endsection

@section('content')
<section class="content">
  @include('revisarStock.table')
  @include('revisarStock.insumo_proveedor')
</section>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
// sidebar
 // removeActiveSideBarButtons();
  $('#sidebar-btn-stock-insumos').addClass("active");  
//end sidebar
  var table = $('#tabla-stock').DataTable({
    "order": [[ 3 , "asc" ]], 
    'language': {
      'url' : '//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json'
    }
  });


  $('#insumoProveedorModal').on('hide.bs.modal',function(event){
    var table = document.getElementById('teibol');
    table.remove();
  });

  $('#insumoProveedorModal').on('show.bs.modal',function(event){
    var id= $(event.relatedTarget).data('id');
    $.ajax({
      type: 'GET',
      url:`./insumos/${id}`,
      dataType : 'json',
      success: (data)=>{
        //console.log(data);
        //llenamos datos del insumo
        document.getElementById('nombre-modal').value = data.insumo.nombre;
        document.getElementById('unidad_medida-modal').value = getUnidadMedida(data.insumo.unidad_medida);
        document.getElementById('cantidad-modal').value = data.insumo.cantidad;
        document.getElementById('id_insumo-modal').value = data.insumo.id;
        
        //llenamos la tabla (de manera dinamica :'v)
        let prov = "";
        let html = "";
        html += '<div id="teibol"> <table id="tabla-proveedor" class="table table-bordered table-striped">';
        html +=    '<thead>';
        html +=       '<tr>';
        html +=          '<th>Razon Social Proveedor</th>';
        html +=          '<th>Ruc</th>';
        html +=          '<th>Precio Insumo (S/.)</th>';
        html +=          '<th>Cantidad por unidad</th>';        
        html +=        '</tr>';
        html +=     '</thead>';
        html +=     '<tbody>';

        let flagBestProveedor = 1;       
        let proveedores = data.insumo.proveedores;
        //ordenar
        let proveedoresXD = proveedores.sort(compare);
        proveedoresXD.forEach(function(proveedor) {
          if( proveedor != null ) {
            prov = proveedor['id'];
           // console.log(prov);
            html +='<tr>';
            html +='<input name="proveedor_id[]" value='+prov+' class="form-control" type="hidden">';
            html +='<td>'+proveedor['razon_social'];
            if (flagBestProveedor == 1) {
              html +=' <label class="label label-warning"><i class="fa fa-trophy"></i> &nbsp;Mejor opción</label>';
            }
            html +='</td>'
            html +='<td>'+proveedor['ruc']+'</td>';
            html +='<td>'+proveedor.pivot['precio_compra']+'</td>';
            html +='<td> <input name="cantidad[]" class="form-control" type="number" value=0 min="0"> </td>';
            html +='</tr>';   
          }
          flagBestProveedor=0;
        });  
        html +=     '</tbody>';
        html += '</table></div>';
        $(".show-proveedores").html(html);
        $('#tabla-proveedor').DataTable({
          "order": [[ 2 , "asc" ]], 
          info:false,
          'language': {
            'url' : '//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json'
          },
           columnDefs: [
          { orderable: false, targets: -1},
          { searchable: false, targets: [-1]}
          ]
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
//comparar proveedores por precio compra insumo
function compare( a, b ) {
  appc = Number(a.pivot.precio_compra);
  bppc = Number(b.pivot.precio_compra);
  console.log(a);
  if ( appc < bppc ){
    return -1;
  }
  if ( appc > bppc ){
    return 1;
  }
  return 0;
}

</script>
@endsection