<script type="text/javascript">
            $(function() {
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



        </script>
<div class="block_head">
        <div class="bheadl"></div>
        <div class="bheadr"></div>
        
        <h2> Clientes</h2>
        
        <ul class="tabs">
            <li class="active nobg"><a href="#list">Listar</a></li>
            <li><a href="#new">Nuevo Cliente</a></li>
        </ul>

         <ul>
            <li>Buscar:<input type="text" id="clientes" value="" ></li>
        </ul>
    </div>
<div style="display: block;" class="block_content tab_content " id="list">
                <form action="" method="post">
        
            <table class="sortable" cellpadding="0" cellspacing="0" width="100%">
<!--<div>-->
<!--<a class="enlace-lista" href="<?php echo URL ?>persona/nuevo"><img src="<?php echo URL; ?>public/images/user_add.png" alt="Nueva Persona" title="Agregar Persona"/></a>-->

    <thead>
        <tr>
            <th>Id</th>
            <th>Cedula</th>
            <th>Nombre</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
<?php 
foreach ($this->listaClientes as $key => $value) {
?>
   <tr>
        <td>
                <?php echo $value['id'];?>
       </td>
        <td>
                <?php echo $value['nacionalidad']."-".$value['cedula'];?>
        </td>
        <td>
                <?php echo $value['nombre_apellido'];?> 
        </td>
        <td>
                <?php echo $value['direccion'];?> 
        </td>
        <td>
                <?php echo $value['telefono'];?> 
        </td>

        <td class="options">
            <a class="tip" title="Editar" href="<?php echo URL ?>cliente/editar/<?php echo $value['id'] ?>"><img src="<?php echo URL; ?>public/images/bedit.png" alt="Editar" /></a> 
            <a class="tip" title="Eliminar" href="#" onclick="eliminarClientes(<?php echo $value['id'] ?>)"><img  src="<?php echo URL; ?>public/images/bdelete.png" alt="Eliminar" /></a>
        </td>
        
    </tr>
<?php } ?>
</tbody>
    </table>
                                               </form>
        
    </div>

<div style="display: none;" class="block_content tab_content hide" id="new">
    <form novalidate="novalidate" method="post" action="<?php echo URL ?>cliente/crear" enctype="multipart/form-data" id="form_">
            <p>
        <label for="nacionalidad">Nacionalidad</label><br>
            <select class="styled valid" style="opacity: 0; position: relative; z-index: 100;" name="nacionalidad">
            <option value="V">Venezolano</option>
            <option value="E">Extranjero</option>
        </select>
                
    </p>
    
    <p>
        <label for="nombre">Cedula</label><br>
        <input type="text" name="cedula" id="cedula" value="" size="55" class="text required"/>
    </p>
    
    <p>
        <label for="nombre">Nombre</label><br>
        <input  type="text" name="nombre" id="nombre" value="" size="55" class="text required" />
    </p>
    
    <p>
        <label for="municipio">Municipio</label><br>
        <select class="styled valid" style="opacity: 0; position: relative; z-index: 100;" name="municipio" id="municipio">
            <option value="seleccione">Seleccione</option>
            <?php foreach ($this->municipios as $key => $value) {?>
            <option value="<?php echo $value['idMunicipio']?>"><?php echo utf8_decode($value['municipio'])?></option>
             <?php }?>
        </select>
    </p>
    
    <p>
        <label for="parroquia">Parroquia</label><br>
        <select class="styled valid" style="opacity: 0; position: relative; z-index: 100;" name="parroquia" id="parroquia">
            <option value="seleccione">Seleccione</option>
        </select>
    </p>

    <p>
        <label for="direccion">Direccion</label><br>
        <input class="text m" type="text" name="direccion" id="direccion" value=""/>
    </p>

    <p>
        <label for="password">Telefono</label><br>
        <input  type="text" name="telefono" id="telefono" value="" size="55" class="text required"/>
    </p>
    
    <p>
       <input class="submit long" class="boton-enviar" type="submit" /> 
    </p>
    
    </form>
</div>
<!--</div>-->