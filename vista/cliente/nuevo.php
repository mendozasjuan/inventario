
<div class="container">
    <div class="bs-docs-example row">
        <div class="descriptionForm">Cliente->Nuevo</div>
    
        <form class="form-horizontal" method="post" action="<?php echo URL ?>cliente/crear">
            <div class="control-group">
                <label class="control-label" for="nacionalidad">Nacionalidad</label>
                <div class="controls">
                    <select name="nacionalidad" required>
                        <option value="V">Venezolano</option>
                        <option value="E">Extranjero</option>
                    </select>
                </div>
            </div>
            
            <div class="control-group">
                <label class="control-label" for="nombre">Cedula</label>
                <div class="controls">
                    <input type="text" name="cedula" id="cedula">
                </div>
            </div>
            
            <div class="control-group">
                <label class="control-label" for="nombre">Nombre</label>
                <div class="controls">
                    <input type="text" name="nombre" id="nombre">
                </div>
            </div>
            
            <div class="control-group">
                <label class="control-label" for="municipio">Municipio</label>
                <div class="controls">
                    <select class="municipio" name="municipio" id="municipio">
                    </select>
                </div>

            </div>
            
            <div class="control-group">
                <label class="control-label" for="parroquia">Parroquia</label>
                <div class="controls">
                    <select class="parroquia" name="parroquia" id="parroquia">
                    </select>        
                </div>

            </div>

            <div class="control-group">
                <label class="control-label" for="direccion">Direccion</label>
                <div class="controls">
                    <input class="texto" type="text" name="direccion" id="direccion" value=""/>                    
                </div>

            </div>

            <div class="control-group">
                <label class="control-label" for="password">Telefono</label>
                <div class="controls">
                    <input class="texto" type="text" name="telefono" id="telefono" value=""/>        

                </div>
                <div class="controls">
                    <input class="btn btn-primary" type="submit" />   
                </div>

            </div>
            
            

        </form>
    </div>
</div>