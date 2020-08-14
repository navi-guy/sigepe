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
                    @if($pedido->isAprobed())
                      {{-- <label for="" class="label label-success"> --}}
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-ejecutar-pedido" data-id="{{$pedido->id}}"><span class="">
                      {{$pedido->getEstado()}}
                    </span></button>
                      {{-- </label>  --}}
                    @else 
                      @if($pedido->isEsperaInsumos())
                      <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-aprobar-pedido" data-id="{{$pedido->id}}"><span class="">
                        {{-- <label for="" class="label label-info"> --}}
                          {{$pedido->getEstado()}}
                        {{-- </label>  --}}
                      </span></button>
                      @else
                          @if($pedido->isEjecucion())
                          <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-terminar-pedido" data-id="{{$pedido->id}}"><span class="">
                          {{-- <label for="" class="label label-primary"> --}}
                            {{$pedido->getEstado()}}
                          {{-- </label>  --}}
                        </span></button>
                        @else
                           @if($pedido->isTerminado())
                              <label for="" class="label label-default">
                              {{$pedido->getEstado()}}
                            </label> 
                            @endif  
                        @endif
                      @endif
                    @endif                                   
                  </td>
                  <td>{{$pedido->monto_neto}}</td>
                  <td>                      
                    <a class="btn btn-info btn-sm" href="{{ route('pedidos.show',$pedido->id)}}" >
                      <span class="fa fa-eye"></span>
                    </a>
                    {{-- @if($pedido->isUnconfirmed()) --}}
                      {{-- <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-aprobar-pedido" data-id="{{$pedido->id}}"><span class="fa fa-check"></span></button> --}}
                      {{-- <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-rechazar-pedido" data-id="{{$pedido->id}}"><span class="fa fa-close"></span></button>
                    @endif --}}
                  </td>
                </tr>
              @endforeach
            </tbody>    
          </table>
        </div>
      </div> <!-- end box -->
    </div>
  </div><!-- end row -->
