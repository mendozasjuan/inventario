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
                    url: "<?php echo URL;?>cliente/buscar_clientes/"+$('#clientes').val(),
                        success: function(data){
                            if(data.length > 0){
                                var html ='';
                                $.each(data, function(i,item){
                                    html += '<tr class="rows"><td>'+item.id+'</td><td>'+item.nacionalidad+'-'+item.cedula+'</td><td>'+item.nombre_apellido+'</td><td>'+item.direccion+'</td><td>'+item.telefono+'</td><td><a class="tip" title="Editar" href="<?php echo URL ?>cliente/editar/'+item.id+'"><img src="<?php echo URL; ?>public/images/bedit.png" alt="Editar" /></a>&nbsp;<a class="tip" title="Eliminar" href="#" onclick="eliminarCliente('+item.id+')"><img  src="<?php echo URL; ?>public/images/bdelete.png" alt="Eliminar" /></a></td></tr>';
                                });
                                                                //console.log(html);

                                $(".sortable tbody").html(html);
                                $(".sortable").trigger("update");
                                var sorting = [[1,0]];
                                $(".sortable").trigger("sorton",[sorting]);
                            }
                        }
                  });
             }

            //search_factura($("#empresa").find("option:selected").val(),$("#fechai").val(),$("#fechaf").val());
                        //search_factura();

                        $("#clientes").live("keyup",(function(){
                search_cliente();
            }));
        
       

});

function eliminarClientes(id){
    if(confirm("¿Desea Eliminar este Cliente?")){
        location.href="http://localhost/inventario/cliente/eliminar/"+id;
    }
//    else{
//        return false;
//    }
}