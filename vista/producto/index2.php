<script type="text/javascript">
            $(function() {

                $( "#proveedores" ).autocomplete({
                    source: function( request, response ) {
                        $.ajax({
                            url: "<?php echo URL;?>producto/buscarProveedores/"+request.term,
                            type:"POST",
                            dataType: "json",
//                          data: {
//                              //maxRows: 12,
//                              q: request.term
//                          },
                            success: function(data) {

                                response( $.map( data, function( item ) {
                                    return {
                                        label: item.razon_social,
                                        value: item.razon_social,
                                        id: item.id,
                                        rif: item.rif,
                                        telefono: item.telefono
                                    }
                                }));
                            }
                        });
                    },
                    minLength: 2,
                    select: function( event, ui ) {
                        $("#id_proveedor").val(ui.item.id);
                        $("#des").val(ui.item.label+"\n"+ui.item.rif+"\n"+ui.item.telefono);
                    },
                    open: function() {
                        $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
                    },
                    close: function() {
                        $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
                    }
                });
//


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
                                    html += '<tr class="rows"><td>'+item.id+'</td><td>'+item.codigo+'</td><td>'+item.nombre+'</td><td>'+item.precio_compra+'</td><td>'+item.precio_venta+'</td><td>'+item.stock_minimo+'</td><td>'+item.existencia+'</td><td>'+item.categoria+'</td><td>'+item.marca+'</td><td>'+item.modelo+'</td><td><a class="tip" title="Editar" href="<?php echo URL ?>producto/editar/'+item.id+'"><img src="<?php echo URL; ?>public/images/bedit.png" alt="Editar" /></a>&nbsp;<a class="tip" title="Actualizar Existencia" href="#"><img width="16" height="16" src="<?php echo URL; ?>public/images/product.png" alt="Actualizar Existencia" onclick="actualizarExistencia('+item.id+')"/></a>&nbsp;<a class="tip" title="Eliminar" href="#" onclick="eliminarProducto('+item.id+')"><img  src="<?php echo URL; ?>public/images/bdelete.png" alt="Eliminar" /></a></td></tr>';

                                     if (item.existencia==item.stock_minimo){
                                    html += '<tr class="rows alarma">'
                                }else{
                                    html += '<tr class="rows">';
                                }


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

//                        function actualizarExistencia(id){
//                            $('<a href="#existencia"></a>').facebox({
//                                                        overlayShow: true
//                                                    }).click();
//                        }

//                         $(".actualizar_existencia").live("click",function(){
//                           $('<a href="#popup_existencia"></a>').facebox({
//                              overlayShow: true
//                           }).click();
//                         });

            });

                        function actualizarExistencia(id){
                            $("#id_producto_existencia").val(id);
                            $('<a href="#popup_existencia"></a>').facebox({
                                overlayShow: true
                            }).click();
                        }

                       
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
<a href="<?php echo URL ?>producto/imprimir/">Imprimir Reporte General</a>
    <thead>
        <tr>
            <th>Id</th>
            <th>Serial</th>
            <th>Nomb_Producto</th>
            <th>Precio Compra</th>
            <th>Precio Venta</th>
            <th>Stock Minimo</th>
            <th>Existencia</th>
            <th>Categoria</th>
            <th>Marca</th>
            <th>Modelo</th>
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
                <?php echo $value['nombre'];?>
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
        <td>
                <?php echo $value['categoria'];?>
        </td>
         <td>
                <?php echo $value['marca'];?>
        </td>
         <td>
                <?php echo $value['modelo'];?>
        </td>
         
        

        <td class="options">
            <a class="tip" title="Editar" href="<?php echo URL ?>producto/editar/<?php echo $value['id'] ?>"><img src="<?php echo URL; ?>public/images/bedit.png" alt="Editar" /></a>
            <a class="tip" title="Actualizar Existencia" href="#"><img class="actualizar_existencia" width="16" height="16" src="<?php echo URL; ?>public/images/product.png" alt="Actualizar Existencia"  onclick="actualizarExistencia(<?php echo $value['id']?>)"/></a>
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
    <div class="ui-widget">
                		<p><label>Buscar Proveedor</label><br /> <input type="text" name="proveedor" id="proveedores" class="text required"  value=""></p>				</div>
                    <textarea class="text" name="des" id="des" style="height:40px" disabled="disabled"></textarea>
                    <p><label>Fecha</label><br /> <input type="text" name="fecha" style="width:380px"  class="text date_picker"   value="<?php  echo date('Y/m/d')?>"></p>
    <p>
        <label for="codigo">Serial</label><br>
        <input type="text" name="codigo" id="codigo" value="" size="55" class="text required"/>
        <input type="hidden" name="id_proveedor" id="id_proveedor" value="">
    </p>
    
    <p>
        <label for="nombre">Nombre</label><br>
        <input  type="text" name="nombre" id="nombre" value="" size="55" class="text required" />
    </p>

     <p>
        <label for="categoria">Categorias</label>
        <select class="styled valid" style="opacity: 0; position: relative; z-index: 100;" name="categoria" id="categoria">
            <option value="seleccione">Seleccione</option>
            <?php foreach ($this->categorias as $key => $value) {?>
            <option value="<?php echo $value['idCategoria']?>"><?php echo utf8_decode($value['categoria'])?></option>
             <?php }?>

        </select>

    </p>
       <p>
        <label for="marca">Marcas</label><br>
        <select class="styled valid" style="opacity: 0; position: relative; z-index:100;" name="marca" id="marca">
        <option value="seleccione">Seleccione</option>
         <?php foreach ($this->marcas as $key => $value) {?>
            <option value="<?php echo $value['idMarca']?>"><?php echo utf8_decode($value['marca'])?></option>
             <?php }?>
</select>

    </p>

     <p>
         <label for="modelo">Modelos</label>
        <select class="styled valid" style="opacity: 0; position: relative; z-index: 100;" name="modelo" id="modelo">
            <option value="seleccione">Seleccione</option>
            <?php foreach ($this->modelos as $key => $value) {?>
            <option value="<?php echo $value['idModelo']?>"><?php echo utf8_decode($value['modelo'])?></option>
             <?php }?>

        </select>


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
        <input  type="text" name="existencia" id="existencia" value="" size="55" class="text required "/>
    </p>
    
    <p>
       <input class="submit long" class="boton-enviar" type="submit" /> 
    </p>
    
    </form>
</div>

<div class="content" id="popup_existencia" style="display:none">
    <div class="block" id="popup">
        <h2>Existencia</h2>
        <!--    <div  style="display: block;"><div class="block" style="width:470px; height:290px" >-->
        <div class="block_content">
            <form method="post" action="<?php echo URL; ?>producto/actualizarExistencia" id="form_existencia" novalidate="novalidate">

                <p>
                    <input type="hidden" id="id_producto_existencia" name="id_producto_existencia">
                    <label>Cantidad Productos:</label><br> <input type="text" class="text required" id="input_existencia" name="input_existencia" >
                </p>


                <p align="center"><input type="submit" value="Aceptar" id="input_aceptar" class="submit mid"></p>
            </form>
        </div>
    </div>
</div>
<!--</div>-->