
      <div class="box box-success">
        <div class="box-body">
          <table id="tabla-productos" class="table table-bordered table-striped responsive display nowrap" style="width:100%; border-collapse: collapse; border-spacing: 0;">
          <caption>Tabla de productos</caption>
          <thead>
              <tr>
                <th scope="col">Código</th>
                <th scope="col">Imagen</th>
                <th scope="col">Producto</th>
                <th scope="col">Precio</th>
                <th scope="col">Categoria</th>
                <th scope="col">Material</th>
                <th scope="col">U. Medida</th>
                <th scope="col">Acciones</th>
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
                    <a class="btn btn-warning btn-sm" href="{{ route('productos.edit',$producto->id)}}" >
                      <span class="glyphicon glyphicon-pencil"></span></a>
                      <form style="display:inline" method="POST" onsubmit="return confirmarDeleteProducto()" action="{{ route('productos.destroy', $producto->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></button>
                      </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
    
          </table>
        </div>
      </div>
