<div class="row">
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Insumo</span>
      <select class="form-control" id="filter-planta" name="planta_id" >
        @foreach( $plantas as $planta )
          <option value="{{$planta->id}}">{{$planta->planta}}</option>
        @endforeach
      </select>
    </div><!-- /input-group -->
  </div>
        <!-- /.col -->

</div>