<div class="col-md-12">
  <div class="box">
    <div class="box-body">
      <table id="tabla-stock" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>COD</th>
            <th>Nombre  </th>
            <th>Unidad de Medida </th>
            <th>Stock insumo </th>
            <th>Estado solicitud </th>      
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($insumos as $insumo)
            <tr>
              <td>{{$insumo->id}}</td>
              {{-- <td>{{$insumo->nombre}}</td> --}}
              <td>
              <i class="mr-2 glyphicon glyphicon-cog"></i>     
                <span style="font-size: 105%; font-weight: bold; " >{{$insumo->nombre}}</span>
              </td>
              <td>{{$insumo->getUnidadMedida()}}</td>
              <td>{{$insumo->cantidad}}</td>
              <td>
                @if($insumo->estado == 2 )
                  <label class="label label-warning">Solicitado</label>
                 ({{$insumo->solicitado}} unidades)
                 @else
                 <label class="label label-default">Sin solicitud</label>
                @endif
              </td>
              <td>
                <button class="btn btn-xs btn-info" data-toggle="modal" data-target="#insumoProveedorModal" data-id="{{$insumo->id}}"> <span class="fa fa-hand-o-up"></span> &nbsp;
                  Solicitar insumo
                </button>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div> <!-- end box -->
</div>
