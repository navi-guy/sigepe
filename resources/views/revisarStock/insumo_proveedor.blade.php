{{-- <div class="modal fade" id="modal-insumo-proveedor" role="dialog">
  <div class="modal-dialog">
    <form action="{{route('proveedores.update',0)}}" method="post" class="modal-content">
      @csrf
      @method('PUT')
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Editar datos del proveedor</h4>
        <input id="id-edit" type="hidden" name="id">
      </div>
      <div class="modal-body">
        <label for="id-show">Nombre del insumo</label>
        <label id="id-show" type="text" name="id"></label>

      </div>
    </form>
  </div>
</div> --}}

<!DOCTYPE html>
<html>
{{-- <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width-device-widht, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie-edge">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
</head>
 --}}
<body>
</body>

<!-- Start insumo_proveedor modal -->
<div class="modal fade" id="insumoProveedorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Elegir proveedor </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="/asignacion" method="GET" id="insumoProveedorForm">

        {{ csrf_field() }}
        
        <div class="modal-body">

          <div class="form-group">
            <label> Insumo </label>
            <input type="text" name="ID" id="idInsumo" class="form-control" placeholder="Insumo">
            {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
          </div>

        </div>

        <div class="modal-footer">

          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Actualizar</button>

        </div>
      </form>
    </div>
  </div>
</div>
<!-- End insumo_proveedor modal -->

<script type="text/javascript">
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

</html>