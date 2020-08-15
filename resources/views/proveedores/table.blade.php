  <div class="row">
    <div class="col-xs-12">
      <div class="box box-success">
        <div class="box-body">
          <table id="tabla-proveedores" class="table table-bordered table-striped responsive display nowrap" style="width:100%" cellspacing="0">
            <thead>
              <tr>
                {{-- <th>#</th> --}}
                <th>Razon Social</th>
                <th>Ruc</th>
              {{--   <th>Email</th> --}}
                <th>Dirección</th>
                <th> Tipo</th>
                <th>Acciones</th>
                
              </tr>
            </thead>
            <tbody>
              @foreach ($proveedores as $proveedor)
                <tr>
                 {{--  <td>{{$proveedor->id}}</td> --}}
                  <td>{{$proveedor->razon_social}}</td>
                  <td>{{$proveedor->ruc}}</td>
                  {{-- <td>{{$proveedor->email}}</td> --}}
                  <td>{{$proveedor->direccion}}</td>
                  <td>{{$proveedor->getTipo()}}</td>
                  <td>
                    <a class="btn btn-info btn-xs" href="{{ route('asignacion.show',$proveedor->id) }}">
                      <span class="fa fa-pencil"> </span> &nbsp;
                      Editar insumos
                    </a>
                    <button class='btn btn-xs btn-warning' 
                      onclick="editarProveedor('<?php echo $proveedor->id; ?>')">
                      <span class='glyphicon glyphicon-edit'> </span>
                    </button>
                    <form style="display:inline" method="POST" onsubmit="return confirmarDeleteProveedor()"   action="{{route('proveedores.destroy', $proveedor->id) }}">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger  btn-xs ">
                       <span class="glyphicon glyphicon-trash"></span>
                      </button>
                    </form>        
                  </td>
                </tr>
              @endforeach
            </tbody>
    
          </table>
        </div>
      </div> <!-- end box -->
    </div>
  </div><!-- end row -->
