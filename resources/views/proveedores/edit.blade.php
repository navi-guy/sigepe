<div class="modal fade" id="modal-edit-proveedor" role="dialog">
  <div class="modal-dialog">
     <form action="{{route('proveedores.update',0)}}" method="post" class="modal-content">
      @csrf
      @method('PUT')
      <input type="hidden" name="id" id="id-edit">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Editar datos del proveedor</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title">Datos principales</h3>
              </div><!-- /.box-header -->
              <div class="box-body">
              
                <div class="form-group @error('razon_social') has-error @enderror">
                  <label for="razon_social-edit">Razon Social <span class="mandatory">*</span></label>
                  <input id="razon_social-edit" type="text" class="form-control" 
                          name="razon_social" value="{{ old('razon_social') }}" placeholder="Ingrese la Razon Social"  minlength="3" maxlength="150" required>
                  @error('razon_social')
                    <span class="help-block" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              <div class="form-group @error('ruc') has-error @enderror">
                <label for="ruc">RUC <span class="mandatory">*</span></label>
                <input id="ruc-edit" type="number" class="form-control" name="ruc" placeholder="Ingrese su RUC" value="{{ old('ruc') }}" max="99999999999" step="1"
                  onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                 title="El RUC debe tener 11 dígitos" required="">
                @error('ruc')
                  <span class="help-block" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </div><!--/.col (left) -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title">Datos secundarios</h3>
              </div><!-- /.box-header -->
              <div class="box-body">
                <div class="form-group @error('direccion') has-error @enderror">
                  <label for="direccion">Dirección</label>
                  <input id="direccion-edit" type="text" class="form-control" name="direccion" placeholder="Dirección" value="{{ old('direccion') }}" minlength="3" maxlength="150">
                  @error('direccion')
                    <span class="help-block" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>  
                <div class="form-group @error('tipo') has-error @enderror">
                  <label for="tipo">Tipo <span class="mandatory">*</span></label>
                  <select name="tipo" id="tipo-edit" class="form-control"required="">                
                    <option value="" selected="">Seleccione una opción</option>                         
                    <option value="1" @if (old('tipo') == "1") {{ 'selected' }} @endif>Mecánica</option>
                    <option value="2" @if (old('tipo') == "2") {{ 'selected' }} @endif>Fábrica</option>
                  </select>   
                </div>  
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </div><!--/.col (right) -->
        </div> 
      </div>
      <div class="modal-footer">
        <p>Los campos marcados con (<span class="mandatory" >*</span>) son obligatorios.</p>
        <button type="submit" class="btn btn-success pull-left">Guardar cambios</button>
        <button type="" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </form><!-- /.form-modal-content -->
  </div><!-- /.modal-dialog -->
</div>
