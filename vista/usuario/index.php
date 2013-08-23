<script type="text/javascript">
        	$(function() {
                             function search_usuario(){
				$.ajax({
					//data: "q="+q+"&fi="+fi+"&ff="+ff+"&t="+1,
					type: "POST",
					dataType: "json",
					url: "<?php echo URL;?>usuario/buscar_usuarios/"+$('#usuarios').val(),
						success: function(data){
							if(data.length > 0){
								var html ='';
								$.each(data, function(i,item){
									html += '<tr class="rows"><td>'+item.id+'</td><td>'+item.nombre+'</td><td>'+item.apellido+'</td><td>'+item.login+'</td><td>'+item.rol+'</td><td><a class="tip" title="Editar" href="<?php echo URL ?>usuario/editar/'+item.id+'"><img src="<?php echo URL; ?>public/images/bedit.png" alt="Editar" /></a>&nbsp;<a class="tip" title="Reset Password" href="<?php echo URL ?>usuario/reset_password/'+item.id+'"><img src="<?php echo URL; ?>public/images/key_go.png" alt="Reset Password" /></a>&nbsp;<a class="tip" title="Eliminar" id="eliminar-usuario" href="#"><img  src="<?php echo URL; ?>public/images/bdelete.png" alt="Eliminar" onclick="eliminarUsuario('+item.id+')"/></a></td></tr>';
								});
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

                        $("#usuarios").live("keyup",(function(){
				search_usuario();
			}));


			});



        </script>
<div class="block_head">
        <div class="bheadl"></div>
        <div class="bheadr"></div>
        
        <h2> Usuarios</h2>
        
        <ul class="tabs">
            <li class="active nobg"><a href="#list">Listar</a></li>
            <li><a href="#new">Nuevo Usuario</a></li>
        </ul>

        <ul>
            <li>Buscar:<input type="text" id="usuarios" value="" ></li>
        </ul>
    </div>
    <div style="display: block;" class="block_content tab_content " id="list">
    	        <form action="" method="post">
        
            <table class="sortable" cellpadding="0" cellspacing="0" width="100%">
                    <thead>
    <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Login</th>
        <th>Rol</th>
        <th>Acciones</th>
         
    </tr>
    </thead>
    <tbody>
        <?php 
foreach ($this->listaUsuario as $key => $value) {
?>
   <tr class="rows even">
        <td>
                <?php echo $value['id'];?>
       </td>
       <td>
                <?php echo $value['nombre'];?> 
        </td>
        <td>
                <?php echo $value['apellido'];?> 
        </td>
        <td>
                <?php echo $value['login'];?> 
        </td>
        <td>
                <?php echo $value['rol'];?>
        </td>
        <td class="options">
            <a class="tip" title="Editar" href="<?php echo URL ?>usuario/editar/<?php echo $value['id'] ?>"><img src="<?php echo URL; ?>public/images/bedit.png" alt="Editar" /></a>
            <a class="tip" title="Reset Password" href="<?php echo URL ?>usuario/reset_password/<?php echo $value['id'] ?>"><img src="<?php echo URL; ?>public/images/key_go.png" alt="Reset Password" /></a> 
            <a class="tip" title="Eliminar" id="eliminar-usuario" href="#"><img  src="<?php echo URL; ?>public/images/bdelete.png" alt="Eliminar" onclick="eliminarUsuario(<?php echo $value['id'] ?>)"/></a>
        </td>
        
    </tr>
<?php } ?>
</tbody>
    </table>
                            </form>
        
    </div>

<div style="display: none;" class="block_content tab_content hide" id="new">
				
					<form novalidate="novalidate" method="post" action="<?php echo URL ?>usuario/crear" enctype="multipart/form-data" id="form_">  
                <p> 
                    <label>Nombre</label><br> <input name="nombre" id="nombre" size="55" class="text required" type="text">
                </p>
                <p><label>Apellido</label><br> <input name="apellido" id="apellido" size="55" class="text required" type="text"></p> 
                
                <p><label>Usuario</label><br> <input name="login" id="login" size="55" class="text required" type="text"></p>
                <p><label>Contraseña</label> <br><input name="password" id="password" size="55" class="text required" type="password"></p> 
                <p>
<!--                <div class="cmf-skinned-select" style="width: 243px; background-color: rgb(242, 241, 240); color: rgb(76, 76, 76); font-size: 13.3333px; font-family: Sans; font-style: normal; position: relative;">-->
<!--                    <div class="cmf-skinned-text" style="width: 229px; opacity: 100; overflow: hidden; position: absolute; text-indent: 0px; z-index: 1; top: 0px; left: 0px;">-Seleccionar</div>-->
                    <select  class="styled valid" style="opacity: 0; position: relative; z-index: 100;" name="role" id="role">
                         <option value="por defecto" >Por Defecto</option>
                        <option value="administrador" >Administrador</option>
                        <option value="usuario" >Usuario</option>
                    </select>
</p>
<!--                </div>-->
                                       
                <hr>
                <p>
                	<input class="submit mid" value="Guardar" type="submit">
                </p>
               
             </form>
					
		</div>
<!--<div>-->

<!--<a class="enlace" href="<?php echo URL ?>usuario/nuevo">Agregar Usuario</a>
<table class="tabla">
    <caption>Lista de Usuarios</caption>
    <thead>
    <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Login</th>
        <th>Rol</th>
        <th>Acciones</th>
         
    </tr>
    </thead>
    <tbody>
<?php 
foreach ($this->listaUsuario as $key => $value) {
?>
   <tr>
        <td>
                <?php echo $value['id'];?>
       </td>
       <td>
                <?php echo $value['nombre'];?> 
        </td>
        <td>
                <?php echo $value['apellido'];?> 
        </td>
        <td>
                <?php echo $value['login'];?> 
        </td>
        <td>
                <?php echo $value['rol'];?>
        </td>
        <td>
            <a class="enlace-lista" href="<?php echo URL ?>usuario/editar/<?php echo $value['id'] ?>"><img src="<?php echo URL; ?>public/images/user_edit.png" alt="Editar" title="Editar"/></a><a class="enlace-lista" href="<?php echo URL ?>usuario/reset_password/<?php echo $value['id'] ?>"><img src="<?php echo URL; ?>public/images/key_go.png" alt="Reset Password" title="Reset Password"/></a> <a id="eliminar-usuario" class="enlace-lista" href="<?php echo URL ?>usuario/eliminar/<?php echo $value['id'] ?>"><img  src="<?php echo URL; ?>public/images/user_delete.png" alt="Eliminar" title="Eliminar"/></a>
        </td>
        
    </tr>
<?php } ?>
</tbody>
    </table>
</div>-->