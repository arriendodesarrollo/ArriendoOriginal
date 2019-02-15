<?php session_start(); 
	if($_SESSION['TierraAlta_TipoMostrar']==NULL){
		header("location: ../index.php");  
	}else if($_SESSION['TierraAlta_TipoMostrar']=='DEPOSITARIO'){
		header("location: ../DEPOSITARIO/index.php");  
	}else if($_SESSION['TierraAlta_TipoMostrar']=='ADMIN_INVENTARIO'){
		header("location: ../ADMINISTRADOR/index.php");
	}
	include("Cabecera.php");
	$rif_inquilino=$_REQUEST["rif_inquilino"];
	$cons=mysql_query("SELECT * FROM alquiler_inquilino WHERE rif_inquilino='$rif_inquilino'",$conec);
	$dato=mysql_fetch_array($cons);
	$nfila=mysql_num_rows($cons);
?>
	<link rel="stylesheet" type="text/css" href="../css/estilos_archivos.css">
	<style type="text/css">
		.select{
			width: 40%;
			margin-left: -1%;
			box-sizing: border-box;
			font-size: 15px;
			padding: 10px;
			display:inline-block;
			border: 1px solid rgba(0,0,0,0.3);
			background: transparent;
			box-shadow: 0px 0px 2px rgba(0,0,0,0.5);	
			color: rgba(0,0,0,1);
		}
		.select option{
			color: black;
		}
		.FormModificar .btnRegistrar{
			margin-left: -45%;
			width: 40%;
			margin-right: 6%;
		}
		.FormModificar .btnBorrar{
			margin-left: 50%;
			padding: 11px;
			text-decoration: none;
			width: 38%;
			display: inline-block;
			text-align: center;
			font-size: 20px;
			font-weight: bold; 
		}
	</style>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".inquilinoLink").addClass("seleccionado");	
		});
	</script>
	<?php
		if ($dato['telefono2_inquilino']==0) {
			$Telefono2 = "";
		} else {
			$Telefono2 = $dato['telefono2_inquilino'];
		}
	?>
	<div class="contenedor_archivo">
	  	<form method="post" class="FormModificar" action="Guardainquilino.php">
	  		<div class="TituloModalRegistro">Modificar inquilino</div>
			<div class="DivInput">
				<p>Rif</p>
				<input type="text" name="rif_inquilino" maxlength="20" required value="<?php echo $dato["rif_inquilino"]; ?>" />
			</div>
			<div class="DivInput">
				<p>Razón Social</p>
				<input type="text" name="txtnombre" maxlength="30" required value="<?php echo $dato["nombre_inquilino"]; ?>" />
			</div>
			<div class="DivInput">
				<p>Teléfono 1</p>
				<input type="number" name="txttelefono1" maxlength="20" required value="<?php echo $dato['telefono1_inquilino'] ?>" />
			</div>
			<div class="DivInput">
				<p>Teléfono 2 (Opcional)</p>
				<input type="number" name="txttelefono2"  maxlength="20" value="<?php echo $Telefono2; ?>" />
				 
			</div>
			<div class="DivInput">
				<p>Correo</p>
				<input type="text" name="txtcorreo" maxlength="50" required value="<?php echo $dato["correo_inquilino"]; ?>" />
			</div>
			<div class="DivInput">
				<p>Dirección</p>
				<input type="text" name="txtdireccion" maxlength="50" required value="<?php echo $dato["direccion_inquilino"]; ?>" />
			</div>
			
			<input type="hidden" name="hidid" value="<?php echo $dato["id_inquilino"] ?>" />

			<div class="caja_botones">
				<br>
				<input type="submit" class="btnRegistrar" value="Actualizar" />
				<a href="Consultainquilinos.php" class="btnBorrar">Atrás</a>
			</div>
		</form>
		<div class="EspacioFinal"></div>
	</div>
</body>
</html>
