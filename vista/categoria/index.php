<script type="text/javascript">
            $(function() {
                             function search_cliente(){
                $.ajax({
                    //data: "q="+q+"&fi="+fi+"&ff="+ff+"&t="+1,
                    type: "POST",
                    dataType: "json",
                    url: "<?php echo URL;?>categoria/buscar_categoria/"+$('#categorias').val(),
                        success: function(data){
                            if(data.length > 0){
                                var html ='';
                                $.each(data, function(i,item){
                                    html += '<tr class="rows"><td>'+item.idCategoria+'</td><td>'+item.categoria+'</td><td>'+item.descripcion+'</td><td><a class="tip" title="Editar" href="<?php echo URL ?>categoria/editar/'+item.idCategoria+'"><img src="<?php echo URL; ?>public/images/bedit.png" alt="Editar" /></a>&nbsp;<a class="tip" title="Eliminar" href="http://localhost/inventario/categoria/eliminar/'+item.idCategoria+'?>"><img  src="<?php echo URL; ?>public/images/bdelete.png" alt="Eliminar" /></a></td></tr>';
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

                        $("#categorias").live("keyup",(function(){
                search_cliente();
            }));


            });



        </script>

<div class="block_head">
        <div class="bheadl"></div>
        <div class="bheadr"></div>
        
        <h2> Registrar Categorias</h2>
        
        <ul class="tabs">
            <li class="active nobg"><a href="#list">Listar</a></li>
            <li><a href="#new">Nueva Categoria</a></li>
        </ul>

         <ul>
            <li>Buscar:<input type="text" id="categorias" value="" ></li>
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
            <th>Nombre Categoria</th>
            <th>Descripcion</th>
            <th>Acciones</th>
           
        </tr>
    </thead>
    <tbody>
<?php 
foreach ($this->listaCategorias as $key => $value) {
?>
   <tr>
       <td>
                <?php echo $value['idCategoria'];?>
       </td>
               <td>
                <?php echo $value['categoria'];?> 
        </td>
        <td>
                <?php echo $value['descripcion'];?> 
        </td>

       <td class="options">
             <a class="tip" title="Editar" href="<?php echo URL ?>categoria/editar/<?php echo $value['idCategoria'] ?>"><img src="<?php echo URL; ?>public/images/bedit.png" alt="Editar" /></a> 
            <a class="tip" title="Eliminar" href="http://localhost/inventario/categoria/eliminar/<?php echo $value['idCategoria']?>" ><img  src="<?php echo URL; ?>public/images/bdelete.png" alt="Eliminar" /></a>
        </td>
        
    </tr>
<?php } ?>
</tbody>
    </table>
                                               </form>
        
    </div>

<div style="display: none;" class="block_content tab_content hide" id="new">
    <form novalidate="novalidate" method="post" action="<?php echo URL ?>categoria/crear" enctype="multipart/form-data" id="form_">
           
    
  <p>
        <label for="nombre">Defina Nombre Categoria</label><br>
        <input type="text" name="categoria" id="categoria" value="" size="55" class="text required"/>
    </p>
    
    <p>
        <label for="descripcion">Descripcion</label><br>
        <textarea id="descripcion" class="text" style="height:40px" name="descripcion"></textarea>
    </p>
    
    
    
    <p>
       <input class="submit long" class="boton-enviar" type="submit" /> 
    </p>
    
    </form>
</div>
<!--</div>-->