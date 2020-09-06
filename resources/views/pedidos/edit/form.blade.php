<div class="row">
  <div class="col-md-12">
    <form action="{{route('pedidos.update',$pedido->id)}}" method="post">
    @csrf
    @method('PUT')
      <!-- general form elements -->
      <input type="hidden" name="cod_pedido" value="{{$pedido->cod_pedido}}">
      <div class="box box-success">
        <div class="box-header with-border">
         {{$pedido->cod_pedido}}</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group @error('nombre_cli') has-error @enderror">
                <label for="nombre_cli">Nombre completo del cliente 
                  <span class="mandatory" >*</span>
                </label>
                <input id="nombre_cli" type="text" class="form-control" name="nombre_cli" 
                placeholder="Ingrese el nombre del cliente" value="{{ $pedido->nombre_cli}}" minlength="3" maxlength="150" required >
                @error('nombre_cli')
                  <span class="help-block" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group @error('direccion_cli') has-error @enderror">
                <label for="direccion_cli">Dirección del cliente
                  <span class="mandatory" >*</span>
                </label>
                <input id="direccion_cli" type="text" class="form-control" name="direccion_cli" placeholder="Ingrese la dirección del cliente" value="{{ $pedido->direccion_cli}}"  minlength="3" maxlength="150" required>
                @error('direccion_cli')
                  <span class="help-block" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group @error('telefono_cli') has-error @enderror">
                <label for="telefono_cli">Teléfono del cliente 
                  <span class="mandatory" >*</span>
                </label>
                <input id="telefono_cli" type="number" class="form-control" name="telefono_cli" placeholder="Ingrese su el teléfono del cliente" value="{{  $pedido->telefono_cli }}" max="99999999999999999999" step="1" 
                onkeypress="return event.charCode >= 48 && event.charCode <= 57"               required>
                @error('telefono_cli')
                  <span class="help-block" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group @error('ruc_cli') has-error @enderror">
                <label for="ruc_cli">RUC del cliente
                  <span class="mandatory" >*</span>
                </label>
                <input id="ruc_cli" type="number" class="form-control" name="ruc_cli" placeholder="Ingrese RUC del cliente" value="{{ $pedido->ruc_cli }}" max="99999999999" step="1"
                  onkeypress="return event.charCode >= 48 && event.charCode <= 57"               required>
                @error('ruc_cli')
                  <span class="help-block" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group @error('fecha') has-error @enderror">
                <label for="fecha">Fecha 
                  <span class="mandatory" >*</span>
                </label>
                <input id="fecha" type="text" class="form-control" name="fecha"
                  placeholder="Fecha del pedido" value="{{ $pedido->fecha }}" readonly="">
                @error('fecha')
                  <span class="help-block" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div> 
          </div> 
          <div class="row">
            <div class="col-md-12">
              <table class="table table-bordered" id="product_info_table">
              <caption>información del producto</caption>
                <thead>
                  <tr>
                    <th th scope="col" style="width:50%">Producto
                      <span class="mandatory" >*</span>
                    </th>
                    <th th scope="col" style="width:10%">Cantidad
                      <span class="mandatory" >*</span>
                    </th>
                    <th th scope="col" style="width:10%">Precio Unitario
                      <span class="mandatory" >*</span>
                    </th>
                    <th th scope="col" style="width:20%">Monto
                      <span class="mandatory" >*</span>
                    </th>
                    <th th scope="col" style="width:10%"><button type="button" id="add_row" class="btn btn-default"><em class="fa fa-plus"></em></button></th>
                  </tr>
                </thead>

                <tbody>
                  @foreach($pedido->productos as $producto_selected)
                    <tr id="row_{{$loop->iteration}}">
                     <td>
                      <select class="form-control select_group product" data-row-id="row_{{$loop->iteration}}" id="product_{{$loop->iteration}}" name="product[]" style="width:100%;" onchange="getProductData({{$loop->iteration}})" required>
                          @foreach($productos as $producto)
                            <option value="{{$producto->id}}" @if($producto->id == $producto_selected->id)  selected="selected" @endif>{{$producto->nombre}}-{{$producto->getUnidadMedida()}}</option>
                          @endforeach
                        </select>
                      </td>
                      <td><input type="number"  name="qty[]" id="qty_{{$loop->iteration}}" class="form-control" value="{{$producto_selected->pivot->cantidad}}" required onkeyup="getTotal({{$loop->iteration}})" min="1">
                      </td>
                      <td>
                        <input type="text" name="rate[]" id="rate_{{$loop->iteration}}" class="form-control" disabled autocomplete="off" value="{{$producto_selected->pivot->pu}}">
                        <input type="hidden" name="rate_value[]" id="rate_value_{{$loop->iteration}}" class="form-control" autocomplete="off" value="{{$producto_selected->pivot->pu}}">
                       </td>
                      <td>
                        <input type="text" name="amount[]" id="amount_{{$loop->iteration}}" class="form-control" disabled autocomplete="off" value="{{$producto_selected->pivot->monto}}">
                        <input type="hidden" name="amount_value[]" id="amount_value_{{$loop->iteration}}" class="form-control" autocomplete="off" value="{{$producto_selected->pivot->monto}}">
                        </td>
                      <td><button type="button" class="btn btn-default" onclick="removeRow({{$loop->iteration}})"><em class="fa fa-close"></em></button></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="col-md-6 col-xs-12 pull-right">
              <div class="form-group">
                <label for="gross_amount" class="col-sm-5">Monto bruto
                  <span class="mandatory" >*</span>
                </label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="gross_amount" name="monto_bruto" disabled autocomplete="off" value="{{$pedido->monto_bruto}}">
                  <input type="hidden" class="form-control" id="gross_amount_value" name="monto_bruto" autocomplete="off" value="{{$pedido->monto_bruto}}">
                </div>
              </div>
              <p>&nbsp;</p>
              <div class="form-group">
                <label for="vat_charge" class="col-sm-5">IGV 18%
                  <span class="mandatory" >*</span>
                </label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="vat_charge" disabled autocomplete="off" value="{{round($pedido->monto_bruto*0.18,2)}}">
                </div>
              </div>
              <p>&nbsp;</p>
              <div class="form-group">
                <label for="discount" class="col-sm-5">Descuento(S/. )                  
                </label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="discount" name="descuento" placeholder="Descuento" onkeyup="subAmount()" autocomplete="off" value="{{($pedido->descuento)?$pedido->descuento:0.00}}">
                </div>
              </div>
              <p>&nbsp;</p>
              <div class="form-group">
                <label for="net_amount" class="col-sm-5">Importe neto
                  <span class="mandatory" >*</span>
                </label>
                <div class="col-sm-7">
                  <input type="number" class="form-control" id="net_amount" name="monto_neto" readonly autocomplete="off" value="{{$pedido->monto_neto}}" min="1">
                </div>
              </div>
            </div>
          </div> <!--- end.row -->  
          <div>
            <p>Los campos marcados con (<span class="mandatory" >*</span>) son obligatorios.</p>
          </div>
        </div><!-- /.box-body -->
        <div class="box-footer">
          <button class="btn btn-default pull-left">
            <em class="fa fa-arrow-left"></em>
            Atrás
          </button>
          <button type="submit" class="btn pull-right btn-success">
            <em class="fa fa-save"> </em>
              Guardar cambios
          </button>          
        </div><!-- /.box-footer -->

      </div><!-- /.box -->
    </form>
  </div>
</div> <!-- /.row-top -->



