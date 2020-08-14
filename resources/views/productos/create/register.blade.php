<div class="row">
  <div class="col-md-6">
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="box">
          <div class="row">
            <div class="col-md-12 col-xs-12">
              <!-- /.box-header -->
               <form role="form" action="{{route('productos.store')}}" method="POST" 
                  enctype="multipart/form-data">
                  @csrf                                               
                <div class="box-body">
                  <div class="form-group">
                    <div class="kv-avatar">
                      <div class="file-loading">
                        <input id="product_image" name="image" type="file">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 col-xs-12">
                      <div class="form-group">
                        <label for="product_name">Nombre del producto <span class="mandatory">*</span></label>
                        <input type="text" class="form-control" id="product_name" name="nombre" placeholder="Nombre del producto" required/>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-xs-6">
                      <div class="form-group">
                        <label for="product_name">Precio del producto <span class="mandatory">*</span></label>
                        <input type="number" min="1" max="999999" step="0.01" class="form-control" id="precio" name="precio_unitario" placeholder="Precio" required/>
                      </div>
                    </div>
                    <div class="col-md-6 col-xs-6">
                      <label for="tipo_proveedor">Material del Producto <span class="mandatory">*</span></label>
                      <select class="form-control" id="material" name="material" required>
                        <option value="1">Material de Laton</option>
                        <option value="2">Material de Acero</option>
                        <option value="3">Material de Cobre</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-xs-6">
                      <div class="form-group">
                        <label for="category">Categoría <span class="mandatory">*</span></label>
                        <select class="form-control" name="categoria_id" id="categoria_select">
                          @foreach($categorias as $categoria)
                            <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                          @endforeach                    
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6 col-xs-6">
                      <div class="form-group">
                      <label for="tipo_proveedor">Unidad de Medida <span class="mandatory">*</span></label>
                        <select class="form-control" id="unidad_medida" name="unidad_medida">
                          @foreach($unidades_medida as $unidad_medida)
                            <option value="{{$unidad_medida['id']}}">{{$unidad_medida['descripcion']}}</option>
                          @endforeach                        
                        </select>
                      </div>
                    </div>                  
                  </div>              
                  <div class="row">
                    <div class="col-md-12 col-xs-12">
                      <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea type="text" class="form-control" name="descripcion" placeholder="Descripción del producto" autocomplete="off" style="resize: none;"></textarea>
                      </div>
                    </div>
                  </div>
                </div> <!--  end.box register- -->
                <!-- Table insumos-->
                <table class="table table-bordered" id="product_info_table">
                  <thead>
                    <tr>
                      <th style="width:50%">
                          <label for="">Insumo <span class="mandatory">*</span></label>                                        
                      </th>
                      <th style="width:10%">Cantidad <span class="mandatory">*</span></th>
                      <th style="width:10%">
                        <button type="button" id="add_row" class="btn btn-default"><i class="fa fa-plus"></i></button>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr id="row_1">
                      <td>
                        <div class="form-group @error('insumo.0') has-error @enderror">
                          <select class="form-control select_group product" data-row-id="row_1" id="product_1" name="insumo[]" style="width:100%;">
                            <option value=""></option>
                          @foreach($insumos as $insumo)
                            <option value="{{$insumo->id}}" 
                                @if(old('insumo.0')==$insumo->id)selected="selected"@endif>
                                {{$insumo->nombre}} - {{$insumo->getUnidadMedida()}}
                            </option>
                          @endforeach
                          </select> 
                          @error('insumo.0')
                          <span class="help-block" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                      </td>
                      <td><input type="number" min="1" max="500" pattern="^[0-9]+" name="qty[]" id="qty_1" class="form-control" required value="{{old('qty.0')}}">
                      </td>
                      <td><button type="button" class="btn btn-default" onclick="removeRow('1')">
                        <i class="fa fa-close"></i></button>
                      </td>
                    </tr>
                  </tbody>
                </table>            
                <div class="box-footer">
                  <p>Los campos marcados con (<span class="mandatory" >*</span>) son obligatorios.</p>
                  <button type="submit" class="btn btn-success pull-right"><span class="fa fa-save"></span>&nbsp; Añadir producto</button>
                  <a href="{{ route('productos.index') }}" class="btn btn-default"><span class="fa fa-arrow-left"></span> Atrás</a>
                </div>
              </form>              
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- col-md-12 -->
    </div>
  </div>
  <div class="col-md-6">
    <div class="avatar pull-left" align="center">      
      <img src="{{ asset('dist/img/icons/create_product.png') }}">
    </div>
  </div>  
</div>