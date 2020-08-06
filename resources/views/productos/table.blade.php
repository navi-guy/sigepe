  <div class="row">
    <div class="col-xs-12">
      <div class="box box-success">
        <div class="box-header">
          <h3 class="box-title">LISTA DE <b>PROVEEDORES</b></h3>
        </div>
        <!-- /.box-header -->
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

                  @include('actions.proveedor')
                </tr>
              @endforeach
            </tbody>
    
          </table>
        </div>
      </div> <!-- end box -->
    </div>
  </div><!-- end row -->
