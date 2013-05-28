<!-- <div class="block_head">
        <div class="bheadl"></div>
        <div class="bheadr"></div>
        
        <h2> Clientes</h2>
        
        <ul class="tabs">
            <li class="active nobg"><a href="#list">Listar</a></li>
            <li><a href="#new">Nuevo Cliente</a></li>
        </ul>

         <ul>
            <li>Buscar:<input type="text" id="clientes" value="" ></li>
        </ul>
    </div>
<div style="display: block;" class="block_content tab_content " id="list">
                <form action="" method="post">
        
            <table class="sortable" cellpadding="0" cellspacing="0" width="100%">


    <thead>
        <tr>
            <th>Id</th>
            <th>Cedula</th>
            <th>Nombre</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
<?php 
foreach ($this->listaClientes as $key => $value) {
?>
   <tr>
        <td>
                <?php echo $value['id'];?>
       </td>
        <td>
                <?php echo $value['nacionalidad']."-".$value['cedula'];?>
        </td>
        <td>
                <?php echo $value['nombre_apellido'];?> 
        </td>
        <td>
                <?php echo $value['direccion'];?> 
        </td>
        <td>
                <?php echo $value['telefono'];?> 
        </td>

        <td class="options">
            <a class="tip" title="Editar" href="<?php echo URL ?>cliente/editar/<?php echo $value['id'] ?>"><img src="<?php echo URL; ?>public/images/bedit.png" alt="Editar" /></a> 
            <a class="tip" title="Eliminar" href="#" onclick="eliminarClientes(<?php echo $value['id'] ?>)"><img  src="<?php echo URL; ?>public/images/bdelete.png" alt="Eliminar" /></a>
        </td>
        
    </tr>
<?php } ?>
</tbody>
    </table>
                                               </form>
        
    </div>

<div style="display: none;" class="block_content tab_content hide" id="new">
    <form novalidate="novalidate" method="post" action="<?php echo URL ?>cliente/crear" enctype="multipart/form-data" id="form_">
            <p>
        <label for="nacionalidad">Nacionalidad</label><br>
            <select class="styled valid" style="opacity: 0; position: relative; z-index: 100;" name="nacionalidad">
            <option value="V">Venezolano</option>
            <option value="E">Extranjero</option>
        </select>
                
    </p>
    
    <p>
        <label for="nombre">Cedula</label><br>
        <input type="text" name="cedula" id="cedula" value="" size="55" class="text required"/>
    </p>
    
    <p>
        <label for="nombre">Nombre</label><br>
        <input  type="text" name="nombre" id="nombre" value="" size="55" class="text required" />
    </p>
    
    <p>
        <label for="municipio">Municipio</label><br>
        <select class="styled valid" style="opacity: 0; position: relative; z-index: 100;" name="municipio" id="municipio">
            <option value="seleccione">Seleccione</option>
            <?php foreach ($this->municipios as $key => $value) {?>
            <option value="<?php echo $value['idMunicipio']?>"><?php echo utf8_decode($value['municipio'])?></option>
             <?php }?>
        </select>
    </p>
    
    <p>
        <label for="parroquia">Parroquia</label><br>
        <select class="styled valid" style="opacity: 0; position: relative; z-index: 100;" name="parroquia" id="parroquia">
            <option value="seleccione">Seleccione</option>
        </select>
    </p>

    <p>
        <label for="direccion">Direccion</label><br>
        <input class="text m" type="text" name="direccion" id="direccion" value=""/>
    </p>

    <p>
        <label for="password">Telefono</label><br>
        <input  type="text" name="telefono" id="telefono" value="" size="55" class="text required"/>
    </p>
    
    <p>
       <input class="submit long" class="boton-enviar" type="submit" /> 
    </p>
    
    </form>
</div> -->
<!--</div>-->

<div class="container">

    <div class="bs-docs-example row">
        <div class="descriptionForm">Clientes</div>
        <div>
            <a href="<?php print URL.'orden/nuevo'; ?>" class="btn"><i class="icon-plus-sign"></i> Nuevo</a>
        </div>
        <hr>
        <div class="input-prepend">
            <span class="add-on"><i class="icon-search"></i></span>
            <input class="span2" id="clientes" type="text" placeholder="Texto a buscar">
        </div>

        <table class="table table-bordered table-hover sortable">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                foreach ($this->listaClientes as $key => $value) {
            ?>
                <tr>
                    <td><?php echo $value['id'];?></td>
                    <td><?php echo $value['nacionalidad']."-".$value['cedula'];?></td>
                    <td><?php echo $value['nombre_apellido'];?></td>
                    <td><?php echo $value['direccion'];?> </td>
                    <td><?php echo $value['telefono'];?></td>
                    <td>Acciones</td>
                </tr>
            <?php }?>
            </tbody>
        </table>
    </div>
</div>