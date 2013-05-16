<script type="text/javascript">
        	$(function() {

                             function search_producto(){
				$.ajax({
					//data: "q="+q+"&fi="+fi+"&ff="+ff+"&t="+1,
					type: "POST",
					dataType: "json",
					url: "<?php echo URL;?>producto/buscar_productos/"+$('#productos').val(),
						success: function(data){
							if(data.length > 0){
								var html ='';
								$.each(data, function(i,item){
									html += '<tr class="rows"><td>'+item.id+'</td><td>'+item.codigo+'</td><td>'+item.descripcion+'</td><td>'+item.precio_compra+'</td><td>'+item.precio_venta+'</td><td>'+item.stock_minimo+'</td><td>'+item.existencia+'</td><td><a class="tip" title="Editar" href="<?php echo URL ?>producto/editar/'+item.id+'"><img src="<?php echo URL; ?>public/images/bedit.png" alt="Editar" /></a><a class="tip" title="Eliminar" href="#" onclick="eliminarProducto('+item.id+')"><img  src="<?php echo URL; ?>public/images/bdelete.png" alt="Eliminar" /></a></td></tr>';
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

                        $("#productos").live("keyup",(function(){
				search_producto();
			}));

			});


        </script>
<div class="block_head">
        <div class="bheadl"></div>
        <div class="bheadr"></div>
        
        <h2> Productos</h2>
        
        <ul class="tabs">
            <li class="active nobg"><a href="#list">Listar</a></li>
            <li><a href="#new">Nuevo Producto</a></li>
        </ul>

         <ul>
            <li>Buscar:<input type="text" id="productos" value="" ></li>
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
            <th>Codigo</th>
            <th>Descripci&oacute;n</th>
            <th>Precio Compra</th>
            <th>Precio Venta</th>
            <th>Stock Minimo</th>
            <th>Existencia</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
<?php 
foreach ($this->listaProductos as $key => $value) {
?>
   <tr>
        <td>
                <?php echo $value['id'];?>
       </td>
        <td>
                <?php echo $value['codigo'];?>
        </td>
        <td>
                <?php echo $value['descripcion'];?>
        </td>
        <td>
                <?php echo $value['precio_compra'];?>
        </td>
        <td>
                <?php echo $value['precio_venta'];?>
        </td>
        <td>
                <?php echo $value['stock_minimo'];?>
        </td>
        <td>
                <?php echo $value['existencia'];?>
        </td>

        <td class="options">
            <a class="tip" title="Editar" href="<?php echo URL ?>producto/editar/<?php echo $value['id'] ?>"><img src="<?php echo URL; ?>public/images/bedit.png" alt="Editar" /></a>
            <a class="tip" title="Eliminar" href="#" onclick="eliminarProducto(<?php echo $value['id'] ?>)"><img  src="<?php echo URL; ?>public/images/bdelete.png" alt="Eliminar" /></a>
        </td>
        
    </tr>
<?php } ?>
</tbody>
    </table>
                                               </form>
        
    </div>

<div style="display: none;" class="block_content tab_content hide" id="new">
    <form novalidate="novalidate" method="post" action="<?php echo URL ?>producto/crear" enctype="multipart/form-data" id="form_">
    
    <p>
        <label for="codigo">Codigo</label><br>
        <input type="text" name="codigo" id="codigo" value="" size="55" class="text required"/>
        <input type="hidden" name="id_proveedor" value="<?php echo $this->id_proveedor; ?>">
    </p>
    
    <p>
        <label for="descripcion">Descripcion</label><br>
        <input  type="text" name="descripcion" id="descripcion" value="" size="55" class="text required" />
    </p>
    
    <p>
        <label for="precio_compra">Precio Compra</label><br>
        <input  type="text" name="precio_compra" id="precio_compra" value="" size="55" class="text required"/>
    </p>

    <p>
        <label for="precio_venta">Precio Venta</label><br>
        <input  type="text" name="precio_venta" id="precio_venta" value="" size="55" class="text required"/>
    </p>

    <p>
        <label for="stock_minimo">Stock Minimo</label><br>
        <input  type="text" name="stock_minimo" id="stock_minimo" value="" size="55" class="text required"/>
    </p>

    <p>
        <label for="existencia">Existencia</label><br>
        <input  type="text" name="existencia" id="existencia" value="" size="55" class="text "/>
    </p>
    
    <p>
       <input class="submit long" class="boton-enviar" type="submit" /> 
    </p>
    
    </form>
</div>
<!--</div>-->