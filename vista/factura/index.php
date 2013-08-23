<div class="block_head">
    <div class="bheadl"></div>
    <div class="bheadr"></div>

    <h2>Facturas</h2>

    <ul>
        <li class="active nobg"><a href="<?php echo URL;?>factura">Pendientes</a></li>
        <li ><a href="<?php echo URL;?>factura/pagadas">Pagadas</a></li>
        <li><a href="<?php echo URL;?>factura/nueva">Crear Factura</a></li>
    </ul>
<!--    <ul>
        <li class="nobg">Del: <input id="fechai" class="date hasDatepicker" value="2012-04-18" type="text"></li>
        <li>Hasta: <input id="fechaf" class="date hasDatepicker" value="2012-05-18" type="text"></li>
        <li>Empresa: <select id="empresa" style="width:110px">
                <option selected="selected" value="">Todas</option>
                <option value="63"></option><option value="62">carlos</option><option value="55">Costa del Pacifico</option>            </select>
            &nbsp; <input value="Buscar" class="" id="btn_search" type="button">
        </li>
    </ul>-->
</div>
<script type="text/javascript">
    	$(document).ready(function(){

			function search_factura(){
				$.ajax({
					//data: "q="+q+"&fi="+fi+"&ff="+ff+"&t="+1,
					type: "POST",
					dataType: "json",
					url: "<?php echo URL;?>factura/buscar_pendientes",
						success: function(data){
							if(data.length > 0){
								var html ='', sum=0;
								$.each(data, function(i,item){
									html += '<tr class="rows"><td></td><td>'+item.nro_control+'</td><td>'+item.nombre_apellido+'</td><td style="text-align:right">'+item.total_neto+'</td><td style="text-align:center">'+item.fecha_emision+'</td><td><a href="<?php echo URL;?>factura/editar/'+item.id+'" class="tip" title="Editar"><img src="<?php echo URL;?>public/images/bedit.png" /></a>&nbsp; <a href="#" class="tip"  title="Eliminar" "><img src="<?php echo URL;?>public/images/bdelete.png" onclick="eliminarFactura('+item.id+')" /></a>&nbsp; <a href="<?php echo URL;?>factura/imprimir/'+item.id+'" class="tip"  title="Imprimir"><img src="<?php echo URL;?>public/images/pdf.png" /></a></td></tr>';

									sum = sum + parseFloat(item.total_neto);

								});
                                                                //console.log(html);
								$(".total_pe").html("<b>"+sum.toFixed(2)+"</b>");
								$(".sortable_list_pen tbody").html(html);
								$(".sortable_list_pen").trigger("update");
								var sorting = [[1,0]];
								$(".sortable_list_pen").trigger("sorton",[sorting]);
							}else{
								$(".total_pe").html("<b>0.00</b>");
								$(".sortable_list_pen tbody").html("");
							}
						}
				  });
			 }

			//search_factura($("#empresa").find("option:selected").val(),$("#fechai").val(),$("#fechaf").val());
                        search_factura();

			$("#btn_search").click(function(){
				search_factura($("#empresa").find("option:selected").val(),$("#fechai").val(),$("#fechaf").val());
			});


			var dates = $('#fechai, #fechaf').datepicker({
			showOn: "button",
			buttonImage: "<?php echo URL; ?>public/images/calendar.png",
			buttonImageOnly: true,
			maxDate: '+3M',
			dateFormat: 'yy-mm-dd',
			onSelect: function(selectedDate) {
				var option = this.id == "fechai" ? "minDate" : "maxDate";
				var instance = $(this).data("datepicker");
				var date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
				dates.not(this).datepicker("option", option, date);
			}
		});

		});
    </script>
<!--<script type="text/javascript">
    $(document).ready(function(){

//        function search_factura(q, fi, ff, t){
//            $.ajax({
//                data: "q="+q+"&fi="+fi+"&ff="+ff+"&t="+t,
//                type: "POST",
//                dataType: "json",
//                url: "ajax/facturas_ajax/",
//                success: function(data){
//                    if(data.length > 0){
//                        var html ='', sum=0;
//                        $.each(data, function(i,item){
//                            html += '<tr class="rows"><td></td><td>'+item.numero+'</td><td>'+item.nombre_comercial+'</td><td style="text-align:right">'+item.monto+'</td><td style="text-align:center">'+item.fecha+'</td><td><a href="facturas/editar/'+item.id+'" class="tip" title="Editar"><img src="public/admin/images/bedit.png" /></a>&nbsp; <a href="facturas/eliminar/'+item.id+'" class="tip"  title="Eliminar" onclick="return delete_row()"><img src="public/admin/images/bdelete.png" /></a>&nbsp; <a href="facturas/imprimir/'+item.id+'" class="tip"  title="Imprimir"><img src="public/admin/images/pdf.png" /></a></td></tr>';
//
//                            sum = sum + parseFloat(item.monto);
//
//                        });
//
//                        $(".total_pe").html("<b>"+sum.toFixed(2)+"</b>");
//                        $(".sortable_list_pen tbody").html(html);
//                        $(".sortable_list_pen").trigger("update");
//                        var sorting = [[1,0]];
//                        $(".sortable_list_pen").trigger("sorton",[sorting]);
//                    }else{
//                        $(".total_pe").html("<b>0.00</b>");
//                        $(".sortable_list_pen tbody").html("");
//                    }
//                }
//            });
//        }
//
//        search_factura($("#empresa").find("option:selected").val(),$("#fechai").val(),$("#fechaf").val(),0);
//
//        $("#btn_search").click(function(){
//            search_factura($("#empresa").find("option:selected").val(),$("#fechai").val(),$("#fechaf").val(),0);
//        });


$('#fechai').datepicker({
            showOn: "both",
            buttonImage: "<?php echo URL; ?>public/images/calendar.png",
            buttonImageOnly: true
//            maxDate: '+3M',
//            dateFormat: 'yy-mm-dd',
//            onSelect: function(selectedDate) {
//                var option = this.id == "fechai" ? "minDate" : "maxDate";
//                var instance = $(this).data("datepicker");
//                var date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
//                dates.not(this).datepicker("option", option, date);
          //  }
        });

    });
</script>-->
<div class="block_content">
    <form action="" method="post">

        <table class="sortable_list_pen" cellpadding="0" cellspacing="0" width="100%">

            <thead>
                <tr>
                    <th width="5%"></th>
                    <th class="header headerSortDown" width="20%">Número</th>
                    <th class="header" width="20%">Cliente</th>
                    <th class="header" width="8%"><div style="position:relative; left:28px">Precio Total</div></th>
            <th class="header" style="text-align: center;" width="30%">Fecha</th>
            <th class="option" width="10%">Opcion</th>
            </tr>
            </thead>
            <tbody></tbody>
            <tfoot>
                <tr>
                </tr><tr><td colspan="2"></td><td><b>Total</b></td><td class="total_pe" style="text-align: right; font-size: 13px;"><b>0.00</b></td><td colspan="2"></td></tr>

            </tfoot>
        </table>

    </form>
<!--    <script type="text/javascript">
        	$(function () {

				$("table.sortable_list_pen").tablesorter({
					headers: { 0: { sorter: false}, 5: {sorter: false} },		// Disabled on the 1st and 6th columns
					widgets: ['zebra']
				});

			});
        </script>-->
</div>

<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/jquery-ui/css/smoothness/jquery-ui-1.8.20.custom.css"/>
<script type="text/javascript" src="<?php echo URL; ?>public/jquery-ui/js/jquery-ui-1.8.20.custom.min.js"></script>
