<div class="block_head">
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
                                    </div>		<!-- .block_content ends -->

