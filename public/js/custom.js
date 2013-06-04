$(function () {
	
	// Preload images
	//$.preloadCssImages();
	
	// CSS tweaks
	$('#header #nav li:last').addClass('nobg');
	$('.block_head ul').each(function() { $('li:first', this).addClass('nobg'); });
	$('.block form input[type=file]').addClass('file');
			
	
	// $('a.tip').tipsy({live: true});		
	
	
	// Sort table
	// $("table.sortable").tablesorter({
	// 	headers: { 0: { sorter: false}, 5: {sorter: false} },		// Disabled on the 1st and 6th columns
	// 	widgets: ['zebra']
	// });
	
	$('.block table tr th.header').css('cursor', 'pointer');

	// Check / uncheck all checkboxes
	$('.check_all').click(function() {
		$(this).parents('form').find('input:checkbox').attr('checked', $(this).is(':checked'));   
	});
		
	// Set WYSIWYG editor
	 // $('.wysiwyg').wysiwyg({css: "css/wysiwyg.css", brIE: false });
	
	// Modal boxes - to all links with rel="facebox"
	$('a[rel*=facebox]').facebox()
	
	$('.block .message .close').click(function() {
		$(this).parent().fadeOut('slow', function() { $(this).remove(); });
	});
	
	// Form select styling
	$("form select.styled").select_skin();
	
	// Tabs
	$(".tab_content").hide();
	var indice = $("ul.tabs li.active").index();
	$(".block").find(".tab_content:eq("+indice+")").show();

	$("ul.tabs li").click(function() {
		$(this).parent().find('li').removeClass("active");
		$(this).addClass("active");
		$(this).parents('.block').find(".tab_content").hide();
			
		var activeTab = $(this).find("a").attr("href");
		$(activeTab).show();
		
		// refresh visualize for IE
		$(activeTab).find('.visualize').trigger('visualizeRefresh');
		
		return false;
	});
	
	
	
	// Sidebar Tabs
	$(".sidebar_content").hide();
	
	if(window.location.hash && window.location.hash.match('sb')) {
	
		$("ul.sidemenu li a[href="+window.location.hash+"]").parent().addClass("active").show();
		$(".block .sidebar_content#"+window.location.hash).show();
	} else {
	
		$("ul.sidemenu li:first-child").addClass("active").show();
		$(".block .sidebar_content:first").show();
	}

	$("ul.sidemenu li").click(function() {
	
		var activeTab = $(this).find("a").attr("href");
		window.location.hash = activeTab;
	
		$(this).parent().find('li').removeClass("active");
		$(this).addClass("active");
		$(this).parents('.block').find(".sidebar_content").hide();			
		$(activeTab).show();
		return false;
	});	
	
	
	
	// Block search
	$('.block .block_head form .text').bind('click', function() { $(this).attr('value', ''); });
	
	
	
	// Image actions menu
	$('ul.imglist li').hover(
		function() { $(this).find('ul').css('display', 'none').fadeIn('fast').css('display', 'block'); },
		function() { $(this).find('ul').fadeOut(100); }
	);
	
	
	// Style file input
	$("input[type=file]").filestyle({ 
	    image: "images/upload.gif",
	    imageheight : 30,
	    imagewidth : 80,
	    width : 250
	});
		
	// File upload
	if ($('#fileupload').length) {
		new AjaxUpload('fileupload', {
			action: 'upload-handler.php',
			autoSubmit: true,
			name: 'userfile',
			responseType: 'text/html',
			onSubmit : function(file , ext) {
					$('.fileupload #uploadmsg').addClass('loading').text('Uploading...');
					this.disable();	
				},
			onComplete : function(file, response) {
					$('.fileupload #uploadmsg').removeClass('loading').text(response);
					this.enable();
				}	
		});
	}
		
		
	
	// Date picker
	$('input.date_picker').jdPicker({
     	date_format:"dd-mm-YYYY"
	});
	

	// Navigation dropdown fix for IE6
	// if(jQuery.browser.version.substr(0,1) < 7) {
	// 	$('#header #nav li').hover(
	// 		function() { $(this).addClass('iehover'); },
	// 		function() { $(this).removeClass('iehover'); }
	// 	);
	// }
	
	$(".check_us").click(function(){
		var check = $(this);
		check.next(".loading").show();
		check.next(".loading").next(".listo").hide();
		
		if($(this).attr('checked') == true){
			$.post('ajax/add_us/',{id:$("#id_user").val(),id_seccion:$(this).val()},function(data){
				check.next(".loading").hide();
				check.next(".loading").next(".listo").show();
			});	
		}else{
			$.post('ajax/delete_us/',{id:$("#id_user").val(),id_seccion:$(this).val()},function(data){
				check.next(".loading").hide();
				check.next(".loading").next(".listo").show();	
			});	
		}
	});
	
	// IE6 PNG fix
	//$(document).pngFix();
	
	// $("#form_").validate({
	// 	errorClass : 'error',
	// 	errorElement : 'span'
	// });
	
	 
	 
	 
	
});

function delete_row(){
	if(confirm("Esta seguro de eliminar el registro?")){
		return true;	
	}
	return false;
}

function delete_imagen(){
	if(confirm("Esta seguro de eliminar la imagen?")){
		return true;	
	}
	return false;
}

function validate_config(form){
	
	if(form.valor.value == ''){
		alert("Por favor ingrese el valor");
		form.valor.focus();
		return false;
	}
}


function validate_upload(form){
	if(form.userfile.value == ''){
		alert("Por favor cargue una imagen de su disco");
		return false;
	}
}

function validnum(e) { 
	tecla = (document.all) ? e.keyCode : e.which; 
	//alert(tecla)
    if (tecla == 8 || tecla == 46 || tecla == 0) return true; //Tecla de retroceso (para poder borrar) 
    // dejar la lï¿½nea de patron que se necesite y borrar el resto 
    //patron =/[A-Za-z]/; // Solo acepta letras 
    patron = /\d/; // Solo acepta nï¿½meros
    //patron = /\w/; // Acepta nï¿½meros y letras 
    //patron = /\D/; // No acepta nï¿½meros 
    // patron = /[\d.-]/; numeros el punto y el signo -
    te = String.fromCharCode(tecla); 
    return patron.test(te);  
	// uso  onKeyPress="return validnum(event)"
}

function cargar_combos(selected_estado=0,selected_municipio=0,selected_parroquia=0){
        $(".municipio").jCombo(URL+'cliente/cargarMunicipios/',{
            dataType:'json',
            method: "POST",
            selected_value:selected_municipio
        });
        $(".parroquia").jCombo(URL+'cliente/cargarParroquias/',{
            dataType:'json',
            method: "POST",
            parent: ".municipio",
            selected_value:selected_parroquia
        })


    }
