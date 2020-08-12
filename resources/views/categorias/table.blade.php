<div class="col-md-6">
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Lista de Categorías</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
      <table id="tabla-categorias" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>COD</th>
            <th>Nombre de la categoría </th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($categorias as $categoria)
            <tr>
              <td>{{$categoria->id}}</td>
              <td>{{$categoria->nombre}}</td>
              <td>
                <button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit-categoria" data-id="{{$categoria->id}}">
                  <span class="glyphicon glyphicon-edit"></span>
                </button>
                @if($categoria->productos->isEmpty())
                  <form style="display:inline" method="POST" action="{{ route('categorias.destroy', $categoria->id) }}" onsubmit="return confirmarDeleteCategoria()">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                  </form>
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div> <!-- end box -->
</div>