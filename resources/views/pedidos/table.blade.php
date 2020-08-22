  <div class="row">
    <div class="col-xs-12">
      <div class="box box-success">
        <!-- /.box-header -->
        <div class="box-body">
          <table id="tabla-pedidos" class="table table-bordered table-striped responsive display nowrap" style="width:100%" cellspacing="0">
            <thead>
              <tr>
                <th>Código Pedido</th>
                <th>Fecha emisión</th>
                <th>Cliente</th>
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
                  <td>{{$pedido->ruc_cli}}</td>
                  <td>
                    @switch($pedido->estado_pedido)
                        @case(1)<!-- En espera -->
                            <button class="btn btn-sm btn-block" style="text-align: left">
                              <span class="fa fa-clock-o" style="font-size: 14px !important"></span>&nbsp;&nbsp; {{$pedido->getEstado()}}
                            </button>
                            @break

                        @case(2)<!-- Aprobado -->
                            <button class="btn btn-sm btn-block" style="background-color: #00a65a; color: white; text-align: left">
                              <span class="fa fa-check" style="font-size: 14px !important"></span>&nbsp;&nbsp; {{$pedido->getEstado()}}
                            </button>
                            @break
                        @case(3)<!-- Rechazado -->
                             <button class="btn btn-sm btn-block" style="background-color: #f4c2ce; color: white; text-align: left">
                                <span class="fa fa-close" style="font-size: 14px !important"></span>&nbsp;&nbsp; {{$pedido->getEstado()}}
                              </button>
                            @break
                        @case(4)<!-- Esperando insumos -->
                              <button class="btn btn-warning btn-sm btn-block"><span class="">
                                  {{$pedido->getEstado()}}
                              </span></button>
                            @break
                        @case(5)<!-- En Ejecución -->
                              <button class="btn btn-sm btn-block" style="background-color: #00add8; color:White; text-align: left">
                                <span class="fa fa-pause-circle-o" style="font-size: 14px !important"></span>&nbsp;&nbsp; {{$pedido->getEstado()}}
                              </button>
                            @break

                        @case(5)<!-- Terminado -->
                              <button class="btn btn-primary btn-sm btn-block" style="background-color: #2d7caa; color: white; text-align: left">
                                <span class="fa fa-slack" style="font-size: 14px !important"></span>&nbsp;&nbsp; {{$pedido->getEstado()}}
                              </button>
                            @break
                        @default
                            <span>Error xd</span>
                    @endswitch                               
                  </td>
                  <td>{{$pedido->monto_bruto}}</td>
                  <td>{{$pedido->descuento}}</td>
                  <td>{{$pedido->monto_neto}}</td>                  
                  <td>  
                    @if($pedido->isUnconfirmed())
                      <a class="btn btn-warning btn-sm" href="{{ route('pedidos.edit',$pedido->id)}}" >
                        <span class="glyphicon glyphicon-pencil"></span>
                      </a>
                      <form style="display:inline" method="POST" onsubmit="return confirmarDeletePedido()" action="{{ route('pedidos.destroy', $pedido->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></button>
                      </form>
                      @else
                        <a class="btn btn-default btn-sm" href="{{ route('pedidos.show',$pedido->id)}}" >
                        <span class="fa fa-eye"></span> Ver detalle
                    </a>
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
