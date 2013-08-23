<div class="block_head">
        <div class="bheadl"></div>
        <div class="bheadr"></div>
        
        <h2>Facturas</h2>
        
        <ul>
        	<li><a href="<?php echo URL; ?>factura">Pendientes</a></li>
            <li><a href="<?php echo URL; ?>factura/pagadas">Pagadas</a></li>
            <li class="active"><a href="<?php echo URL;?>factura/nueva">Crear Factura</a></li>
        </ul>
    </div>		

    <div class="block_content" id="new">
	
		
					<form method="post" action="<?php echo URL;?>factura/guardarEditar" enctype="multipart/form-data" id="form_new_p" name="form_new_p"> 
            	<input type="hidden" id="id_factura" name="id_factura" value="<?php echo $this->factura['id']; ?>" />
            	<div style="width:50%; float:left">
                	<p><label>Número Factura</label><br /> <input type="text" name="numero" class="text required"  value="<?php echo $this->factura['nro_control'];?>"></p>
                	<p><label>Fecha</label><br /> <input type="text" name="fecha" style="width:380px"  class="text date_picker"   value="<?php echo date('Y/m/d',strtotime($this->factura['fecha_emision']));?>"></p>
                </div>
                <div style="width:50%; float:left">
                	<div class="ui-widget">
                		<p><label>Cliente</label><br /> <input type="text" name="cliente" id="clientes" class="text required"  value="<?php echo $this->factura['nombre_apellido'];?>"></p>				</div>
                    <textarea class="text" name="des" id="des" style="height:40px" disabled="disabled"><?php echo $this->factura['nombre_apellido'] ."\n".$this->factura['nacionalidad']."-".$this->factura['cedula'].",".$this->factura['direccion'].",".$this->factura['municipio'].",".$this->factura['parroquia']?></textarea>
                </div>


                <br clear="all" />
				<table cellpadding="0" cellspacing="0" width="100%">
            
                    <thead>
                        <tr>
                            <th width="10"></th>
                            <th>Cantidad</th>
                            <th width="30%">Descripción</th>
                            <th style="text-align:right" width="10%">Precio</th>
                            <th style="text-align:right" width="10%">Precio Total</th>
                            <th></th>
                            
                        </tr>
                    </thead>
                    <tbody id="detalle">
                        <?php foreach ($this->productos_factura as $value) {?>
                            <tr>
                        	<td width="10"></td>
                                <td><?php echo $value['cantidad_producto']; ?></td>
                                <td width="30%"><?php echo $value['descripcion']; ?></td>
                                <td style="text-align:right" width="10%"><?php echo $value['precio_venta']; ?></td>
                                <td style="text-align:right" width="10%"><?php echo $value['total_producto']; ?></td>
                                <td></td>
                            </tr>
                        <?php }?>


 
                    	
                    </tbody>
                    <tfoot>
                    	<tr>
                        	<th colspan="3"></th>
                            <th style="text-align:right"><b>Total sin IVA</b></th>
                            <th style="text-align:right"><b class="total_siva"><?php echo $this->factura['total_sin_iva'] ?></b></th>
                            <th></th>
                        </tr>
                        <tr>
                            <th colspan="3"></th>
                            <th style="text-align:right"><b> IVA</b></th>
                            <th style="text-align:right"><b class="iva"><?php echo $this->factura['total_iva'] ?></b></th>
                            <th></th>
                        </tr>
                        <tr>
                            <th colspan="3"></th>
                            <th style="text-align:right"><b>Total con IVA</b></th>
                            <th style="text-align:right"><b class="total_civa"><?php echo $this->factura['total_neto'] ?></b></th>
                            <th></th>
                        </tr>
                     <tfoot>
                </table>
                <br clear="all">
                <p><label>Estado</label><br /> 
                        
            <select class="styled valid" style="opacity: 0; position: relative; z-index: 100;" name="estatus">
            <option value="pendiente" <?php if ($this->factura['estatus'] == 'pendiente') echo 'selected' ?>>Pendiente</option>
            <option value="pagada" <?php if ($this->factura['estatus'] == 'pagada') echo 'selected' ?>>Pagada</option>
        </select>
                        </p>
                <hr>

                <p>
                	<input type="submit" class="submit mid" value="Actualizar" />
                </p>
               
             </form>
					
                    						
		</div>

