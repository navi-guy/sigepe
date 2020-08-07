@extends('layouts.main')

@section('title','Productos')

@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('dist/css/alt/AdminLTE-select2.min.css')}}">
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<link rel="stylesheet" href="{{asset('fileinput/fileinput.min.css')}}">
@endsection

@section('breadcrumb')
<ol class="breadcrumb">
  <li><a href="{{ route('productos.index') }}">Productos</a></li>
  <li><a href="{{ route('productos.create') }}">Registrar producto</a></li>
</ol>
@endsection

@section('content')
<section class="content-header">
  <h3>Gestionar Productos</h3>
</section>
<section class="content">
  @include('productos.create.register')
</section>
@endsection

@section('scripts')
<script src="{{ asset('fileinput/fileinput.min.js') }}"></script>
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
        browseIcon: '<i class="glyphicon glyphicon-folder-open"></i> <span style="margin-left:5px;"> añadir imagen</span>',
        removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
        removeTitle: 'Cancel or reset changes',
        elErrorContainer: '#kv-avatar-errors-1',
        msgErrorClass: 'alert alert-block alert-danger',
        // defaultPreviewContent: '<img src="/uploads/default_avatar_male.jpg" alt="Your Avatar">',
        layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
        allowedFileExtensions: ["jpg", "png", "gif"]
    });
// Add new row in the table 
  $("#add_row").unbind('click').bind('click', function() {
    var table = $("#product_info_table");
    var count_table_tbody_tr = $("#product_info_table tbody tr").length;
    var row_id = count_table_tbody_tr + 1;
    $.ajax({
        url: base_url + '/products/getTableProductRow/',
        type: 'post',
        dataType: 'json',
        success:function(response) {     
            // console.log(reponse.x);
             var html = '<tr id="row_'+row_id+'">'+
                 '<td>'+ 
                  '<select class="form-control select_group product" data-row-id="'+row_id+'" id="product_'+row_id+'" name="product[]" style="width:100%;" onchange="getProductData('+row_id+')">'+
                      '<option value=""></option>';
                      $.each(response, function(index, value) {
                        html += '<option value="'+value.id+'">'+value.nombre+ '--' +value.unidad_medida +'</option>';             
                      });                
                    html += '</select>'+
                  '</td>'+ 
                  '<td><input   type="number" min="0" max="500" name="qty[]" id="qty_'+row_id+'" class="form-control" onkeyup="getTotal('+row_id+')"></td>'+

                  '<td><button type="button" class="btn btn-default" onclick="removeRow(\''+row_id+'\')"><i class="fa fa-close"></i></button></td>'+
                  '</tr>';
              if(count_table_tbody_tr >= 1) {
              $("#product_info_table tbody tr:last").after(html);  
            }
            else {
              $("#product_info_table tbody").html(html);
            }

            $(".product").select2();
        }
      });

    return false;
  });

}); //document 

 
  // get the product information from the server
function getProductData(row_id)
  {
    // var product_id = $("#product_"+row_id).val();    
    // if(product_id == "") {
    //   $("#qty_"+row_id).val("");           
    // } else {
    //   $.ajax({
    //     url: base_url + 'products/getProductValueById',
    //     type: 'post',
    //     data: {product_id : product_id},
    //     dataType: 'json',
    //     success:function(response) {
    //       $("#qty_"+row_id).val(1);
    //       $("#qty_value_"+row_id).val(1);
    //     } // /success
      
    //  }); // /ajax function to fetch the product data 
    let insumo_id = $("#product_"+row_id).val();
    if (insumo_id == "") {

    } else{
      $.ajax({
        type: 'GET',
        url: `./insumos/${insumo_id}`,
        dataType: 'json',
        success: (data) => {
         // let costo = data.insumo.precio;
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



</script>
@endsection