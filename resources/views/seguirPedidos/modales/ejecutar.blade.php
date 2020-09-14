<div class="modal  fade" id="modal-ejecutar-pedido" role="dialog">
  <div class="modal-dialog modal-sm" >
    <form action="{{route('seguirPedidos.ejecutarPedido')}}" method="post" class="modal-content">
   
      @csrf
      <input type="hidden" name="id_pedido_ejecutar" id="id_pedido_ejecutar">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Confirmar Ejecución</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group" style="text-align: center;">
              <label for="razon_social-edit" style="font-size: 15px;">¿Estás seguro de ejecutar este pedido?</label>
            </div>
          </div><!--/.col --> 
        </div>  <!--/.row --> 
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-info pull-right"><span class="fa fa-pause-circle-o" ></span>&nbsp;Ejecutar</button>
        <button type="" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
      </div>
    </form>
  </div><!-- /.modal-dialog -->
</div>
