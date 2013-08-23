<h2>Usuario: Agregar</h2>
<form class="formulario" method="post" action="<?php echo URL ?>usuario/crear">
    <div>
        <label  for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="texto"/>
    </div>
        
    <div>
        <label  for="apellido">Apellido</label>
        <input type="text" name="apellido" id="apellido" class="texto"/>
    </div>
   
    <div>
        <label  for="login">Login</label>
        <input type="text" name="login" id="login" class="texto"/>
    </div>
    
    <div>
        <label  for="password">Password</label>
        <input type="password" name="password" id="password" class="texto"/>
    </div>
    
    <div>
        <label  for="rol">Rol</label>
        <select class="select" id="rol" name="rol">
            <option value="por defecto">Default</option>
            <option value="administrador">Administrador</option>
            <option value="usuario">Usuario</option>
        </select>
    </div>
    
    
    <input class="boton-enviar" type="submit" />
</form>
