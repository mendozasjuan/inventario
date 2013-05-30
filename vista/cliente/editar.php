<!-- <div class="block_head">
        <div class="bheadl"></div>
        <div class="bheadr"></div>
        
        <h2>Editar Clientes</h2>
        
       <ul class="tabs">
            <li class="active nobg"><a href="javascript: history.back()">Atras</a></li>
            <li><a href="<?php echo URL;?>producto">Nuevo Producto</a></li>
        </ul>
    </div>
<div class="block_content">
    <form novalidate="novalidate" method="post" action="<?php echo URL ?>cliente/guardarEditar/<?php echo $this->cliente['id']?>" enctype="multipart/form-data" id="form_">
            <p>
        <label for="nacionalidad">Nacionalidad</label><br>
        <select class="styled valid" style="opacity: 0; position: relative; z-index: 100;" name="nacionalidad">
           <option value="V" <?php if ($this->cliente['nacionalidad'] == 'V') echo 'selected' ?>>Venezolano</option>
            <option value="E" <?php if ($this->cliente['nacionalidad'] == 'E') echo 'selected' ?>>Extranjero</option>
        </select>
    </p>
    
    <p>
        <label for="nombre">Cedula</label><br>
        <input type="text" name="cedula" id="cedula" value="<?php echo $this->cliente['cedula'] ?>" size="55" class="text required"/>
    </p>
    
    <p>
        <label for="nombre">Nombre</label><br>
        <input  type="text" name="nombre" id="nombre" value="<?php echo $this->cliente['nombre_apellido'] ?>" size="55" class="text required" />
    </p>
    
    <p>
        <label for="municipio">Municipio</label><br>
        <select class="styled valid" style="opacity: 0; position: relative; z-index: 100;" name="municipio" id="municipio">
            <option value="seleccione">Seleccione</option>
            <?php foreach ($this->municipios as $key => $value) {?>
            <option value="<?php echo $value['idMunicipio']?>" <?php if ($this->cliente['idMunicipio'] == $value['idMunicipio']) echo 'selected' ?>><?php echo utf8_decode($value['municipio'])?></option>
             <?php }?>
        </select>
    </p>
    
    <p>
        <label for="parroquia">Parroquia</label><br>
        <select class="styled valid" style="opacity: 0; position: relative; z-index: 100;" name="parroquia" id="parroquia">
            <option value="seleccione">Seleccione</option>
            <option value="<?php echo $this->cliente['idParroquia']?>" selected><?php echo utf8_decode($this->cliente['parroquia'])?></option>
        </select>
    </p>

    <p>
        <label for="direccion">Direccion</label><br>
        <input class="text m" type="text" name="direccion" id="direccion" value="<?php echo $this->cliente['direccion'] ?>"/>
    </p>

    <p>
        <label for="password">Telefono</label><br>
        <input  type="text" name="telefono" id="telefono" value="<?php echo $this->cliente['telefono'] ?>" size="55" class="text required"/>
    </p>
    
    <p>
       <input class="submit long" class="boton-enviar" type="submit" value="Actualizar"/> 
    </p>
    
    </form>
</div>
 -->

<div class="container">
    <div class="bs-docs-example row">
        <div class="descriptionForm">Cliente->Editar</div>
    
        <form class="form-horizontal" method="post" action="<?php echo URL ?>cliente/guardarEditar/<?php echo $this->cliente['id']?>" enctype="multipart/form-data" id="form_">
            <div class="control-group">
                <label class="control-label" for="nacionalidad">Nacionalidad</label>
                <div class="controls">
                    <select name="nacionalidad" required>
                        <option value="V" <?php if ($this->cliente['nacionalidad'] == 'V') echo 'selected' ?>>Venezolano</option>
                        <option value="E" <?php if ($this->cliente['nacionalidad'] == 'E') echo 'selected' ?>>Extranjero</option>
                    </select>
                </div>
            </div>
            
            <div class="control-group">
                <label class="control-label" for="nombre">Cedula</label>
                <div class="controls">
                    <input type="text" name="cedula" id="cedula" value="<?php echo $this->cliente['cedula'] ?>" size="55" >
                </div>
            </div>
            
            <div class="control-group">
                <label class="control-label" for="nombre">Nombre</label>
                <div class="controls">
                    <input  type="text" name="nombre" id="nombre" value="<?php echo $this->cliente['nombre_apellido'] ?>" size="55" >
                </div>
            </div>
            
            <div class="control-group">
                <label class="control-label" for="municipio">Municipio</label>
                <div class="controls">
                    <select name="municipio" id="municipio">
                        <option value="seleccione">Seleccione</option>
                        <?php foreach ($this->municipios as $key => $value) {?>
                        <option value="<?php echo $value['idMunicipio']?>" <?php if ($this->cliente['idMunicipio'] == $value['idMunicipio']) echo 'selected' ?>><?php echo utf8_decode($value['municipio'])?></option>
                         <?php }?>
                    </select>
                </div>

            </div>
            
            <div class="control-group">
                <label class="control-label" for="parroquia">Parroquia</label>
                <div class="controls">
                    <select name="parroquia" id="parroquia">
                        <option value="seleccione">Seleccione</option>
                        <option value="<?php echo $this->cliente['idParroquia']?>" selected><?php echo utf8_decode($this->cliente['parroquia'])?></option>
                    </select>        
                </div>

            </div>

            <div class="control-group">
                <label class="control-label" for="direccion">Direccion</label>
                <div class="controls">
                    <input type="text" name="direccion" id="direccion" value="<?php echo $this->cliente['direccion'] ?>"/>                
                </div>

            </div>

            <div class="control-group">
                <label class="control-label" for="password">Telefono</label>
                <div class="controls">
                    <input  type="text" name="telefono" id="telefono" value="<?php echo $this->cliente['telefono'] ?>" size="55" >       

                </div>
                <div class="controls">
                    <input class="btn btn-primary" type="submit" value="Actualizar" />   
                </div>

            </div>
            
            

        </form>
    </div>
</div>