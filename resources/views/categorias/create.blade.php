<div class="modal fade" id="modal-create-categoria" style="display: none;">
  <div class="modal-dialog">
    <div class="box">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Nueva categoría</h4>
      </div>
      <div class="box-body">
        <form class="" action="{{route('categorias.store')}}" method="post">
          @csrf
          <div class="row">
            <div class="col-md-12">
              <div class="form-group @error('nombre') has-error @enderror">
                <input id="nombre" type="text" class="form-control" value="{{old("nombre")}}"
                        name="nombre" placeholder="Nombre de la categoría" required>
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
                    Guardar categoría
                </button>
              </div>
            </div>
          </div> <!-- end row -->
        </form>
      </div>      
    </div> <!-- end box -->
  </div>
</div>