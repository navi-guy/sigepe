<div class="row">
  <div class="col-md-12">
    <form action="{{route('pedidos.store')}}" method="post">
    @csrf
      <input type="hidden" name="cod_pedido" value="{{$cod_pedido}}">
      <!-- general form elements -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Añadir nuevo&nbsp;<b>Pedido</b>&nbsp;|&nbsp;{{$cod_pedido}}</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group @error('nombre_cli') has-error @enderror">
                <label for="nombre_cli">Nombre completo del cliente 
                  <span class="mandatory">*</span>
                </label>
                <input id="nombre_cli" type="text" class="form-control" name="nombre_cli" 
                placeholder="Ingrese el nombre del cliente" value="{{ old('nombre_cli') }}" required>
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
                <input id="direccion_cli" type="text" class="form-control" name="direccion_cli" placeholder="Ingrese la dirección del cliente" value="{{ old('direccion_cli') }}" required>
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
                <input id="telefono_cli" type="text" class="form-control" name="telefono_cli" placeholder="Ingrese su el teléfono del cliente" value="{{ old('telefono_cli') }}">
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
                <input id="ruc_cli" type="text" class="form-control" name="ruc_cli" placeholder="Ingrese RUC del cliente" value="{{ old('ruc_cli') }}" pattern="[0-9]{11}" title="Formato: 11 dígitos" required>
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
                  placeholder="Fecha del pedido" value="{{ $date }}" readonly="">
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
                <thead>
                  <tr>
                    <th style="width:50%">Producto
                      <span class="mandatory" >*</span>
                    </th>
                    <th style="width:10%">Cantidad
                      <span class="mandatory" >*</span>
                    </th>
                    <th style="width:10%">Precio Unitario
                      <span class="mandatory" >*</span>
                    </th>
                    <th style="width:20%">Monto
                      <span class="mandatory" >*</span>
                    </th>
                    <th style="width:10%"><button type="button" id="add_row" class="btn btn-default"><i class="fa fa-plus"></i></button></th>
                  </tr>
                </thead>

                <tbody>
                  <tr id="row_1">
                   <td>
                    <select class="form-control select_group product" data-row-id="row_1" id="product_1" name="product[]" style="width:100%;" onchange="getProductData(1)" required>
                        <option value="" selected=""></option>
                        <?php foreach ($productos as $k => $v): ?>
                          <option value="<?php echo $v['id'] ?>"><?php echo $v['nombre'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </td>
                    <td><input type="number" name="qty[]" id="qty_1" class="form-control" required onchange="getTotal(1)" min="1">
                    </td>
                    <td>
                      <input type="text" name="rate[]" id="rate_1" class="form-control" disabled autocomplete="off">
                      <input type="hidden" name="rate_value[]" id="rate_value_1" class="form-control" autocomplete="off">
                    </td>
                    <td>
                      <input type="text" name="amount[]" id="amount_1" class="form-control" disabled autocomplete="off">
                      <input type="hidden" name="amount_value[]" id="amount_value_1" class="form-control" autocomplete="off">
                      </td>
                    <td><button type="button" class="btn btn-default" onclick="removeRow('1')"><i class="fa fa-close"></i></button></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="col-md-6 col-xs-12 pull-right">
              <div class="form-group">
                <label for="gross_amount" class="col-sm-5">Monto bruto
                  <span class="mandatory" >*</span>
                </label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="gross_amount" name="monto_bruto" disabled autocomplete="off">
                  <input type="hidden" class="form-control" id="gross_amount_value" name="monto_bruto" autocomplete="off">
                </div>
              </div>
              <p>&nbsp;</p>
              <div class="form-group">
                <label for="vat_charge" class="col-sm-5">IGV 18%
                  <span class="mandatory">*</span>
                </label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="vat_charge" disabled autocomplete="off">
                </div>
              </div>
              <p>&nbsp;</p>
              <div class="form-group">
                <label for="discount" class="col-sm-5">Descuento(S/. )                  
                </label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="discount" name="descuento" placeholder="Descuento" onkeyup="subAmount()" autocomplete="off">
                </div>
              </div>
              <p>&nbsp;</p>
              <div class="form-group">
                <label for="net_amount" class="col-sm-5">Importe neto
                  <span class="mandatory" >*</span>
                </label>
                <div class="col-sm-7">
                  <input type="number" class="form-control" id="net_amount" name="monto_neto" readonly autocomplete="off" min="1">
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
            <i class="fa fa-arrow-left"></i>
            Atrás
          </button>
          <button type="submit" class="btn pull-right btn-success">
            <i class="fa fa-save"> </i>
              Registrar nuevo pedido
          </button>          
        </div><!-- /.box-footer -->

      </div><!-- /.box -->
    </form>
  </div>
</div> <!-- /.row-top -->



