<script>
		$(document).ready(function(){
		$( "#term" ).autocomplete({
					source: function( request, response ) {
						$.ajax({
							url: "<?php echo URL;?>factura/buscar_producto/"+request.term,
							type:"POST",
							dataType: "json",
//							data: {
//								//maxRows: 12,
//								q: request.term
//							},
							success: function(data) {

								response( $.map( data, function( item ) {
									return {
										label: item.nombre,
										value: item.nombre,
										id_prod: item.id,
										id_proveedor: item.id_servicio,
										precio: item.precio_venta
									}
								}));
							}
						});
					},
					minLength: 1,
					select: function( event, ui ) {
						$("#precio_b").val(ui.item.precio);
                                                $("#id_producto").val(ui.item.id_prod);
					},
					open: function() {
						$( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
					},
					close: function() {
						$( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
					}
				});

				$("#form_add_ps").validate({
					errorClass : "error",
					errorElement : "span",
					submitHandler: function(form) {
						var html = "<tr><td></td><td><input style='text-align:center' value="+$("#cantidad").val()+"  name='quantity[]' class='quantity' type='text'><input type='hidden' name='id_producto[]' value='"+$("#id_producto").val()+"' ><input type='hidden' name='descripcion[]' value='"+$("#term").val()+"' ><input type='hidden' class='total_producto' name='total_producto[]' value='"+$("#precio_b").val() * $("#cantidad").val() +"' ></td><td>"+$("#term").val()+"</td><td><input style='text-align:right' value="+$("#precio_b").val()+" type='text' class='psi' name='psi[]'></td><td style='text-align:right' class=ptotal>"+($("#precio_b").val() * $("#cantidad").val()).toFixed(2)+"</td><td  style='text-align:center'><a  class='delete'  title='Eliminar'  href=javascript:;><img src='<?php echo URL;?>public/images/bdelete.png' /></td></tr>";

						if($("#detalle tr").eq(0).hasClass("nothing")){
							$("#detalle").html(html);
						}else{
							$("#detalle").append(html);
						}
						var suma=0, iva = 0;
						$(".psi").each(function(x){
							suma += parseInt($(".psi").eq(x).val() * $(".quantity").eq(x).val());
						});
						iva = (suma) * <?php echo IVA ?>;
						$(".total_siva").html((suma).toFixed(2));
                                                $("#input_total_siva").val((suma).toFixed(2));
						$(".iva").html((iva).toFixed(2));
                                                $("#iva").val((iva).toFixed(2));
						$(".total_civa").html((suma + iva).toFixed(2));
						$("#input_total_civa").val((suma + iva).toFixed(2));


						$.facebox.close();
						return false;
					}
				});
		});
	</script>
<div class="content" style="display: block;"><div class="block" style="width:470px; height:290px" id="popup"><h2>Buscar Producto</h2><div class="block">
					<div class="block_content">
						<form id="form_add_ps" novalidate="novalidate">
<!--						<p>
							<label>Tipo:</label> <input type="radio" checked="checked" value="1" id="tipo" name="tipo"> Producto &nbsp;&nbsp; <input type="radio" id="tipo" name="tipo" value="2"> Servicio
						</p>-->
						<p>
							<label>Nombre:</label> <input type="text" class="text required ui-autocomplete-input valid ui-corner-all" id="term" name="term" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">
						</p>
						<p>
							<label>Precio:</label><br clear="all"> <input type="text required" style="width:220px" class="text" id="precio_b" name="precio">
						</p>
						<p>
							<label>Cantidad:</label><br clear="all"> <input type="text" style="width:220px" class="text number required" id="cantidad" name="cantidad">
                                                        <input type="hidden"  id="id_producto" name="id_producto">
						</p>
						<p align="center"><input type="submit" value="Aceptar" id="aceptar" class="submit mid"></p>
					</form></div></div></div></div>