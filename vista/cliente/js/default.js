$(document).ready(function(){
    $("#municipio").change(function(){
        //obtener el valor de lo que esta seleccionado
        var id = $("#municipio").find(':selected').val();
        
        //limpiar parroquias
        $("#parroquia").empty();

            $.ajax({
               type:"POST",
               dataType:"json",
               url:"http://localhost/inventario/cliente/cargarParroquias/"+id,
                success:function(data){
                     $("#parroquia").append("<option value='seleccione'>Seleccione</option>");
                     for (i=0; i < data.length; i++){
                        $("#parroquia").append("<option value=" + data[i].idParroquia + ">" + data[i].parroquia + "</option>");
                     }
                }
            });
            
            
        });

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
                                    html += '<tr ><td>'+item.id+'</td><td>'+item.nacionalidad+'-'+item.cedula+'</td><td>'+item.nombre_apellido+'</td><td>'+item.direccion+'</td><td>'+item.telefono+'</td><td><a  class="btn" title="Editar" href="'+URL+'cliente/editar/'+item.id+'"><i class="icon-pencil"></i> Editar</a><a  class="btn" title="Eliminar" href="#" onclick="eliminarClientes('+item.id+')"><i class="icon-trash"></i> Eliminar</a></td></tr>';
                                });
                                                                //console.log(html);

                                $("#tabla-clientes tbody").html(html);
                                $("#tabla-clientes").trigger("update");
                            }
                        }
                  });
             }

            //search_factura($("#empresa").find("option:selected").val(),$("#fechai").val(),$("#fechaf").val());
                        //search_factura();

                        $("#clientes").on("keyup",(function(){

                search_cliente();
            }));

});

function eliminarClientes(id){
    $("#aceptarEliminar").attr("href",URL+"cliente/eliminar/"+id);
    $('#eliminarCliente').modal();
}