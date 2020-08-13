<div class="modal  fade" id="modal-aprobar-pedido" role="dialog">
  <div class="modal-dialog modal-sm" >
    <form action="{{route('revisarPedidos.approvePedido')}}" method="post" class="modal-content">
      @csrf
      <input type="hidden" id="id_pedido" name="id_pedido">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Confirmar aprobación</h4>
        <input id="id-edit" type="hidden" name="id">
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group" align="center">
              <label for="razon_social-edit" style="font-size: 15px;">¿Estás seguro de aprobar el pedido?</label>
            </div>
          </div><!--/.col --> 
        </div>  <!--/.row --> 
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success pull-right"><span class="fa fa-check"></span>&nbsp;Aprobar</button>
        <button type="" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
      </div>
    </form>
  </div><!-- /.modal-dialog -->
</div>
