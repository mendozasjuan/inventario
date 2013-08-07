$(document).ready(function(){
    paginar();
    cargar_combos();


            function search_cliente(){
                $.ajax({
                    //data: "q="+q+"&fi="+fi+"&ff="+ff+"&t="+1,
                    type: "POST",
                    dataType: "json",
                    url: URL+'cliente/buscar_clientes/'+$('#clientes').val(),
                        success: function(data){
                            if(data.length > 0){
                                var html ='';
                                $.each(data, function(i,item){
                                    html += '<tr ><td>'+item.id+'</td><td>'+item.nacionalidad+'-'+item.cedula+'</td><td>'+item.nombre_apellido+'</td><td>'+item.direccion+'</td><td>'+item.telefono+'</td><td><a  class="btn" title="Editar" onclick="cliente_individual('+item.id+')" href="#"><i class="icon-pencil"></i> Editar</a><a  class="btn" title="Eliminar" href="#" onclick="eliminarClientes('+item.id+')"><i class="icon-trash"></i> Eliminar</a></td></tr>';
                                });
                                $("#paginar").html(html);
                                $("#paginar").trigger("update");
                                paginar();
                            }
                        }
                  });
             }

            //search_factura($("#empresa").find("option:selected").val(),$("#fechai").val(),$("#fechaf").val());
                        //search_factura();

            $("#clientes").on("keyup",(function(){
                search_cliente();
                
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

function eliminarClientes(id){
    $("#aceptarEliminar").attr("href",URL+"cliente/eliminar/"+id);
    $('#eliminarCliente').modal();
}

function cliente_individual(cliente=""){
      $.ajax({
        type: "POST",
        dataType: "json",
        data:{id:cliente},
        url: URL+"cliente/buscar_cliente_individual",
        success: function(data){
          if(data){
            $("#index").fadeOut();
            $("#form-editar").attr("action",URL+"cliente/guardarEditar/"+data.id);
            $("#cedula").val(data.cedula);
            $("#nombre").val(data.nombre_apellido);
            cargar_combos(data.idMunicipio,data.idParroquia);
            $("#direccion").val(data.direccion);
            $("#telefono").val(data.telefono);
            $("#editar").fadeIn();
          }
        }
      });
}