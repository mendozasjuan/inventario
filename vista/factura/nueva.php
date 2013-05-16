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
		<script type="text/javascript">
        	$(function() {
		
				$( "#clientes" ).autocomplete({
					source: function( request, response ) {
						$.ajax({
							url: "<?php echo URL;?>factura/buscarClientes/"+request.term,
							type:"POST",
							dataType: "json",
//							data: {
//								//maxRows: 12,
//								q: request.term
//							},
							success: function(data) {
								
								response( $.map( data, function( item ) {
									return {
										label: item.nombre_apellido +" ("+ item.nombre_apellido +")",
										value: item.nombre_apellido,
										id: item.id,
										cedula: item.nacionalidad +"-"+item.cedula,
										direccion: item.direccion,
										parroquia: item.parroquia,
										municipio: item.municipio
									}
								}));
							}
						});
					},
					minLength: 2,
					select: function( event, ui ) {
						$("#id_cliente").val(ui.item.id);
						$("#des").val(ui.item.label+"\n"+ui.item.cedula+", "+ui.item.direccion+", "+ui.item.municipio+", "+ui.item.parroquia);
					},
					open: function() {
						$( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
					},
					close: function() {
						$( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
					}
				});
//				
				$("#buscar_prod_serv").click(function() {
					$('<a href="<?php echo URL;?>factura/anadir_producto"></a>').facebox({
						overlayShow: true
					}).click();

				});
				
				$(".psi, .quantity").live("keyup",(function(){
					calculate();
				}));
				
				$(".delete").live("click",(function(){
					$(this).parent().parent().remove();
					if($("#detalle tr").length == 0){
						$("#detalle").html('<tr class="nothing"><td style="text-align:center" colspan="6">Sin detalle</td></tr>');
					}
					calculate();
				}));
				
				function calculate()
				{
					var suma=0, iva = 0;
					$(".psi").each(function(x){
						suma += parseInt($(".psi").eq(x).val() * $(".quantity").eq(x).val());
						$(".ptotal").eq(x).text((parseInt($(".psi").eq(x).val() * $(".quantity").eq(x).val())).toFixed(2));
                                                $('.total_producto').eq(x).val((parseInt($(".psi").eq(x).val() * $(".quantity").eq(x).val())).toFixed(2));
					});
					iva = (suma) * <?php echo IVA; ?>;
//					$(".total_siva").html((suma).toFixed(2));
//					$(".iva").html((iva).toFixed(2));
//					$(".total_civa").html((suma + iva).toFixed(2));
//					$("#input_total_civa").val((suma + iva).toFixed(2));

                                        $(".total_siva").html((suma).toFixed(2));
                                        $("#input_total_siva").val((suma).toFixed(2));
					$(".iva").html((iva).toFixed(2));
                                        $("#iva").val((iva).toFixed(2));
					$(".total_civa").html((suma + iva).toFixed(2));
					$("#input_total_civa").val((suma + iva).toFixed(2));
				}
				
				$("#form_new_p").validate({
					errorClass : 'error',
					errorElement : 'span',
					submitHandler: function(form) {
						if($("#detalle tr").eq(0).hasClass("nothing")){
							alert("Ustede debe ingresar un detalle para la factura");
							return false;
						}
                                                if($("#forma_pago").val()== "contado"){
                                                    $('<a href="#efectivo"></a>').facebox({
                                                        overlayShow: true
                                                    }).click();
                                                }else{
                                                    document.form_new_p.submit()
                                                }
						
					}
				});
                                
                                $("#input_aceptar").live("click",(function(){
					
                                                document.form_new_p.submit()
						$.facebox.close();
						return false;					
						
					
				}));
                                
$("#input_efectivo.text").live("keyup",(function(){
    cambio=parseInt($(this).val() - $("#input_total_civa").val());
    $("#input_cambio.text").val(cambio);
}));

			});
        </script>		
		
					<form method="post" action="agregar/" enctype="multipart/form-data" id="form_new_p" name="form_new_p"> 
            	<input type="hidden" id="id_cliente" name="id_cliente" />
            	<div style="width:50%; float:left">
                	<p><label>Número Factura</label><br /> <input type="text" name="numero" class="text required"  value="<?php echo $this->nroFactura; ?>"></p>
                	<p><label>Fecha</label><br /> <input type="text" name="fecha" style="width:380px"  class="text date_picker"   value="<?php  echo date('Y/m/d')?>"></p>
                </div>
                <div style="width:50%; float:left">
                	<div class="ui-widget">
                		<p><label>Buscar Cliente</label><br /> <input type="text" name="cliente" id="clientes" class="text required"  value=""></p>				</div>
                    <textarea class="text" name="des" id="des" style="height:40px" disabled="disabled"></textarea>
                </div>
                <div style="float:left">
                	<p><label>Forma de Pago</label><br /> 
                        
            <select class="styled valid" style="opacity: 0; position: relative; z-index: 100;" id="forma_pago" name="forma_pago">
            <option value="contado">Contado</option>
            <option value="credito">Credito</option>
        </select>
                        </p>
                	
                </div>
                
                <p align="right"><input type="button" class="submit extra_long" id="buscar_prod_serv" value="Añadir Producto" /></p>
                <br clear="all" />
				<table cellpadding="0" cellspacing="0" width="100%">
            
                    <thead>
                        <tr>
                            <th width="10"></th>
                            <th>Cantidad</th>
                            <th width="30%">Descripción</th>
                            <th style="text-align:right" width="10%">Precio</th>
                            <th style="text-align:right" width="10%">Precio Total</th>
                            <th class="option" style="text-align:center">Opcion</th>
                        </tr>
                    </thead>
                    <tbody id="detalle">
                    	<tr class="nothing">
                        	<td style="text-align:center" colspan="6">Sin detalle</td>
                        </tr>
                    </tbody>
                    <tfoot>
                    	<tr>
                        	<th colspan="3"></th>
                            <th style="text-align:right"><b>Total sin IVA</b></th>
                            <th style="text-align:right"><b class="total_siva">0.00</b></th>
                            <th></th>
                        </tr>
                        <tr>
                            <th colspan="3"></th>
                            <th style="text-align:right"><b> IVA</b></th>
                            <th style="text-align:right"><b class="iva">0.00</b></th>
                            <th></th>
                        </tr>
                        <tr>
                            <th colspan="3"></th>
                            <th style="text-align:right"><b>Total con IVA</b></th>
                            <th style="text-align:right"><b class="total_civa">0.00</b></th>
                            <th></th>
                        </tr>
                     <tfoot>
                </table>
                                <input type="hidden" name="iva" id="iva" />
                                <input type="hidden" name="input_total_siva" id="input_total_siva" />
				<input type="hidden" name="input_total_civa" id="input_total_civa" />
                <p>
                	<input type="submit" class="submit mid" value="Guardar" />
                </p>
               
             </form>
					
                    						
		</div>

<div class="content" id="efectivo" style="display:none"><div class="block" id="popup">
    <h2>Cambio</h2>
<!--    <div  style="display: block;"><div class="block" style="width:470px; height:290px" >-->
					<div class="block_content">
						<form id="form_efectivo" novalidate="novalidate">
						
						<p>
                                                    <label>Efectivo:</label><br> <input type="text" class="text required" id="input_efectivo" name="input_efectivo" >
						</p>
						<p>
							<label>Cambio:</label><br clear="all"> <input type="text required" style="width:220px" class="text" id="input_cambio" name="input_cambio">
						</p>
						
						<p align="center"><input type="button" value="Aceptar" id="input_aceptar" class="submit mid"></p>
					</form></div></div></div>