<form action="{{route('asignacion.store')}}" method="post">
  @csrf
  <div class="col-md-6">
      <!-- general form elements -->
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Datos insumo&nbsp;|&nbsp; <b> Asignar insumo a Proveedor</b></h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
             <div class="form-group">
              <label for="proveedor">Proveedor <span class="mandatory">*</span></label>
              <select class="form-control" id="proveedor" name="proveedor_id">
                @isset($proveedores)
                    @foreach ( $proveedores as $proveedor)
                      <option selected="true" value="{{$proveedor->id}}">{{$proveedor->razon_social}}</option>
                    @endforeach
                @endisset
              </select>            
            </div>
          </div>
          
        </div>
        <div class="row">
          <div class="col-md-7">
            <div class="form-group @error('insumo_id') has-error @enderror">
              <label for="insumo_id">Insumo <span class="mandatory">*</span></label>
              <select name="insumo_id" id="insumo_id" class="form-control" required="">
                <option value="-1">Seleccione el proveedor primero</option>
              </select>
              @error('insumo_id')
                <span class="help-block" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="col-md-5">
            <div class="form-group">
                <label for="insumo_id">Unidad de Medida<span class="mandatory">*</span></label>
                <input type="text" id="unidad_medida" class="form-control" name="unidad_medida" readonly="" required="">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group @error('precio_compra') has-error @enderror" id="datos-asignacion">
              <label for="precio_compra">Precio del insumo por cada Unidad de Medida <span class="mandatory">*</span></label>
              <input id="precio_compra" type="number" class="form-control" name="precio_compra" placeholder="Ingrese el precio del proveedor al que vende el insumo" value="{{ old('precio_compra') }}" required="" min="1" step="0.01" disabled="true">
              @error('precio_compra')
                <span class="help-block" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>            
          </div>
        </div>

      </div><!-- /.box-body -->
      <div class="box-footer">
        <p>Los campos marcados con (<span class="mandatory" >*</span>) son obligatorios.</p>
        <button type="submit" class="btn pull-right btn-success">
            <i class="fa fa-chain"> </i>
              Asignar 
          </button>
          
      </div><!-- /.box-footer -->
    </div><!-- /.box -->
  </div>
</form>  
    <!--/.col (right) -->


