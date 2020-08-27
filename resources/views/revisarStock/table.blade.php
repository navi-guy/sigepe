<div class="box">
  <div class="box-body">
    <table id="tabla-stock" class="table table-bordered table-striped">
    <caption>Tabla del stock por revisar</caption>
      <thead>
        <tr>
          <th scope="col">COD</th>
          <th scope="col">Nombre </th>
          <th scope="col">Unidad de Medida </th>
          <th scope="col">Stock insumo </th>
          <th scope="col">Estado</th>
          @if(!Auth::user()->hasRole('AtencionCliente') &&
              !Auth::user()->hasRole('JefeCompras'))
            <th scope="col">Acciones</th>
          @endif
        </tr>
      </thead>
      <tbody>
        @foreach ($insumos as $insumo)
          <tr>
            <td>{{ $insumo->id }}</td>
            <td>
              <em class="mr-2 glyphicon glyphicon-cog"></em>
              <span style="font-size: 105%; font-weight: bold; ">{{ $insumo->nombre }}</span>
            </td>
            <td>{{ $insumo->getUnidadMedida() }}</td>
            <td>{{ $insumo->cantidad }}</td>
            <td>
              @if ($insumo->estado == 2)
                <label class="label label-warning">Solicitado</label>
                ({{ $insumo->solicitado }} unidades)
              @else
                <label class="label label-default">Sin solicitud</label>
              @endif
            </td>
            @if (!Auth::user()->hasRole('AtencionCliente') &&
                 !Auth::user()->hasRole('JefeCompras'))
              <td>
                <button class="btn btn-xs btn-info" data-toggle="modal"
                  data-target="#insumoProveedorModal" data-id="{{ $insumo->id }}"> <span
                    class="fa fa-hand-o-up"></span> &nbsp;
                  Solicitar insumo
                </button>
              </td>
            @endif
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
