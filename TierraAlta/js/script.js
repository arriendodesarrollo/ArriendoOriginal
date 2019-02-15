function startTime(){
	today=new Date();
	var d  = today.getDate();
	var day = (d < 10) ? '0' + d : d;
	var m = today.getMonth() + 1;
	var month = (m < 10) ? '0' + m : m;
	var yy = today.getYear();
	var year = (yy < 1000) ? yy + 1900 : yy;
	document.getElementById('fecha').innerHTML="Fecha de acceso: "+day + "/" + month + "/" + year;
}
window.onload=function(){startTime();}

$(document).ready(function(){
	//SCRIPT SECCION SELECCIONADO

	//FIN SCRIPT SECCION 1 SELECCIONADO
	$(".idTexto").click(function(){
	    $('#SubMenuAdministracion').slideUp();
		$('#SubMenuArticulos').slideUp();
	    
	});

	$('#MenuArticulos').on('click',function(){
		$('#SubMenuArticulos').slideToggle();
		$('#SubMenuAdministracion').slideUp();
		$("#flechaArticulos").toggleClass("rotarImagen");
		$("#flechaAdministracion").removeClass("rotarImagen");
		
	});

	$('#MenuAdministracion').on('click',function(){
		$('#SubMenuAdministracion').slideToggle();
		$('#SubMenuArticulos').slideUp();
		$("#flechaAdministracion").toggleClass("rotarImagen");
		$("#flechaArticulos").removeClass("rotarImagen");



		$("#MenuRegistrar").addClass("seleccionado");
		$("#MiCuenta").removeClass("seleccionado");
		$("#Solicitudes").removeClass("seleccionado");
		$("#MenuConsultar").removeClass("seleccionado");
	});

	$('.datos_usuario').on('click',function(){
		$('#MenuDatosUsuario').slideToggle();
		$('.datos_usuario').toggleClass('datos_usuario_seleccionado');
		$('.usuario_imagen').toggleClass('imagen_seleccionada');
	});

	/*MOSTRAR ARCHIVOS EN CUADRO PRINCIPAL*/
	
	$('#ComprasLink').on('click',function(){
		$('.ContenidoDelMenu').slideDown('slow');
		$('.archivoCompras').show();
		$('.archivoVentas').hide();
		$('.archivoCliente').hide();
		$('.archivoProveedor').hide();
		$('.archivoCobrosPagos').hide();
	});
	$('#ClienteLink').on('click',function(){
		$('.ContenidoDelMenu').slideDown('slow');		
		$('.archivoVentas').hide();
		$('.archivoCompras').hide();
		$('.archivoCliente').show();
		$('.archivoProveedor').hide();
		$('.archivoCobrosPagos').hide();
	});
	$('#ProveedorLink').on('click',function(){
		$('.ContenidoDelMenu').slideDown('slow');
		$('.archivoCompras').hide();
		$('.archivoVentas').hide();
		$('.archivoCliente').hide();
		$('.archivoProveedor').show();
		$('.archivoCobrosPagos').hide();
	});
	$('#CobrosPagosLink').on('click',function(){
		$('.ContenidoDelMenu').slideDown('slow');
		$('.archivoCompras').hide();
		$('.archivoVentas').hide();
		$('.archivoCliente').hide();
		$('.archivoProveedor').hide();
		$('.archivoCobrosPagos').show();
	});



});

