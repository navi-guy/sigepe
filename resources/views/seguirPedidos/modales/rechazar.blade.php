<div class="modal fade" id="modal-rechazar-pedido" role="dialog">
  <div class="modal-dialog modal-sm" >
    <form action="{{route('revisarPedidos.rejectPedido')}}" method="post" class="modal-content">
      @csrf
      <input type="hidden" id="id_pedido" name="id_pedido">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Confirmar rechazo</h4>
        <input id="id-edit" type="hidden" name="id">
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group" align="center">
              <label for="razon_social-edit" style="font-size: 15px;">¿Estás seguro de rechazar el pedido?</label>
            </div>
          </div><!--/.col --> 
        </div> 
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger pull-right"><span class="fa fa-close"></span>&nbsp;Rechazar</button>
        <button type="" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
      </div>
    </form>
  </div><!-- /.modal-dialog -->
</div>
