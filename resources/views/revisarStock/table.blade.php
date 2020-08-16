<div class="col-md-12">
  <div class="box">
    <div class="box-body">
      <table id="tabla-stock" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>COD</th>
            <th>Nombre  </th>
            <th>Unidad de Medida </th>
            <th>Cantidad </th>
            {{-- <th>Acciones</th> --}}
          </tr>
        </thead>
        <tbody>
          @foreach ($insumos as $insumo)
            <tr>
              <td>{{$insumo->id}}</td>
              {{-- <td>{{$insumo->nombre}}</td> --}}
              <td>
              <i class="mr-2 glyphicon glyphicon-cog"></i>     
                <span style="font-size: 105%; font-weight: bold; " >{{$insumo->nombre}}</span>
              </td>
              <td>{{$insumo->getUnidadMedida()}}</td>
              
              <td>{{$insumo->cantidad}}</td>
              {{-- <td>
                <button class="btn btn-warning" data-toggle="modal" data-target="#modal-edit-categoria" data-id="{{$categoria->id}}">
                  <span class="glyphicon glyphicon-edit"></span>
                </button>
                @if($categoria->productos->isEmpty())
                  <form style="display:inline" method="POST" action="{{ route('categorias.destroy', $categoria->id) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                  </form>
                @endif
              </td> --}}
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div> <!-- end box -->
</div>