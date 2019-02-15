<?php session_start(); 
include("Cabecera.php");
$ID=$_REQUEST["id_usuario"];
$cons=mysql_query("SELECT * FROM usuarios WHERE id_usuario='$ID'",$conec);
$dato=mysql_fetch_array($cons);
$nfila=mysql_num_rows($cons);
?>

	<link rel="stylesheet" type="text/css" href="../css/estilos_archivos.css">
	<style type="text/css">
		.select{
			width: 40%;
			margin-left: -1%;
			margin-top: 15px;
			box-sizing: border-box;
			font-size: 15px;
			padding: 10px;
			display:inline-block;
			border: 1px solid rgba(0,0,0,0.3);
			background: transparent;
			box-shadow: 0px 0px 2px rgba(0,0,0,0.5);	
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
			$(".SubMenuAdminLink2").addClass("seleccionado");	
			$("#SubMenuAdministracion").show();
			$("#flechaAdministracion").addClass("rotarImagen");
		});
	</script>
	<div class="contenedor_archivo">
	  	<form method="post" class="FormModificar" action="GuardarUsuario.php">
	  		<div class="TituloModalRegistro">Modificar Usuario</div>
			<div class="DivInput">
				<p>Usuario</p>
				<input type="text" name="txtusuario" maxlength="30" required  value="<?php echo $dato["usuario"]; ?>"/>
			</div>
			<div class="DivInput">
				<p>Contraseña</p>
				<input type="password" name="txtclave" maxlength="30" required  value="<?php echo $dato["clave"]; ?>"/>
			</div>
			<div class="DivInput">
				<p>Cédula</p>
				<input type="text" name="txtcedula" maxlength="20" required  value="<?php echo $dato["cedula_usuario"]; ?>"/>
			</div>
			<div class="DivInput">
				<p>Correo </p>
				<input type="text" name="txtcorreo" required maxlength="50" value="<?php echo $dato["correo_usuario"]; ?>"/>
			</div>


  			

			<div class="DivInput" hidden>
				<p>Tipo</p>
				<?php 
					if ($dato["tipo"]=="DEPOSITARIO") {
						?>
						<select class="select" name="txttipo" required>
			  				<option value="<?php echo $dato["tipo"]; ?>"><?php echo $dato["tipo"]; ?></option>
			  				<option value="ADMINISTRADOR">ADMINISTRADOR</option>
			  			</select>

			  			<?php
					} else{
						?>
						<select class="select" name="txttipo" required>
			  				<option value="<?php echo $dato["tipo"]; ?>"><?php echo $dato["tipo"]; ?></option>
			  				<option value="DEPOSITARIO">DEPOSITARIO</option>
			  			</select>
						<?php
					}
				?>
			</div>

			<input type="hidden" name="hidid" value="<?php echo $dato["id_usuario"] ?>" />

			<div class="caja_botones">
				<br>
				<input type="submit" class="btnRegistrar" value="Actualizar" />
				<a href="usuarios.php" class="btnBorrar">Atrás</a>
			</div>
		</form>
  	</div>

</body>
</html>
