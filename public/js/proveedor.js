$('#treeview-proveedores').on('click',function(event){
  $('#treeview-productos').removeClass("active");
  $('#stock-insumos').removeClass("active");
  $('#registrar-pedidos').removeClass("active");
  $('#treeview-usuarios').removeClass("active");
  $('#treeview-revision-pedidos').removeClass("active"); 
  $('#treeview-proveedores').addClass("active");
})


