<div class="box">
    <div class="box-body">
        <table id="tabla-categorias" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 25px">COD</th>
                    <th>Nombre de la categoría </th>
                    <th style="width: 100px">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                    <tr>
                     
                        <td>{{ $categoria->id }}</td>
                        <td>{{ $categoria->nombre }}</td>
                        <td>
                          <button class="btn btn-sm btn-warning" data-toggle="modal"
                              data-target="#modal-edit-categoria" data-id="{{ $categoria->id }}">
                              <span class="glyphicon glyphicon-pencil"></span>
                          </button>
                       
                              <form style="display:inline" method="POST"
                                  action="{{ route('categorias.destroy', $categoria->id) }}"
                                  onsubmit="return confirmarDeleteCategoria()">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-sm btn-danger"><span
                                          class="glyphicon glyphicon-trash"></span></button>
                              </form>
                          
                      </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>