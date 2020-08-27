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
              <input id="razon_social" type="text" class="form-control" name="razon_social" placeholder="Ingrese la Razon Social" value="{{ old('razon_social') }}" required>
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
              <input id="direccion" type="text" class="form-control" name="direccion" placeholder="Ingrese su dirección" value="{{ old('direccion') }}">
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
              <input id="ruc" type="text" class="form-control" name="ruc" placeholder="Ingrese su RUC" value="{{ old('ruc') }}" pattern="[0-9]{11}" title="Formato: 11 dígitos" required>
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
              <select name="tipo" class="form-control">                
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
