<div>
  <div class="box">
    <div class="box-body">
      <table id="tabla-insumos-solicitados" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Insumo  </th>
            {{-- <th>Stock insumo </th> --}}
    {{--         <th>Unidad de Medida </th> --}}
            <th>Proveedor</th>
            <th>Precio x Unidad</th>
            <th>Solicitado</th>   
            <th>Costo </th> 
            <th>Estado</th>  
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($insumos as $insumo)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>
              <i class="mr-2 glyphicon glyphicon-cog"></i>     
                <span style="font-size: 105%; font-weight: bold; " >{{$insumo->nombre}}</span>
              </td>
              <td>{{$insumo->razon_social}}</td>
              <td>S/. {{$insumo->precio_compra}}</td>
              <td>{{$insumo->solicitado}} unidades</td>
              <td>S/. {{$insumo->getMontoSolicitud()}}</td> 
              <td>
                @if($insumo->estado==2)
                  <label for="" class="label label-warning">{{$insumo->getEstadoSolicitud()}}</label>
                @else
                  <label for="" class="label label-info">{{$insumo->getEstadoSolicitud()}}</label>
                @endif
                <label for=""></label>
              </td>
              <td>
                @if($insumo->estado==2)
                <button class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-aprobar-solicitud" data-id="{{$insumo->id}}" data-proveedor="{{$insumo->razon_social}}" data-preciocompra="{{$insumo->precio_compra}}" 
                  data-solicitado="{{$insumo->solicitado}}" data-insumo="{{$insumo->nombre}}"
                  data-insumoproveedor="{{$insumo->insumo_proveedor_id}}"><span class="fa fa-check"></span>
                </button>
                <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-rechazar-solicitud" data-id="{{$insumo->id}}" data-cantidad="{{$insumo->cantidad}}" data-insumoproveedor="{{$insumo->insumo_proveedor_id}}">
                 <span class="fa fa-close"></span> 
                </button>
                @else
                  <button class="btn btn-xs btn-success" data-toggle="modal" data-target="#modal-registrar-compra" data-id="{{$insumo->id}}" data-solicitado="{{$insumo->solicitado}}" data-insumoproveedor="{{$insumo->insumo_proveedor_id}}">
                   <span class="fa fa-plus"></span>  Registrar
                  </button>
                @endif

              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div> <!-- end box -->
</div>
