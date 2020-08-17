<div class="modal  fade" id="modal_aprobar_pedido" role="dialog">
  <div class="modal-dialog modal-sm" >
    <form action="{{route('seguirPedidos.approvePedido')}}" method="post" class="modal-content">
      @csrf
      <input type="hidden" name="id_pedido">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Aprobar pedido</h4>
        <input type="hidden" name="id">
      </div>
      <div class="modal-body">
        <div>
          <span class="fa fa-check" style="font-size: 25px"></span>
        </div>
            <div>
              <span  style="font-size: 14%;">El pedido del cliente será aprobado para</span>
            </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success pull-right">Aprobar pedido</button>
        <button type="" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
      </div>
    </form>
  </div><!-- /.modal-dialog -->
</div>
