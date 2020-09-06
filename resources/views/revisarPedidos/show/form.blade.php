<div class="row">
  <div class="col-md-12">
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">{{$pedido->cod_pedido}}</h3>
           
        @switch($type)
          @case("pedidos")
            <a href="{{ route('pedidos.index') }}">
              <button class="btn btn-success pull-right">
                <span class="fa fa-arrow-left"></span> &nbsp; Volver a pedidos
              </button>
            </a> 
            @break
          @case("revisar")
            <a href="{{ route('revisarPedidos.index') }}">
              <button class="btn btn-success pull-right">
            <span class="fa fa-arrow-left"></span> &nbsp; Volver a revisar pedidos
              </button>
            </a> 
            @break
          @case("seguir")
            <a href="{{ route('seguirPedidos.index') }}">
              <button class="btn btn-success pull-right">
            <span class="fa fa-arrow-left"></span> &nbsp; Volver a ejecutar pedidos
              </button>
            </a> 
            @break
        @endswitch

      </div><!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="nombre_cli">Nombre completo del cliente</label>
              <input id="nombre_cli" type="text" class="form-control" name="nombre_cli" 
                  value="{{$pedido->nombre_cli}}" readonly="">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="direccion_cli">Dirección del cliente</label>
              <input id="direccion_cli" type="text" class="form-control" name="direccion_cli" 
                value="{{$pedido->direccion_cli}}" readonly>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="telefono_cli">Teléfono del cliente</label>
              <input id="telefono_cli" type="text" class="form-control" name="telefono_cli"
                value="{{$pedido->telefono_cli}}" readonly="">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="ruc_cli">RUC</label>
              <input id="ruc_cli" type="text" class="form-control" name="ruc_cli"
                value="{{$pedido->ruc_cli}}" readonly>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group @error('fecha') has-error @enderror">
              <label for="fecha">Fecha</label>
              <input id="fecha" type="text" class="form-control" name="fecha"
                value="{{$pedido->fecha}}" readonly="">
            </div>
          </div> 
        </div> 
        <div class="row">
          <div class="col-md-12">
            <table class="table table-bordered" id="product_info_table">
            <caption>Tabla de productor por revisar</caption>
              <thead>
                <tr>
                  <th scope="col" style="width:50%">Producto</th>
                  <th scope="col" style="width:10%">Cantidad</th>
                  <th scope="col" style="width:10%">Precio Unitario </th>
                  <th scope="col" style="width:20%">Monto</th>
                </tr>
              </thead>

              <tbody>
                @foreach($pedido->productos as $producto)
                <tr id="row_{{$loop->iteration}}">
                 <td>
                  <input type="text" class="form-control" value="{{$producto->nombre}}" readonly="">
                  </td>
                  <td><input type="text" value="{{$producto->pivot->cantidad}}" 
                      class="form-control" readonly>
                  </td>
                  <td>
                    <input type="text" class="form-control" readonly="" 
                    value="S/. {{$producto->pivot->pu}}">
                  </td>
                  <td>
                    <input type="text" class="form-control" readonly="" 
                     value="S/. {{$producto->pivot->monto}}">
                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
          <div class="col-md-6 col-xs-12 pull-right">
            <div class="form-group">
              <label for="gross_amount" class="col-sm-5">Monto bruto</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" readonly="" value="S/. {{$pedido->monto_bruto}}">
              </div>
            </div>
            <p>&nbsp;</p>
            <div class="form-group">
              <label for="vat_charge" class="col-sm-5">IGV 18%</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" readonly="" 
                 value="S/. {{round($pedido->monto_bruto*0.18,2)}}">
              </div>
            </div>
            <p>&nbsp;</p>
            <div class="form-group">
              <label for="discount" class="col-sm-5">Descuento(S/. )</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" value="{{($pedido->descuento)?$pedido->descuento:0.00}}" readonly="">
              </div>
            </div>
            <p>&nbsp;</p>
            <div class="form-group">
              <label for="net_amount" class="col-sm-5">Importe neto </label>
              <div class="col-sm-7">
                <input type="text" class="form-control" id="net_amount" name="monto_neto" readonly 
                 value="S/. {{$pedido->monto_neto}}" style="font-weight: bold; color: red;"> 
              </div>
            </div>
          </div>
        </div> <!--- end.row -->  
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>
</div> <!-- /.row-top -->



