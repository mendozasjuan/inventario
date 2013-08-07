        	$(function() {
                paginar();
                             function search_proveedor(){
				$.ajax({
					//data: "q="+q+"&fi="+fi+"&ff="+ff+"&t="+1,
					type: "POST",
					dataType: "json",
					url: URL+"proveedor/buscar_proveedores/"+$('#proveedores').val(),
						success: function(data){
							if(data.length > 0){
								var html ='';
								$.each(data, function(i,item){
									html += '<tr class="rows">\
                                                                                    <td>'+item.id+'</td>\
                                                                                    <td>'+item.rif+'</td>\
                                                                                    <td>'+item.razon_social+'</td>\
                                                                                    <td>'+item.telefono+'</td>\
                                                                                    <td>'+item.direccion+'</td>\
                                                                                    <td>'+item.email+'</td>\
                                                                                    <td class="options">\
                                                                                    <a class="btn" title="Listar Productos" href="'+URL+'producto/producto_proveedor/'+item.id+'"><i class="icon-pencil"></i> Listar Productos</a><a class="btn" title="Editar" onclick="proveedor_individual('+item.id+')" href="#"><i class="icon-pencil"></i> Editar</a><a class="btn" title="Eliminar" href="#" onclick="eliminarProveedor('+item.id+')"><i class="icon-pencil"></i> Eliminar</a></td>\
        </tr>';
								});
                                                                console.log(html);

								$("#paginar").html(html);
								$("#tabla-proveedores").trigger("update");
							}
						}
				  });
			 }

			//search_factura($("#empresa").find("option:selected").val(),$("#fechai").val(),$("#fechaf").val());
                        //search_factura();

                        $("#proveedores").on("keyup",(function(){
				search_proveedor();
			}));


            function paginar(){
              $("#paginacion").jPages({
                containerID: "paginar",
                perPage:1,
                previous: "Anterior",
                next: "Siguiente"
              });            
            }

            $("#atras").on("click",function(){
                $("#editar").fadeOut();
                $("#index").fadeIn();
            });

			});

function eliminarProveedor(id){
    $("#aceptarEliminar").attr("href",URL+"proveedor/eliminar/"+id);
    $('#eliminarProveedor').modal();
}

function proveedor_individual(proveedor){
      $.ajax({
        type: "POST",
        dataType: "json",
        data:{id:proveedor},
        url: URL+"proveedor/buscar_proveedor_individual",
        success: function(data){
          if(data){
            $("#index").fadeOut();
            $("#form-editar").attr("action",URL+"proveedor/guardarEditar/"+data.id);
            $("#rif").val(data.rif);
            $("#razon_social").val(data.razon_social);
            $("#telefono").val(data.telefono);
            $("#direccion").val(data.direccion);
            $("#email").val(data.email);
            $("#editar").fadeIn();
          }
        }
      });
}