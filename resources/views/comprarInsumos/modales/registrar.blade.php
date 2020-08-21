<div class="modal fade" id="modal-registrar-compra" role="dialog">
    <div class="modal-dialog">
        <form action="{{ route('comprarInsumos.registrarCompra') }}" method="post" class="modal-content">
            @csrf
            <input type="hidden" id="id-insumo_proveedor" name="id_insumo_proveedor">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <span>Registrar Comprad de Insumos </span>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div style="text-align: center; font-size: 25px !important">
                  <span class="fa fa-plus"></span>
                </div>
                <div style="margin: 16px; font-size: 14px;">
                  <p>La compra de insumos será registrada y ya no estará disponible en la lista de solicitudes de insumos.</p>
                  <p><span style="font-size: 14px;">* Se agregarán <span id="nuevos-insumos">00</span> insumos de este tipo al stock.</span></p>         
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success pull-right"><span class="fa fa-plus"></span>
                Registrar Compra
              </button>
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><span class="fa fa-close"></span>
                Cancelar
              </button>
            </div>
        </form>
    </div><!-- /.modal-dialog -->
</div>
