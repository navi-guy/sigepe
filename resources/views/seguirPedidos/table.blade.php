  <div class="row">
    <div class="col-xs-12">
      <div class="box box-success">
        <div class="box-body">
          <table id="tabla-seguirPedidos" class="table table-bordered table-striped responsive display nowrap" style="width:100%" cellspacing="0">
          <caption>Tabla de pedidos en seguimiento</caption>
          <thead>
              <tr>
                <th scope="col">Código Pedido</th>
                <th scope="col">Fecha emisión</th>
                <th scope="col">Cliente</th>
                <th scope="col">RUC</th>
                <th scope="col">Estado</th>
                <th scope="col">Monto Neto</th>
                <th scope="col">Acciones</th>
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
                  </td>
                  <td>{{$pedido->monto_neto}}</td>
                  <td>                      
                    <div class="row"> 
                      <a class="btn btn-default btn-sm" href="{{ route('pedidos.visualizarPedido',['id'=>$pedido->id, 'type'=>'seguir'])}}">
                        <span class="fa fa-eye"></span> Ver detalle
                      </a>
                    @switch($pedido->estado_pedido)
  
                      @case(2)<!-- Aprobado -->
                          <button class="btn btn-sm  " style="background-color:  #00add8;  color: white; text-align: left" data-toggle="modal" data-target="#modal-ejecutar-pedido" data-id="{{$pedido->id}}" >
                            <span class="fa fa-pause-circle-o"  class="fa fa-check" style="font-size: 14px !important"></span>&nbsp;&nbsp; {{$pedido->getSiguienteEstado()}}
                          </button>
                          @break
                      @case(4)<!-- Esperando insumos -->
                            <button class="btn btn-warning btn-sm  " style="background-color:  #00a65a;   color: white; text-align: left" data-toggle="modal" data-target="#modal_aprobar_pedido" data-id="{{$pedido->id}}" >
                              <span class="fa fa-check" style="font-size: 14px !important"></span>&nbsp;&nbsp; {{$pedido->getSiguienteEstado()}}
                              </button>
                          @break
                      @case(5)<!-- En Ejecución -->
                            <button class="btn btn-sm" style="background-color: #2d7caa; color:White; text-align: left"  data-toggle="modal" data-target="#modal-terminar-pedido" data-id="{{$pedido->id}}">
                              <span class="fa fa-slack" style="font-size: 14px !important"></span>&nbsp;&nbsp; {{$pedido->getSiguienteEstado()}}
                            </button>
                          @break
                      @case(6)<!-- Terminado -->
                           
                          @break
                      @default
                          <span>Error</span>
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
