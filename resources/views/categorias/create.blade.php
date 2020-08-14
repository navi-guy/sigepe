<div class="col-md-4">
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Registrar Categoría </h3>
    </div><!-- /.box-header -->
    <div class="box-body">
      <form class="" action="{{route('categorias.store')}}" method="post">
        @csrf
        <div class="row">
          <div class="col-md-12">
            <div class="form-group @error('nombre') has-error @enderror">
              <label for="nombre">Nombre Categoría</label>
              <input id="nombre" type="text" class="form-control" value="{{old("nombre")}}"
                      name="nombre" placeholder="Ingrese la categoria" required>
              @error('nombre')
              <span class="help-block" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>         
          </div>
          <div class="col-md-12">
            <div class="form-group pull-right" >
              <button type="submit" class="btn btn-success">
                <i class="fa fa-plus"></i> &nbsp;
                  Agregar nueva categoría
              </button>
            </div>
          </div>
        </div> <!-- end row -->
      </form>
    </div>      
  </div> <!-- end box -->
</div>