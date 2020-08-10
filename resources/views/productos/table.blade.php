  <div class="row">
    <div class="col-xs-12">
      <div class="box box-success">
        <div class="box-header">
          <h3 class="box-title">Gestionar <b>PRODUCTOS</b></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="tabla-productos" class="table table-bordered table-striped responsive display nowrap" style="width:100%" cellspacing="0">
            <thead>
              <tr>
                <th>Código</th>
                <th>Imagen</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Categoria</th>
                <th>Material</th>
                <th>U. Medida</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($productos as $producto)
                <tr>
                  <td>{{$producto->id}}</td>
                  <td>
                    <img src="{{asset($producto->image)}}" alt="img" width="50px" height="50px">
                  </td>
                  <td>{{$producto->nombre}}</td>
                  <td>S/. {{$producto->precio_unitario}}</td>
                  <td>{{$producto->categoria->nombre}}</td>
                  <td>{{$producto->getMaterial()}}</td>
                  <td>{{$producto->getUnidadMedida()}}</td>
                  <td>
                    <button class="btn btn-warning" data-toggle="modal" data-target="#modal-edit-producto" data-id="{{$producto->id}}">
                      <span class="glyphicon glyphicon-edit"></span>
                    </button>
                   {{--  @if($producto->pedidoproductos->isEmpty()) --}}
                      <form style="display:inline" method="POST" onsubmit="return confirmarDeleteProducto()" action="{{ route('productos.destroy', $producto->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                      </form>
                    {{-- @endif --}}
                  </td>
                </tr>
              @endforeach
            </tbody>
    
          </table>
        </div>
      </div> <!-- end box -->
    </div>
  </div><!-- end row -->
