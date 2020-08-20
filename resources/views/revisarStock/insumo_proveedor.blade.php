<!-- Start insumo_proveedor modal -->
<div class="modal fade" id="insumoProveedorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Proveedores del insumo seleccionado
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </h3>
      </div>
      <form action="{{route('revisarStock.store')}}" method="POST" id="insumoProveedorForm">
        @csrf
        <input type="hidden" name="id_insumo" id="id_insumo-modal">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <label> Insumo </label>
              <input type="text" id="nombre-modal" class="form-control" readonly="">
            </div>
            <div class="col-md-3">
              <label> Unidad Medida </label>
              <input type="text" id="unidad_medida-modal"  class="form-control" readonly="">
            </div>
            <div class="col-md-3">
              <label> Cantidad actual </label>
              <input type="text" id="cantidad-modal" class="form-control"  readonly="">
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-12">
              <div class="show-proveedores"></div>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">
            <span class="fa fa-close"></span>&nbsp;Cerrar</button>
          <button type="submit" class="btn btn-info"><span class="fa fa-send"></span>&nbsp;Solicitar</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End insumo_proveedor modal -->
