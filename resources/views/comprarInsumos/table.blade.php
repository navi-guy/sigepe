<div class="col-md-12">
  <div class="box">
    <div class="box-header">
      <h4>Lista de solicitudes de insumos</h4>
    </div>
    <div class="box-body">
      <table id="tabla-insumos-solicitados" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>N° </th>
            <th>Insumo  </th>
            {{-- <th>Stock insumo </th> --}}
    {{--         <th>Unidad de Medida </th> --}}
            <th>Proveedor</th>
            <th>Precio x Unidad</th>
            <th>Solicitado </th>     
            <th>Costo </th> 
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($insumos as $insumo)
            <tr>
              <td>{{$loop->iteration}}</td>
              {{-- <td>{{$insumo->nombre}}</td> --}}
              <td>
              <i class="mr-2 glyphicon glyphicon-cog"></i>     
                <span style="font-size: 105%; font-weight: bold; " >{{$insumo->nombre}}</span>
              </td>
           {{--    <td>{{$insumo->cantidad}}</td> --}}
            {{--   <td>{{$insumo->getUnidadMedida()}}</td> --}}
              <td>{{$insumo->razon_social}}</td>
              <td>S/. {{$insumo->precio_compra}}</td>
              <td>{{$insumo->solicitado}} unidades</td>
              <td>S/. {{$insumo->solicitado*$insumo->cantidad}}</td> 
              <td>
                <button class="btn btn-xs btn-success" data-toggle="modal" data-target="#insumoProveedorModal" data-id="{{$insumo->id}}"> <span class="fa fa-check"></span>
                  
                </button>
                <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#insumoProveedorModal" data-id="{{$insumo->id}}"> <span class="fa fa-close"></span> 
                </button>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div> <!-- end box -->
</div>
