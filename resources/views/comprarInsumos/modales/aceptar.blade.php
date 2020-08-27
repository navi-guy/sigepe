<div class="modal fade" id="modal-aprobar-solicitud" role="dialog">
  <div class="modal-dialog modal-lg">
    <form action="{{route('comprarInsumos.approveSolicitud')}}" method="post" class="modal-content">
      @csrf
      <input type="hidden" id="id-insumo_proveedor" name="id_insumo_proveedor">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Confirmar aprobación</h4>
        <input type="hidden" name="id">
      </div>
      <div class="modal-body">
        <div style="text-align: center">
          <span class="fa fa-check" style="font-size: 25px"></span>
        </div>
        <div class="row">
          <div class="col-md-12">
            <br>
            <div align="center">
              <span  style="font-size: 16px; font-weight: bold;">
                ¿Está seguro de aceptar la siguiente solicitud?
              </span>
            </div>
              
            <br>
            <table class="table table-bordered table-striped">
            <caption>Tabla de compra de insumos</caption>
              <thead>
                <tr>
                  <th scope="col">Insumo</th>
                  <th scope="col">Proveedor</th>
                  <th scope="col">Precio x Unidad</th>
                  <th scope="col">Cantidad Solicitada</th>   
                  <th scope="col">Costo Total</th> 
                </tr>
                <tbody>
                  <td><span id="modal-insumo"></span></td>
                  <td><span id="modal-proveedor"></span></td>
                  <td>S/. <span id="modal-precio_compra"></span></td>
                  <td><span id="modal-cantidad"></span></td>
                  <td>S/. <span id="modal-total"></span></td>
                </tbody>
              </thead>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary pull-right"> <span class="fa fa-check"></span>
        Aprobar Solicitud
        </button>
        <button type="" class="btn btn-default pull-left" data-dismiss="modal"><span class="fa fa-close"></span>
          Cancelar
        </button>
      </div>
    </form>
  </div><!-- /.modal-dialog -->
</div>
