<div class="block_head">
        <div class="bheadl"></div>
        <div class="bheadr"></div>
        
        <h2>Editar Producto</h2>
        
        <ul class="tabs">
            <li class="active nobg"><a href="javascript: history.back()">Atras</a></li>
<!--            <li><a href="<?php echo URL;?>producto">Nuevo Producto</a></li>-->
        </ul>
    </div>
<div class="block_content">
    <form novalidate="novalidate" method="post" action="<?php echo URL ?>producto/guardarEditar/<?php echo $this->producto['id']?>" enctype="multipart/form-data" id="form_">
    

    <p>
        <label for="codigo">Codigo</label><br>
        <input type="text" name="codigo" id="codigo" value="<?php echo $this->producto['codigo'] ?>" size="55" class="text required"/>
    </p>

    <p>
        <label for="descripcion">Nombre</label><br>
        <input  type="text" name="nombre" id="nombre" value="<?php echo $this->producto['nombre'] ?>" size="55" class="text required" />
    </p>

     <p>
        <label for="categoria">Categorias</label>
         <select class="styled valid" style="opacity: 0; position: relative; z-index: 100;" name="categoria" id="categoria">
            <option value="seleccione">Seleccione</option>
            <?php foreach ($this->categorias as $key => $value) {?>
            <option value="<?php echo $value['idCategoria']?>" <?php if ($this->producto['idCategoria'] == $value['idCategoria']) echo 'selected' ?>><?php echo utf8_decode($value['categoria'])?></option>
             <?php }?>
        </select>
    </p>
      <p>
        <label for="marcas">Marcas</label>
         <select class="styled valid" style="opacity: 0; position: relative; z-index: 100;" name="marca" id="marca">
            <option value="seleccione">Seleccione</option>
            <?php foreach ($this->marcas as $key => $value) {?>
            <option value="<?php echo $value['idMarca']?>" <?php if ($this->producto['idMarca'] == $value['idMarca']) echo 'selected' ?>><?php echo utf8_decode($value['marca'])?></option>
             <?php }?>
        </select>
    </p>
    <p>
        <label for="modelo">Modelo</label>
         <select class="styled valid" style="opacity: 0; position: relative; z-index: 100;" name="modelo" id="modelo">
            <option value="seleccione">Seleccione</option>
            <?php foreach ($this->modelos as $key => $value) {?>
            <option value="<?php echo $value['idModelo']?>" <?php if ($this->producto['idModelo'] == $value['idModelo']) echo 'selected' ?>><?php echo utf8_decode($value['modelo'])?></option>
             <?php }?>
        </select>
    </p>

   <p>
        <label for="precio_compra">Precio Compra</label><br>
        <input  type="text" name="precio_compra" id="precio_compra" value="<?php echo $this->producto['precio_compra'] ?>" size="55" class="text required"/>
    </p>

    <p>
        <label for="precio_venta">Precio Venta</label><br>
        <input  type="text" name="precio_venta" id="precio_venta" value="<?php echo $this->producto['precio_venta'] ?>" size="55" class="text required"/>
    </p>

    <p>
        <label for="stock_minimo">Stock Minimo</label><br>
        <input  type="text" name="stock_minimo" id="stock_minimo" value="<?php echo $this->producto['stock_minimo'] ?>" size="55" class="text required"/>
    </p>

    <p>
        <label for="existencia">Existencia</label><br>
        <input  type="text" name="existencia" id="existencia" value="<?php echo $this->producto['existencia'] ?>" size="55" class="text "/>
    </p>

    <p>
       <input class="submit long" class="boton-enviar" type="submit" value="Actualizar" />
    </p>

    </form>

</div>


