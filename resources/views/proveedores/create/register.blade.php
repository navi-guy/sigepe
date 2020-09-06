  <!-- left column -->
<div class="col-md-6">
  <form action="{{route('proveedores.store')}}" method="post">
  @csrf
    <!-- general form elements -->
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Datos Proveedor &nbsp;|  &nbsp;<strong> Crear nuevo Proveedor</strong></h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group @error('razon_social') has-error @enderror">
              <label for="razon_social">Razón Social <span class="mandatory">*</span></label>
              <input id="razon_social" type="text" class="form-control" name="razon_social" placeholder="Ingrese la Razon Social" value="{{ old('razon_social') }}" minlength="3" maxlength="150" required>
              @error('razon_social')
                <span class="help-block" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group @error('direccion') has-error @enderror">
              <label for="direccion">Dirección </label>
              <input id="direccion" type="text" class="form-control" name="direccion" placeholder="Ingrese su dirección" value="{{ old('direccion') }}" minlength="3" maxlength="150">
              @error('direccion')
                <span class="help-block" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group @error('ruc') has-error @enderror">
              <label for="ruc">RUC <span class="mandatory">*</span></label>
              <input id="ruc" type="number" class="form-control" name="ruc" placeholder="Ingrese su RUC"  value="{{ old('ruc') }}" max="99999999999" step="1"
                  onkeypress="return event.charCode >= 48 && event.charCode <= 57"               required>
              @error('ruc')
                <span class="help-block" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>              
          </div>
          <div class="col-md-6">
            <div class="form-group @error('tipo') has-error @enderror">
              <label for="tipo">Tipo <span class="mandatory">*</span></label>
              <select name="tipo" class="form-control" required="">     
                <option value="" selected="">Seleccione una opción</option>           
                <option value="1" @if (old('tipo') == "1") {{ 'selected' }} @endif>Mecánica</option>
                <option value="2" @if (old('tipo') == "2") {{ 'selected' }} @endif>Fábrica</option>
              </select>    
            </div>
          </div>
        </div>
      </div><!-- /.box-body -->
      <div class="box-footer">
         <p>Los campos marcados con (<span class="mandatory" >*</span>) son obligatorios.</p>
        <button type="submit" class="btn pull-right btn-success">
          <em class="fa fa-plus"> </em>
            Registrar nuevo proveedor
        </button>
      </div><!-- /.box-footer -->
    </div><!-- /.box -->
  </form>
</div>
  <!--/.col (left) -->
