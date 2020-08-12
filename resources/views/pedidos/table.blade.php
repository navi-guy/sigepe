  <div class="row">
    <div class="col-xs-12">
      <div class="box box-success">
        <div class="box-header">
          <h3 class="box-title">Gestionar <b>PEDIDOS</b></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="tabla-pedidos" class="table table-bordered table-striped responsive display nowrap" style="width:100%" cellspacing="0">
            <thead>
              <tr>
                <th>Código Pedido</th>
                <th>Fecha emisión</th>
                <th>Cliente</th>
                {{-- <th>Teléfono del cliente</th> --}}
                <th>RUC</th>
                <th>Estado</th>
                <th>Monto Bruto</th>
                <th>Descuento </th>
                <th>Monto Neto</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($pedidos as $pedido)
                <tr>
                  <td>{{$pedido->cod_pedido}}</td>
                  <td>{{$pedido->fecha}}</td>
                  <td>{{$pedido->nombre_cli}}</td>
                 {{--  <td>{{$pedido->telefono_cli}}</td> --}}
                  <td>{{$pedido->ruc_cli}}</td>
                  <td>
                    @if($pedido->isUnconfirmed())
                      <label for="" class="label label-warning">
                      {{$pedido->getEstado()}}
                      </label> 
                    @else 
                      @if($pedido->isAprobed())
                        <label for="" class="label label-success">
                          {{$pedido->getEstado()}}
                        </label> 
                      @else
                        <label for="" class="label label-danger">
                          {{$pedido->getEstado()}}
                        </label> 
                      @endif
                    @endif                                   
                  </td>
                  <td>{{$pedido->monto_bruto}}</td>
                  <td>{{$pedido->descuento}}</td>
                  <td>{{$pedido->monto_neto}}</td>                  
                  <td>                      
                    <a class="btn btn-warning btn-sm" href="{{ route('pedidos.edit',$pedido->id)}}" >
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    @if($pedido->isUnconfirmed())
                      <form style="display:inline" method="POST" onsubmit="return confirmarDeletePedido()" action="{{ route('pedidos.destroy', $pedido->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></button>
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
  </div><!-- end row -->
