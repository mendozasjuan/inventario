<script type="text/javascript">
        	$(function() {
                             function search_proveedor(){
				$.ajax({
					//data: "q="+q+"&fi="+fi+"&ff="+ff+"&t="+1,
					type: "POST",
					dataType: "json",
					url: "<?php echo URL;?>proveedor/buscar_proveedores/"+$('#proveedores').val(),
						success: function(data){
							if(data.length > 0){
								var html ='';
								$.each(data, function(i,item){
									html += '<tr class="rows">\n\
                                                                                    <td>'+item.id+'</td>\n\
                                                                                    <td>'+item.rif+'</td>\n\
                                                                                    <td>'+item.razon_social+'</td>\n\
                                                                                    <td>'+item.telefono+'</td>\n\\n\
                                                                                    <td>'+item.direccion+'</td>\n\
                                                                                    <td>'+item.email+'</td>\n\
                                                                                    <td>\n\
                                                                                        <a class="tip" title="Ingresar Producto" href="<?php echo URL ?>producto/ingresar_producto/'+item.id+'"><img src="<?php echo URL; ?>public/images/edit_add.png" alt="Nuevo Producto" /></a>&nbsp;\n\
                                                                                        <a class="tip" title="Listar Productos" href="<?php echo URL ?>producto/producto_proveedor/'+item.id+'"><img width="16" height="16" src="<?php echo URL; ?>public/images/list.png" alt="Listar Productos" /></a>&nbsp;\n\
                                                                                        <a class="tip" title="Editar" href="<?php echo URL ?>proveedor/editar/'+item.id+'"><img src="<?php echo URL; ?>public/images/bedit.png" alt="Editar" /></a>&nbsp;\n\
                                                                                        <a class="tip" title="Eliminar" href="#" onclick="eliminarProveedor('+item.id+')"><img  src="<?php echo URL; ?>public/images/bdelete.png" alt="Eliminar" /></a>\n\
                                                                                    </td>\n\
                                                                                 </tr>';
								});
                                                                console.log(html);

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

                        $("#proveedores").live("keyup",(function(){
				search_proveedor();
			}));


			});



        </script>
<div class="block_head">
        <div class="bheadl"></div>
        <div class="bheadr"></div>
        
        <h2> Proveedores</h2>
        
        <ul class="tabs">
            <li class="active nobg"><a href="#list">Listar</a></li>
            <li><a href="#new">Nuevo Proveedor</a></li>
        </ul>
        <ul>
            <li>Buscar:<input type="text" id="proveedores" value="" ></li>
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
            <th>Rif</th>
            <th>Razon Social</th>
            <th>Telefono</th>
            <th>Direccion</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
<?php 
foreach ($this->listaProveedores as $key => $value) {
?>
   <tr>
        <td>
                <?php echo $value['id'];?>
       </td>
        <td>
                <?php echo $value['rif'];?> 
        </td>
        <td>
                <?php echo $value['razon_social'];?> 
        </td>
        <td>
                <?php echo $value['telefono'];?> 
        </td>
        <td>
                <?php echo $value['direccion'];?> 
        </td>
        <td>
                <?php echo $value['email'];?> 
        </td>

        <td class="options">
            
            <a class="tip" title="Listar Productos" href="<?php echo URL ?>producto/producto_proveedor/<?php echo $value['id'] ?>"><img width="16" height="16" src="<?php echo URL; ?>public/images/list.png" alt="Listar Productos" /></a>
            <a class="tip" title="Editar" href="<?php echo URL ?>proveedor/editar/<?php echo $value['id'] ?>"><img src="<?php echo URL; ?>public/images/bedit.png" alt="Editar" /></a> 
            <a class="tip" title="Eliminar" href="#" onclick="eliminarProveedor(<?php echo $value['id'] ?>)"><img  src="<?php echo URL; ?>public/images/bdelete.png" alt="Eliminar" /></a>
        </td>
        
    </tr>
<?php } ?>
</tbody>
    </table>
                                               </form>
<!--    <div id="pager" class="pagination right">
            <a class="prev" href="#">«</a> <span id="pnumbers"><span id="pagernums"><a href="javascript:;" class="active">1</a></span></span> <a class="next" href="#">»</a>
            <select class="pagesize">
                    <option value="10" selected="selected">10</option>
        
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="40">40</option>
                </select>
        </div>-->
       <script type="text/javascript">
        	$(function () {
				$("table.sortable_list").tablesorter({
					headers: { 0: { sorter: false}, 7: {sorter: false} },		// Disabled on the 1st and 6th columns
					widgets: ['zebra']
				}).tablesorterFilter({ filterContainer: $("#filtro"),
                    filterClearContainer: $("#filterClearTwo"),
                    filterCaseSensitive: false
                }).tablesorterPager({container: $("#pager"),positionFixed: false}
				);
				
			});
        </script> 
    </div>

<div style="display: none;" class="block_content tab_content hide" id="new">
    <form novalidate="novalidate" method="post" action="<?php echo URL ?>proveedor/crear" enctype="multipart/form-data" id="form_">
    
    <p>
        <label for="rif">Rif</label><br>
        <input type="text" name="rif" id="rif" value="" size="55" class="text required"/>
    </p>
    
    <p>
        <label for="razon_social">Razon Social</label><br>
        <input  type="text" name="razon_social" id="razon_social" value="" size="55" class="text required" />
    </p>
    
    <p>
        <label for="password">Telefono</label><br>
        <input  type="text" name="telefono" id="telefono" value="" size="55" class="text required"/>
    </p>
    
    <p>
        <label for="direccion">Direccion</label><br>
        <input  type="text" name="direccion" id="direccion" value="" size="55" class="text required"/>
    </p>
    
    <p>
        <label for="password">Email</label><br>
        <input  type="text" name="email" id="email" value="" size="55" class="text required"/>
    </p>
    
    <p>
       <input class="submit long" class="boton-enviar" type="submit" /> 
    </p>
    
    </form>
</div>
<!--</div>-->