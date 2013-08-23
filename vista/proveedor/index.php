<div id="index">
    <div class="container">

        <div class="bs-docs-example row" style="height: 500px;">
            <div class="descriptionForm">Proveedores</div>
            <div>
                <a href="<?php print URL.'proveedor/nuevo'; ?>" class="btn"><i class="icon-plus-sign"></i> Nuevo</a>
            </div>

            <hr>
            <div class="input-prepend">
                <span class="add-on"><i class="icon-search"></i></span>
                <input class="span2" id="proveedores" type="text" placeholder="Texto a buscar">
            </div>

            <table id="tabla-proveedores" class="table table-bordered table-hover sortable" >
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Rif</th>
                        <th>Razon Social</th>
                        <th>Telefono</th>
                        <th>Direccion</th>
                        <th>Email</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="paginar">
                <?php 
foreach ($this->listaProveedores as $key => $value) {
?>
   <tr>
        <td>
                <?php echo $value['id'];?>
       </td>
        <td>
                <?php echo $value['rif'];?> 
        </td>
        <td>
                <?php echo $value['razon_social'];?> 
        </td>
        <td>
                <?php echo $value['telefono'];?> 
        </td>
        <td>
                <?php echo $value['direccion'];?> 
        </td>
        <td>
                <?php echo $value['email'];?> 
        </td>

        <td class="options">
            
            <a class="btn" title="Listar Productos" href="<?php echo URL ?>producto/producto_proveedor/<?php echo $value['id'] ?>">
                <i class="icon-pencil"></i> Listar Productos
            </a>
            <a class="btn" title="Editar" onclick="proveedor_individual(<?php echo $value['id'] ?>)" href="#">
                <i class="icon-pencil"></i> Editar
            </a> 
            <a class="btn" title="Eliminar" href="#" onclick="eliminarProveedor('<?php echo $value['id'] ?>')">
                <i class="icon-pencil"></i> Eliminar
            </a>
        </td>
        
    </tr>
<?php } ?>
                </tbody>
            </table>
            <div  class="pagination pagination-centered">
                <ul id="paginacion">
                </ul>
            </div>
        </div>
    </div>   
</div>

<div id="eliminarProveedor" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Eliminar Proveedor</h3>
    </div>
    <div class="modal-body">
        <p>¿Desea Eliminar este Proveedor?</p>
        </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
        <a id="aceptarEliminar" href="#" class="btn btn-primary">Aceptar</a>
    </div>
</div>



<div id="editar" style="display:none">
<div class="container">
    <div class="bs-docs-example row">
        <div class="descriptionForm">Editar->ProveedorNuevo</div>
        <form id="form-editar" action="#" class="form-horizontal" method="POST">
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
                        <input id="atras" class="btn btn-primary" type="button" value="Atras" />
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>