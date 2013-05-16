<div class="block_head">
        <div class="bheadl"></div>
        <div class="bheadr"></div>
        
        <h2>Editar Proveedor</h2>
        
        <ul class="tabs">
            <li class="active nobg"><a href="javascript: history.back()">Atras</a></li>
<!--            <li><a href="<?php echo URL;?>producto">Nuevo Producto</a></li>-->
        </ul>
    </div>
<div class="block_content">
    <form novalidate="novalidate" method="post" action="<?php echo URL ?>proveedor/guardarEditar/<?php echo $this->proveedor['id']?>" enctype="multipart/form-data" id="form_">
          
    
    <p>
        <label for="nombre">Rif</label><br>
        <input type="text" name="rif" id="rif" value="<?php echo $this->proveedor['rif'] ?>" size="55" class="text required"/>
    </p>
    
    <p>
        <label for="razon_social">Rason Social</label><br>
        <input  type="text" name="razon_social" id="razon_social" value="<?php echo $this->proveedor['razon_social'] ?>" size="55" class="text required" />
    </p>
    
    <p>
        <label for="password">Telefono</label><br>
        <input  type="text" name="telefono" id="telefono" value="<?php echo $this->proveedor['telefono'] ?>" size="55" class="text required"/>
    </p>
    
    <p>
        <label for="direccion">Direccion</label><br>
        <input  type="text" name="direccion" id="direccion" value="<?php echo $this->proveedor['direccion'] ?>" size="55" class="text required"/>
    </p>
    
    <p>
        <label for="password">Email</label><br>
        <input  type="text" name="email" id="email" value="<?php echo $this->proveedor['email'] ?>" size="55" class="text required"/>
    </p>
    
    <p>
       <input class="submit long" class="boton-enviar" type="submit" value="Actualizar"/> 
    </p>
    
    </form>
</div>


