<div class="block_head">
        <div class="bheadl"></div>
        <div class="bheadr"></div>
        
        <h2>Editar Modelos</h2>
        
        <ul class="tabs">
            <li class="active nobg"><a href="javascript: history.back()">Atras</a></li>
<!--            <li><a href="<?php echo URL;?>producto">Nuevo Producto</a></li>-->
        </ul>
    </div>
<div class="block_content">
    <form novalidate="novalidate" method="post" action="<?php echo URL ?>muestra/guardarEditar/<?php echo $this->vermodelo['idModelo']?>" enctype="multipart/form-data" id="form_">
          
    
    <p>
        <label for="nombre">Edite Nombre Modelo</label><br>
        <input type="text" name="modelo" id="modelo" value="<?php echo $this->vermodelo['modelo'] ?>" size="55" class="text required"/>
    </p>
    
     <p>
        <label for="descripcion">Descripcion</label><br>
        <textarea id="descripcion" class="text" style="height:40px" name="descripcion" value="<?php echo $this->vermodelo['descripcion'] ?>"></textarea>
    </p>
   
       
        <p>
       <input class="submit long" class="boton-enviar" type="submit" value="Actualizar"/> 
    </p>
    
    </form>
</div>