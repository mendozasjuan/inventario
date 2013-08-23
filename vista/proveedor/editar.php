<div class="container">
    <div class="bs-docs-example row">
        <div class="descriptionForm">Editar->ProveedorNuevo</div>
        <form action="<?php echo URL ?>proveedor/guardarEditar/<?php echo $this->proveedor['id']?>" class="form-horizontal" method="POST">
                <div class="control-group">
                    <label for="nacionalidad" class="control-label">Rif</label>
                    <div class="controls">
                        <input name="rif" type="text" id="rif" value="<?php echo $this->proveedor['rif'] ?>">
                    </div>
                </div>


                <div class="control-group">
                    <label for="nacionalidad" class="control-label">Razon Social</label>
                    <div class="controls">
                        <input name="razon_social" id="razon_social" type="text" value="<?php echo $this->proveedor['razon_social'] ?>" >
                    </div>
                </div>

                <div class="control-group">
                    <label for="nacionalidad" class="control-label">Telefono</label>
                    <div class="controls">
                        <input type="text" name="telefono" id="telefono" value="<?php echo $this->proveedor['telefono'] ?>">
                    </div>
                </div>


                <div class="control-group">
                    <label for="nacionalidad" class="control-label">Direccion</label>
                    <div class="controls">
                        <input type="text" name="direccion" id="direccion" value="<?php echo $this->proveedor['direccion'] ?>" >
                    </div>

                </div>


                <div class="control-group">
                    <label for="nacionalidad" class="control-label">Email</label>
                    <div class="controls">
                        <input type="text" name="email" id="email" value="<?php echo $this->proveedor['email'] ?>">
                    </div>

                </div>
                <div class="control-group">
                    <div class="controls">
                        <input class="btn btn-primary" type="submit" value="Actualizar" />   
                    </div>
                </div>

            </form>
        </div>
    </div>


