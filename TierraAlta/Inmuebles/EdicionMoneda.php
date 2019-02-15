<?php session_start(); 
	include("Cabecera.php");
	$nombre_moneda=$_REQUEST["nombre_moneda"];
	$cons=mysql_query("SELECT * FROM alquiler_moneda WHERE nombre_moneda='$nombre_moneda'",$conec);
	$dato=mysql_fetch_array($cons);
	$nfila=mysql_num_rows($cons);
?>

	<link rel="stylesheet" type="text/css" href="../css/estilos_archivos.css">
	<style type="text/css">
		.FormModificar .btnRegistrar{
			margin-left: -45%;
			width: 40%;
			margin-right: 6%;
		}
		.FormModificar .btnBorrar{
			margin-left: 50%;
			padding: 11px;
			text-decoration: none;
			width: 40%;
			display: inline-block;
			text-align: center;
			font-size: 20px;
			font-weight: bold; 
		}
		.FormModificar{
			margin-top: 10%;
		}
		.DivInput input{
			margin-top: 3%;
		}
	</style>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".monedaLink").addClass("seleccionado");
		});
	</script>
	<div class="contenedor_archivo">
	  	<form method="post" class="FormModificar" action="GuardaMoneda.php">
	  		<div class="TituloModalRegistro">Modificar Moneda</div>
			<div class="DivInput">
				<p>Moneda</p>
				<input type="text" name="nombre_moneda" maxlength="40"  required  value="<?php echo $dato["nombre_moneda"]; ?>"/>
			</div>

			<input type="hidden" name="hidid" value="<?php echo $dato["id_moneda"] ?>" />

			<div class="caja_botones">
				<br>
				<input type="submit" class="btnRegistrar" value="Actualizar" />
				<a href="ConsultarMoneda.php" class="btnBorrar">Atrás</a>
			</div>
		</form>
		<div class="EspacioFinal"></div>
  	</div>

</body>
</html>
