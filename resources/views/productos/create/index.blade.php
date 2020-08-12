@extends('layouts.main')

@section('title','Productos')

@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('dist/css/alt/AdminLTE-select2.min.css')}}">
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<link rel="stylesheet" href="{{asset('fileinput/fileinput.min.css')}}">
<link rel="stylesheet" href="{{asset('dropzone/dist/basic.css')}}">
<link rel="stylesheet" href="{{asset('dropzone/dist/dropzone.css')}}">
@endsection

@section('breadcrumb')
<ol class="breadcrumb">
  <li><a href="{{ route('home.index') }}">Inicio</a></li>
  <li><a href="{{ route('productos.index') }}">Productos</a></li>
  <li><a href="#" class="text-muted">Registrar</a></li>
</ol>
@endsection

@section('content')
<section class="content-header">
  <h3>Añadir Producto</h3>
</section>
<section class="content">
  @include('partials.validation-errors')
  @include('productos.create.register')
</section>
@endsection

@section('scripts')
<script src="{{ asset('fileinput/fileinput.min.js') }}"></script>
<script src="{{ asset('dropzone/dist/dropzone.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
<script>
$(document).ready(function() {
 var btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' + 
        'onclick="alert(\'Call your custom code here.\')">' +
        '<i class="glyphicon glyphicon-tag"></i>' +
        '</button>'; 
  $("#product_image").fileinput({
      overwriteInitial: true,
      maxFileSize: 1500,
      showClose: false,
      showCaption: false,
      browseLabel: '',
      removeLabel: '',
      browseIcon: '<i class="glyphicon glyphicon-folder-open"></i> <span style="margin-left:5px;"> Añadir imagen</span>',
      removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
      removeTitle: 'Cancel or reset changes',
      elErrorContainer: '#kv-avatar-errors-1',
      msgErrorClass: 'alert alert-block alert-danger',
      // defaultPreviewContent: '<img src="/uploads/default_avatar_male.jpg" alt="Your Avatar">',
      layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
      allowedFileExtensions: ["jpg", "png", "gif"]
  });

  $("#product_1").select2();
  $("#categoria_select").select2();

  $("#add_row").unbind('click').bind('click', function() {
    var table = $("#product_info_table");
    var count_table_tbody_tr = $("#product_info_table tbody tr").length;
    var row_id = count_table_tbody_tr + 1;
    console.log(row_id);
    $.ajax({
      type: 'GET',
      url: `../insumos_disponibles`,
      dataType: 'json',
      success: (data) => {  
             var html = '<tr id="row_'+row_id+'">'+
                 '<td>'+ 
                  '<select class="form-control select_group product" data-row-id="'+row_id+'" id="product_'+row_id+'" name="insumo[]" style="width:100%;" onchange="getProductData('+row_id+')">'+
                      '<option value=""></option>';
                      $.each(data.insumos, function(index, value) {
                        console.log('value',value.nombre);
                        html += '<option value="'+value.id+'">'+value.nombre+ '-' +getUnidadMedida(value.unidad_medida) +'</option>';             
                      });                
                    html += '</select>'+
                  '</td>'+ 
                  '<td><input   type="number" min="0" max="500" name="qty[]" id="qty_'+row_id+'" class="form-control"></td>'+
                  '<td><button type="button" class="btn btn-default" onclick="removeRow(\''+row_id+'\')"><i class="fa fa-close"></i></button></td>'+
                  '</tr>';
              if(count_table_tbody_tr >= 1) {
              $("#product_info_table tbody tr:last").after(html);  
            }
            else {
              $("#product_info_table tbody").html(html);
            }
            $(".product").select2();
        }, error: (error) => {
          toastr.error('Ocurrio un Error!', 'Error Alert', { timeOut: 2000 });
        }
     }); //end ajax
  });
}); //document 

 
  // get the product information from the server
function getProductData(row_id)
  {
    let insumo_id = $("#product_"+row_id).val();
    if (insumo_id == "") {
    } else{
      $.ajax({
        type: 'GET',
        url: `../insumos/${insumo_id}`,
        dataType: 'json',
        success: (data) => {
          console.log(data);          
          $("#qty_"+row_id).val(1);
          $("#qty_value_"+row_id).val(1);
        },
        error: (error) => {
          toastr.error('Ocurrio un Error!', 'Error Alert', { timeOut: 2000 });
        }
      });
  }
}

function removeRow(tr_id)
{
  $("#product_info_table tbody tr#row_"+tr_id).remove();
}

function getUnidadMedida(u_medida){
  let result="";
    switch(u_medida){    
        case 2: 
            result="Medidas en Litro (L)";
            break;
        case 1: 
            result="Medidas en Kilogramo (Kg)";
            break;
        case 0:
            result="Unidad (u)";
            break;
    }
    return result;   
}


</script>
@endsection