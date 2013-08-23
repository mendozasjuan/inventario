
    <div class="block_head">
        <div class="bheadl"></div>
        <div class="bheadr"></div>
        
        <h2> Editar Usuario</h2>
        
        <ul class="tabs">
            <li class="active nobg"><a href="javascript: history.back()">Atras</a></li>
<!--            <li><a href="<?php echo URL;?>producto">Nuevo Producto</a></li>-->
        </ul>
    </div>

    <div class="block_content">
				
					<form method="post" action="<?php echo URL ?>usuario/guardarEditar/<?php echo $this->usuario['id'] ?>" enctype="multipart/form-data">                
                 <input type="hidden" name="id" id="id" value="22" />
                <p><label>Nombre</label> <br /><input type="text" name="nombre" id="nombre" size="55" class="text" value="<?php echo $this->usuario['nombre'] ?>"> </p>
                <p><label>Apellido</label> <br /><input type="text" name="apellido" id="apellido" size="55" class="text medium" value="<?php echo $this->usuario['apellido'] ?>"></p> 
                <p><label>Usuario</label> <br /><input type="text" name="login" id="login" size="55" class="text medium" readonly="readonly" value="<?php echo $this->usuario['login'] ?>"></p>
                <p><label>Contraseña</label><br /> <input type="password" name="password" id="password" size="55" class="text medium" value=""></p> 
<!--                <div class="cmf-skinned-select" style="width: 243px; background-color: rgb(242, 241, 240); color: rgb(76, 76, 76); font-size: 13.3333px; font-family: Sans; font-style: normal; position: relative;">-->
<!--                    <div class="cmf-skinned-text" style="width: 229px; opacity: 100; overflow: hidden; position: absolute; text-indent: 0px; z-index: 1; top: 0px; left: 0px;">-Seleccionar</div>-->
                    <select  class="styled valid" style="opacity: 0; position: relative; z-index: 100;" name="role" id="role">
                         <option value="por defecto" <?php if ($this->usuario['rol'] == 'por defecto') echo 'selected' ?>>Por Defecto</option>
                        <option value="administrador" <?php if ($this->usuario['rol'] == 'administrador') echo 'selected' ?>>Administrador</option>
                        <option value="usuario" <?php if ($this->usuario['rol'] == 'usuario') echo 'selected' ?>>Usuario</option>
                    </select>
<!--                </div>-->
                
                <hr>
                <p>
                	<input type="submit" class="submit mid" value="Actualizar" />
                </p>
               
             </form>
					
		</div>


<!--<h2>Usuario: Editar</h2>
<form class="formulario" method="post" action="<?php echo URL ?>usuario/guardarEditar/<?php echo $this->usuario['id'] ?>">
    <div>
        <label for="nombre">Nombre</label>
        <input class="texto" type="text" name="nombre" id="nombre" value="<?php echo $this->usuario['nombre'] ?>"/>
    </div>

    <div>
        <label for="apellido">Apellido</label>
        <input class="texto" type="text" name="apellido" id="apellido" value="<?php echo $this->usuario['apellido'] ?>"/>
    </div>

    <div>
        <label for="login">Login</label>
        <input class="texto" type="text" name="login" id="login" value="<?php echo $this->usuario['login'] ?>"/>
    </div>

    <div>
        <label for="password">Password</label>
        <input class="texto" type="text" name="password" id="password" />
    </div>

    <div>
        <label for="role">Rol</label>
        <select class="select" id="role" name="role">
            <option value="default" <?php if ($this->usuario['role'] == 'default') echo 'selected' ?>>Default</option>
            <option value="admin" <?php if ($this->usuario['role'] == 'admin') echo 'selected' ?>>Admin</option>
            <option value="owner" <?php if ($this->usuario['role'] == 'owner') echo 'selected' ?>>Owner</option>
        </select>
    </div>
    <input class="boton-enviar" type="submit" />
</form>-->