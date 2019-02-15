<?php session_start(); 
	include("Cabecera.php");
?>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".SubMenuAdminLink1").addClass("seleccionado");	
			$("#SubMenuAdministracion").show();
			$("#flechaAdministracion").addClass("rotarImagen");
		});
	</script>


	<link rel="stylesheet" type="text/css" href="../css/estilos_archivos.css">
	<style type="text/css">
		.contenedor_archivo{
			font-size: 30px;
		}
	</style>
	<div class="contenedor_archivo">
	<br>
		<center>
			<img src="../IMAGEN/diseno-web.jpg"><br>
			Desarrollador: Ing. Raúl Escalona <br>
			Correo Electrónico: Raulescalonag@gmail.com <br>
		</center>
	</div>
</body>
</html>