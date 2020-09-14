<div class="row">
  <div class="col-xs-12">
    <div class="box box-success">
      <div class="box-body">
        <table id="tabla-revisarPedidos" class="table table-bordered table-striped responsive display nowrap" style="width:100%; border-collapse: collapse; border-spacing: 0;">
          <caption>Tabla de productos por revisar</caption>
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
                <td>{{ $pedido->cod_pedido }}</td>
                <td>{{ $pedido->fecha }}</td>
                <td>{{ $pedido->nombre_cli }}</td>
                <td>{{ $pedido->ruc_cli }}</td>
                <td>
                  @if ($pedido->isAprobed())
                    <button class="btn btn-sm btn-block"
                      style="background-color: #00a65a; color: white; text-align: left">
                      <span class="fa fa-check"
                        style="font-size: 14px !important"></span>&nbsp;&nbsp;
                      {{ $pedido->getEstado() }}</button>
                  @else
                    @if ($pedido->isEsperaInsumos())
                      <button class="btn btn-warning btn-sm btn-block"><span class="">
                          {{ $pedido->getEstado() }}
                        </span></button>
                    @else
                      @if ($pedido->isEjecucion())
                        <button class="btn btn-sm btn-block"
                          style="background-color: #00add8; color:White; text-align: left">
                          <span class="fa fa-pause-circle-o"
                            style="font-size: 14px !important"></span>&nbsp;&nbsp;
                          {{ $pedido->getEstado() }}</button>
                      @else
                        @if ($pedido->isTerminado())
                          <button class="btn btn-primary btn-sm btn-block"
                            style="background-color: #2d7caa; color: white; text-align: left">
                            <span class="fa fa-slack"
                              style="font-size: 14px !important"></span>&nbsp;&nbsp;
                            {{ $pedido->getEstado() }}
                          </button>
                        @else
                          <button class="btn btn-sm btn-block" style="text-align: left">
                            <span class="fa fa-clock-o"
                              style="font-size: 14px !important"></span>&nbsp;&nbsp;
                            {{ $pedido->getEstado() }}
                          </button>
                        @endif
                      @endif
                    @endif
                  @endif
                </td>
                <td>{{ $pedido->monto_neto }}</td>
                <td>
                  @if ($pedido->isUnconfirmed() || $pedido->isEsperaInsumos())
                    @if ($pedido->isUnconfirmed())
                      <button class="btn btn-primary btn-sm" data-toggle="modal"
                        data-target="#modal_aprobar_pedido" data-id="{{ $pedido->id }}">
                        <span class="fa fa-check-square-o"></span> Aprobar</button>
                    @endif
                    @if ($pedido->isEsperaInsumos())
                      <button class="btn btn-primary btn-sm"
                        href="{{ route('pedidos.visualizarPedido',['id'=>$pedido->id, 'type'=>'revisar'])}}">
                        <span class="fa fa-check-square-o"></span> Solicitar insumos</button>
                    @endif
                    <button class="btn btn-danger btn-sm" data-toggle="modal"
                      data-target="#modal-rechazar-pedido" data-id="{{ $pedido->id }}">
                      <span class="fa fa-close"></span> Rechazar</button>
                  @endif
                  <a class="btn btn-default btn-sm" href="{{ route('pedidos.visualizarPedido',['id'=>$pedido->id, 'type'=>'revisar'])}}">
                    <span class="fa fa-eye"></span> Ver detalle
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div> <!-- end box -->
  </div>
</div><!-- end row -->
