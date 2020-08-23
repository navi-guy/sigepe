<div class="modal fade" id="modal_aprobar_pedido" role="dialog">
  <div class="modal-dialog modal-sm" >
    <form action="{{route('seguirPedidos.approvePedido')}}" method="post" class="modal-content">
      @csrf
      <input type="hidden" name="id_pedido_por_aprobar" id="id_pedido_por_aprobar">
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
            <div>
              <span  style="font-size: 14px;">
                1. Se verifica si hay insumos necesarios para fabricar los productos del pedido.
                <br/><br/>
                2. Se aprueba el pedido del cliente si hay insumos suficientes.
              <br/><br/>
                3. Se muestra la opción de esperar insumos si no hay insumos suficientes.
              <br/><br/>
               <strong> 4. Se descontarán los insumos que se usarán en el pedido.</span>
            </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success pull-right"> <span class="fa fa-check"></span>
        Aprobar pedido</button>
        <button type="" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
      </div>
    </form>
  </div><!-- /.modal-dialog -->
</div>
