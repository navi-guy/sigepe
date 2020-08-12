<div class="row">
  <div class="col-md-6">
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="box">
          <div class="row">
            <div class="col-md-12 col-xs-12">
              <!-- /.box-header -->
               <form role="form" action="{{route('productos.update',$producto->id)}}" method="POST" 
                  enctype="multipart/form-data">
                  @method('PUT')
                  @csrf                                               
                <div class="box-body">
                  <div class="form-group" id="vista_previa">
                    <label for="">Vista previa</label>
                    <img src="{{asset($producto->image)}}" alt="img_producto_actual" 
                      height="150px" width="150px">
                  </div>
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
                        <label for="product_name">Nombre del producto</label>
                        <input type="text" class="form-control" id="product_name" name="nombre" placeholder="Nombre del producto" value="{{$producto->nombre}}" required/>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-xs-6">
                      <div class="form-group">
                        <label for="product_name">Precio del producto</label>
                        <input type="number" min="1" max="999999" step="0.01" class="form-control" id="precio" value="{{$producto->precio_unitario}}"
                         name="precio_unitario" placeholder="Precio" required/>
                      </div>
                    </div>
                    <div class="col-md-6 col-xs-6">
                      <label for="tipo_proveedor">Material del Producto</label>
                      <select class="form-control" id="material" name="material" required>
                        <option value="1" @if (1 == old('material', $producto->material))
                          selected="selected" @endif>Material de Laton</option>
                        <option value="2" @if (2 == old('material', $producto->material))
                          selected="selected"   @endif >Material de Acero</option>
                        <option value="3" @if (3 == old('material', $producto->material))
                          selected="selected" @endif>Material de Cobre</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-xs-6">
                      <div class="form-group">
                        <label for="category">Categoría</label>
                        <select class="form-control" name="categoria_id" id="categoria_select">
                          <!-- setear desde js -->
                          @foreach($categorias as $categoria)
                            <option value="{{$categoria->id}}" >{{$categoria->nombre}}</option>
                          @endforeach                    
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6 col-xs-6">
                      <div class="form-group">
                      <label for="tipo_proveedor">Unidad de Medida</label>
                        <select class="form-control" id="unidad_medida" name="unidad_medida">
                          @foreach($unidades_medida as $unidad_medida)
                            <option value="{{$unidad_medida['id']}}" 
                              @if ($unidad_medida['id'] == old('unidad_medida', $producto->unidad_medida)) 
                              selected="selected" @endif>{{$unidad_medida['descripcion']}}</option>
                          @endforeach    
                        </select>
                      </div>
                    </div>                  
                  </div>              
                  <div class="row">
                    <div class="col-md-12 col-xs-12">
                      <div class="form-group">
                        <label for="descripcion">Descripción
                        </label>
                        <textarea type="text" class="form-control" name="descripcion" placeholder="Descripción del producto (opcional)" autocomplete="off" style="resize: none;">
                          {{$producto->descripcion}}
                        </textarea>
                      </div>
                    </div>
                  </div>
                </div> <!--  end.box register- -->
                <!-- Table insumos-->
                <table class="table table-bordered" id="product_info_table">
                  <thead>
                    <tr>
                      <th style="width:50%">Insumo</th>
                      <th style="width:10%">Cantidad</th>
                      <th style="width:10%">
                        <button type="button" id="add_row" class="btn btn-default"><i class="fa fa-plus"></i></button>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($producto->insumos as $insumo_selected)
                    <tr id="row_{{$loop->iteration}}">
                      <td>
                        <select class="form-control select_group product" data-row-id="row_{{$loop->iteration}}" id="product_{{$loop->iteration}}" name="insumo[]" style="width:100%;">
                          @foreach($insumos as $insumo)
                            <option value="{{$insumo->id}}" @if($insumo->id == $insumo_selected->id)  selected="selected" @endif>{{$insumo->nombre}}-{{$insumo->getUnidadMedida()}}</option>
                          @endforeach
                        </select>
                      </td>
                      <td>
                        <input type="number"  min="1" max="500" pattern="^[0-9]+" name="qty[]" id="qty_{{$loop->iteration}}" class="form-control" value="{{ $insumo_selected->pivot->cantidad}}" required>
                      </td>
                      <td><button type="button" class="btn btn-default" onclick="removeRow({{$loop->iteration}})">
                        <i class="fa fa-close"></i></button>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>              
                <div class="box-footer">
                  <button type="submit" class="btn btn-success pull-right"><span class="fa fa-save"></span>
                    &nbsp; Guardar Cambios</button>
                  <a href="{{ route('productos.index') }}" class="btn btn-primary">Atrás</a>
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