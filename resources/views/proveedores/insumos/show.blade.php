@foreach($proveedor->insumos as $insumo)
@if( $loop->iteration % 2 != 0 )
<div class="row">
@endif
  <div class="col-md-6">
      <!-- general form elements -->
    <div class="box box-success">      
      <div class="box-header with-border">
        <h3 class="box-title">Insumo N° <span> {{$loop->iteration}}</span></h3>
      </div><!-- /.box-header -->

      <div class="box-body">
        <form action="{{ route('asignacion.update',0) }}" method="POST">
          @csrf
          @method('PUT')
          <input type="hidden" name="id" value="{{$insumo->pivot->id}}">
          <input type="hidden" name="proveedor_id" value="{{$proveedor->id}}">
          <input type="hidden" name="insumo_id" value="{{$insumo->id}}">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="insumo">Insumo*</label>
              <input type="text" class="form-control"value="{{$insumo->nombre }}" readonly="">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="unidad_medida">Unidad de medida</label>
              <input type="text" class="form-control" value="{{$insumo->getUnidadMedida()}}" readonly="">
            </div>            
          </div>
          <div class="col-md-6">
            <div class="form-group @error('precio_compra') has-error @enderror">
              <label for="precio_compra">Precio por Unidad de Medida(S/.) <span class="mandatory">*</span></label>
              <input id="precio_compra" type="number" class="form-control" name="precio_compra" placeholder="Ingrese el precio de compra" value="{{$insumo->pivot->precio_compra}}" min="1" max="999999">
              @error('precio_compra')
                <span class="help-block" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>           
          </div>
        </div>
          <button type="submit" class="btn pull-right btn-success">
            <i class="fa fa-pencil"> </i>
              Guardar Cambios 
          </button>
    </form>
        <form style="display:inline" method="POST" action="{{ route('asignacion.destroy', $insumo->pivot->id) }}" onsubmit="return confirmarDeleteInsumo()">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger pull-left">
            <span class="fa fa-chain-broken"></span>
              Remover
          </button>
        </form>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>
  
@if( $loop->iteration % 2 == 0 )
</div>
@endif
@endforeach



    <!--/.col (right) -->


