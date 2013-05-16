<h2>Persona: Agregar</h2>
<form class="formulario" method="post" action="<?php echo URL ?>persona/crear">
    <div>
        <label for="nacionalidad">Nacionalidad</label>
        <select name="nacionalidad">
            <option value="V">Venezolano</option>
            <option value="E">Extranjero</option>
        </select>
    </div>
    
    <div>
        <label for="nombre">Cedula</label>
        <input class="texto" type="text" name="cedula" id="cedula" value=""/>
    </div>
    
    <div>
        <label for="nombre">Nombre</label>
        <input class="texto" type="text" name="nombre" id="nombre" value=""/>
    </div>
    
    <div>
        <label for="municipio">Municipio</label>
        <select name="municipio" id="municipio">
            <option value="seleccione">Seleccione</option>
            <?php foreach ($this->municipios as $key => $value) {?>
            <option value="<?php echo $value['idMunicipio']?>"><?php echo utf8_decode($value['municipio'])?></option>
             <?php }?>
        </select>
    </div>
    
    <div>
        <label for="parroquia">Parroquia</label>
        <select name="parroquia" id="parroquia">
            <option value="seleccione">Seleccione</option>
        </select>
    </div>

    <div>
        <label for="direccion">Direccion</label>
        <input class="texto" type="text" name="direccion" id="direccion" value=""/>
    </div>

    <div>
        <label for="password">Telefono</label>
        <input class="texto" type="text" name="telefono" id="telefono" value=""/>
    </div>
    
    
    <input class="boton-enviar" type="submit" />
</form>
