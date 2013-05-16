<!-- <div class="block_head">
                                    <div class="bheadl"></div>
                                    <div class="bheadr"></div>
                                    <h2>Bienvenido</h2>
                                </div>
                                <div class="block_content" id="fondo_inicio"> 
<div class="grid_12" id="icondock">
        <div id="icondock" class="grid_12">
            <ul>

                    <?php if(Session::get('rol') == 'administrador') { ?>
                    <li><a original-title="Ver usuarios" href="<?php echo URL; ?>usuario" class="tip"><img src="<?php echo URL; ?>/public/images/user.png" alt="Users"><br>Usuarios</a></li>
                    <li><a original-title="Agregar Categoria" href="<?php echo URL; ?>categoria" class="tip"><img src="<?php echo URL; ?>/public/images/edit_add.png" alt="Users"><br>Categorias</a></li>
                     <li><a original-title="Agregar Marca" href="<?php echo URL; ?>marca" class="tip"><img src="<?php echo URL; ?>/public/images/edit_add.png" alt="Users"><br>Marcas</a></li>
                      <li><a original-title="Agregar Modelos" href="<?php echo URL; ?>muestra" class="tip"><img src="<?php echo URL; ?>/public/images/edit_add.png" alt="Users"><br>Modelo</a></li>
                    <?php }?>
                    <li><a original-title="Clientes" href="<?php echo URL; ?>cliente" class="tip"><img src="<?php echo URL; ?>/public/images/client.png" alt="Contacts"><br>Clientes</a></li>

                    <li><a original-title="Proveedores" href="<?php echo URL; ?>proveedor" class="tip"><img src="<?php echo URL; ?>/public/images/provider.png" alt="Proveedores"><br>Proveedores</a></li>

                    <li><a original-title="Productos" href="<?php echo URL; ?>producto" class="tip"><img src="<?php echo URL; ?>public/images/product.png" alt="Productos"><br>Productos</a></li>

                  
            </ul><br clear="all">

        </div>

</div>
                                    </div>	 -->	<!-- .block_content ends -->


<div class="container">
    <div class="bs-docs-example">
        <div class="descriptionForm">ADMINISTRAR ORDENES</div>
        <div>
            <a href="<?php print PATH_NAV.'orden/crear'; ?>" class="btn"><i class="icon-plus-sign"></i> Agregar</a>
        </div>
        <hr>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Orden</th>
                    <th>Fecha Emision de la orden</th>
                    <th>Fecha de Culminacion</th>
                    <th>Dia Restantes</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Asfaltado de La marroquina</td>
                    <td>14/04/2013</td>
                    <td>17/05/2013</td>
                    <td><i class="icon-exclamation"></i> <span>1 dia</span> </td>
                    <td>
                        <a href="<?php print PATH_NAV.'orden/crear'; ?>" class="btn"><i class="icon-book"></i> Reporte</a> 
                        <a href="<?php print PATH_NAV.'orden/crear'; ?>" class="btn"><i class="icon-edit"></i> Observación</a> 
                        <a href="<?php print PATH_NAV.'orden/crear'; ?>" class="btn"><i class="icon-eye-open"></i> Supervisión</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Asfaltado de La marroquina</td>
                    <td>14/05/2013</td>
                    <td>30/05/2013</td>
                    <td>14 dias</td>
                    <td>
                        <a href="<?php print PATH_NAV.'orden/crear'; ?>" class="btn"><i class="icon-book"></i> Reporte</a> 
                        <a href="<?php print PATH_NAV.'orden/crear'; ?>" class="btn"><i class="icon-edit"></i> Observación</a> 
                        <a href="<?php print PATH_NAV.'orden/crear'; ?>" class="btn"><i class="icon-eye-open"></i> Supervisión</a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Asfaltado de La marroquina</td>
                    <td>14/05/2013</td>
                    <td>30/05/2013</td>
                    <td>14 dias</td>
                    <td>
                        <a href="<?php print PATH_NAV.'orden/crear'; ?>" class="btn"><i class="icon-book"></i> Reporte</a> 
                        <a href="<?php print PATH_NAV.'orden/crear'; ?>" class="btn"><i class="icon-edit"></i> Observación</a> 
                        <a href="<?php print PATH_NAV.'orden/crear'; ?>" class="btn"><i class="icon-eye-open"></i> Supervisión</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
