  <div class="row">
    <div class="col-xs-12">
      <div class="box box-success">
        <div class="box-header">
          <h3 class="box-title">EJECUCIÓN DE <b>PEDIDOS</b></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="tabla-seguirPedidos" class="table table-bordered table-striped responsive display nowrap" style="width:100%" cellspacing="0">
            <thead>
              <tr>
                <th>Código Pedido</th>
                <th>Fecha emisión</th>
                <th>Cliente</th>
                <th>RUC</th>
                <th>Estado</th>
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
                   
                        <button class="btn btn-sm  " style="text-align: left">
                          <span class="fa fa-clock-o" style="font-size: 14px !important"></span>&nbsp;&nbsp; {{$pedido->getEstado()}}
                        </button>
                        @break
                  
                    @case(2)<!-- Aprobado -->
                        <button class="btn btn-sm  " style="background-color: #00a65a; color: white; text-align: left">
                          <span class="fa fa-check" style="font-size: 14px !important"></span>&nbsp;&nbsp; {{$pedido->getEstado()}}
                        </button>
                        @break
                    @case(3)<!-- Rechazado -->
                         <button class="btn btn-sm  " style="background-color: #f4c2ce; color: white; text-align: left">
                            <span class="fa fa-close" style="font-size: 14px !important"></span>&nbsp;&nbsp; {{$pedido->getEstado()}}
                          </button>
                        @break
                    @case(4)<!-- Esperando insumos -->
                          <button class="btn btn-warning btn-sm  "><span class="">
                              {{$pedido->getEstado()}}
                          </span></button>
                        @break
                    @case(5)<!-- En Ejecución -->
                          <button class="btn btn-sm  " style="background-color: #00add8; color:White; text-align: left">
                            <span class="fa fa-pause-circle-o" style="font-size: 14px !important"></span>&nbsp;&nbsp; {{$pedido->getEstado()}}
                          </button>
                        @break

                    @case(6)<!-- Terminado -->
                          <button class="btn btn-primary btn-sm  " style="background-color: #2d7caa; color: white; text-align: left">
                            <span class="fa fa-slack" style="font-size: 14px !important"></span>&nbsp;&nbsp; {{$pedido->getEstado()}}
                          </button>
                        @break
                    @default
                        <span>Error xd</span>
                @endswitch  




                    {{-- @if($pedido->isAprobed())
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-ejecutar-pedido" data-id="{{$pedido->id}}"><span class="">
                      {{$pedido->getEstado()}}
                    </span></button>
                    @else 
                      @if($pedido->isEsperaInsumos())
                      <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-aprobar-pedido" data-id="{{$pedido->id}}"><span class="">
                          {{$pedido->getEstado()}}
                      </span></button>
                      @else
                          @if($pedido->isEjecucion())
                          <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-terminar-pedido" data-id="{{$pedido->id}}"><span class="">
                            {{$pedido->getEstado()}}
                        </span></button>
                        @else
                           @if($pedido->isTerminado())
                              <label for="" class="label label-default">
                              {{$pedido->getEstado()}}
                            </label> 
                            @endif  
                        @endif
                      @endif
                    @endif                                    --}}
                  </td>
                  <td>{{$pedido->monto_neto}}</td>
                  <td>                      
                    {{-- <a class="btn btn-info btn-sm" href="{{ route('pedidos.show',$pedido->id)}}" >
                      <span class="fa fa-eye"></span>
                    </a> --}}


                    <div class="row"> 
                      <a class="btn btn-default btn-sm" href="{{ route('pedidos.show',$pedido->id)}}" >
                        <span class="fa fa-eye"></span> Ver detalle
                      </a>
  
                      @switch($pedido->estado_pedido)
  
                      @case(2)<!-- Aprobado -->
                          <button class="btn btn-sm  " style="background-color:  #00add8;  color: white; text-align: left" data-toggle="modal" data-target="#modal-ejecutar-pedido" data-id="{{$pedido->id}}" >
                            <span class="fa fa-check" style="font-size: 14px !important"></span>&nbsp;&nbsp; {{$pedido->getSiguienteEstado()}}
                          </button>
                          @break
                      @case(4)<!-- Esperando insumos -->
                            <button class="btn btn-warning btn-sm  " style="background-color:  #00a65a;   color: white; text-align: left" data-toggle="modal" data-target="#modal-aprobar-pedido" data-id="{{$pedido->id}}" >
                              <span class="fa fa-clock-o" style="font-size: 14px !important"></span>&nbsp;&nbsp; {{$pedido->getSiguienteEstado()}}
                              </button>
                          @break
                      @case(5)<!-- En Ejecución -->
                            <button class="btn btn-sm" style="background-color: #2d7caa; color:White; text-align: left"  data-toggle="modal" data-target="#modal-terminar-pedido" data-id="{{$pedido->id}}">
                              <span class="fa fa-pause-circle-o" style="font-size: 14px !important"></span>&nbsp;&nbsp; {{$pedido->getSiguienteEstado()}}
                            </button>
                          @break
                      @case(6)<!-- Terminado -->
                           
                          @break
                      @default
                          <span>Error xd</span>
                  @endswitch  
                </div>

                  </td>
                </tr>
              @endforeach
            </tbody>    
          </table>
        </div>
      </div>
    </div>
  </div>
