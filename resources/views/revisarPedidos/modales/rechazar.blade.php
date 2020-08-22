<div class="modal fade" id="modal-rechazar-pedido" role="dialog">
  <div class="modal-dialog modal-sm">
    <form action="{{ route('revisarPedidos.rejectPedido') }}" method="post" class="modal-content">
      @csrf
      <input type="hidden" name="id_pedido_rechazar" id="id_pedido_rechazar">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span></button>
        <span>Rechazar pedido</span>
        <input type="hidden" name="id">
      </div>
      <div style="text-align: center; font-size: 25px !important">
        <span
              class="fa fa-close"></span>
      </div>
        <div style="margin: 16px">
            <span style="font-size: 14px;">El pedido del cliente será rechazado y ya no estará disponible en la evaluación de pedidos.</span>
        </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-danger pull-right"><span class="fa fa-close"></span>
        Rechazar pedido
        </button>
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
      </div>
    </form>
  </div><!-- /.modal-dialog -->
</div>
