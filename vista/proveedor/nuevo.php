<div class="container">
    <div class="bs-docs-example row">
        <div class="descriptionForm">Nuevo->Proveedor</div>
        <form action="<?php echo URL ?>proveedor/crear" class="form-horizontal" method="POST">
                <div class="control-group">
                    <label for="nacionalidad" class="control-label">Rif</label>
                    <div class="controls">
                        <input name="rif" type="text" id="rif">
                    </div>
                </div>


                <div class="control-group">
                    <label for="nacionalidad" class="control-label">Razon Social</label>
                    <div class="controls">
                        <input name="razon_social" id="razon_social" type="text" >
                    </div>
                </div>

                <div class="control-group">
                    <label for="nacionalidad" class="control-label">Telefono</label>
                    <div class="controls">
                        <input type="text" name="telefono" id="telefono" >
                    </div>
                </div>


                <div class="control-group">
                    <label for="nacionalidad" class="control-label">Direccion</label>
                    <div class="controls">
                        <input type="text" name="direccion" id="direccion" >
                    </div>

                </div>


                <div class="control-group">
                    <label for="nacionalidad" class="control-label">Email</label>
                    <div class="controls">
                        <input type="text" name="email" id="email" >
                    </div>

                </div>
                <div class="control-group">
                    <div class="controls">
                        <input class="btn btn-primary" type="submit" />   
                    </div>
                </div>

            </form>
        </div>
    </div>
