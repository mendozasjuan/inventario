<div id="index">
    <div class="container">

        <div class="bs-docs-example row" style="height: 500px;">
            <div class="descriptionForm">Clientes</div>
            <div>
                <a href="<?php print URL.'cliente/nuevo'; ?>" class="btn"><i class="icon-plus-sign"></i> Nuevo</a>
            </div>

            <hr>
            <div class="input-prepend">
                <span class="add-on"><i class="icon-search"></i></span>
                <input class="span2" id="clientes" type="text" placeholder="Texto a buscar">
            </div>

            <table id="tabla-clientes" class="table table-bordered table-hover sortable" >
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Cedula</th>
                        <th>Nombre</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="paginar">
                <?php 
                    foreach ($this->listaClientes as $key => $value) {
                ?>
                    <tr>
                        <td><?php echo $value['id'];?></td>
                        <td><?php echo $value['nacionalidad']."-".$value['cedula'];?></td>
                        <td><?php echo $value['nombre_apellido'];?></td>
                        <td><?php echo $value['direccion'];?> </td>
                        <td><?php echo $value['telefono'];?></td>
                        <td>
                            <a  class="btn" title="Editar" href="#" onclick="cliente_individual('<?php echo $value['id'] ?>')"><i class="icon-pencil"></i> Editar</a>
                            <a   class="btn" title="Eliminar" href="#" onclick="eliminarClientes('<?php print $value['id']?>')" ><i class="icon-trash"></i> Eliminar</a>
                        </td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
            <div  class="pagination pagination-centered">
                <ul id="paginacion">
                </ul>
            </div>
        </div>
    </div>   
</div>


<div id="eliminarCliente" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Eliminar Cliente</h3>
    </div>
    <div class="modal-body">
        <p>¿Desea Eliminar este Cliente?</p>
        </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
        <a id="aceptarEliminar" href="#" class="btn btn-primary">Aceptar</a>
    </div>
</div>

<div id="editar" style="display:none">
    <div class="container">
        <div class="bs-docs-example row">
            <div class="descriptionForm">Cliente->Editar</div>
        
            <form id="form-editar" class="form-horizontal" method="post" action="#" enctype="multipart/form-data" id="form_">
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
                        <input type="text" name="cedula" id="cedula" value="" size="55" >
                    </div>
                </div>
                
                <div class="control-group">
                    <label class="control-label" for="nombre">Nombre</label>
                    <div class="controls">
                        <input  type="text" name="nombre" id="nombre" value="" size="55" >
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
                        <input type="text" name="direccion" id="direccion" value=""/>                
                    </div>

                </div>

                <div class="control-group">
                    <label class="control-label" for="password">Telefono</label>
                    <div class="controls">
                        <input  type="text" name="telefono" id="telefono" value="" size="55" >       

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