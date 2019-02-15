<?php 
	session_start(); 
	if($_SESSION['TierraAlta_TipoMostrar']==NULL){
		header("location: ../index.php");  
	}else if($_SESSION['TierraAlta_TipoMostrar']=='DEPOSITARIO'){
		header("location: ../DEPOSITARIO/index.php");  
	}else if($_SESSION['TierraAlta_TipoMostrar']=='ADMIN_INVENTARIO'){
		header("location: ../ADMINISTRADOR/index.php");
	}
	include("cabecera.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/estilos_archivos.css">
	<style type="text/css">
		.tablaArticulos{
			background: white;
			border-radius:3px;
			border-collapse: collapse;
			height: auto;
			padding:5px;
			box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
			width: 76%;
			float: right;
			margin-right: 52%;
			margin-top: 10%;
		}
		
		.Span_tablaArticulos{
			margin-top: 7%;
			margin-left: 50%;
			padding: 7px 30px;
			font-weight: bold;
			font-size: 30px;
			color: rgba(0,0,0,0.5);
			position: absolute;
			width: 71%;
			right: 2%;
			text-align: center;
		}		

		.nombre_cliente{
			display: inline-block;
			width: 300px;
			position: relative;
			left: 50%;
			margin-left: -10px;
			margin-top: 7%;
			padding: 10px 20px 0px 20px;
			cursor: pointer;
			
			box-shadow: 1px 1px 15px rgba(0,0,0,0.2);
			
			transition: 0.5s;
			height: 35px;
		}
		.nombre_cliente:hover{
			background: #efefef;
			transition: 0.5s;
		}
		.nombre_cliente span{
			font-size: 18px;
		}
		.nombre_cliente img{
			width: 20px;
			height: 20px;
			float: right;
			-webkit-filter: invert(100%);
			filter: invert(100%);
		}
		.nombre_cliente_seleccionado{
			background: #efefef;
			border-top-left-radius: 5px;
			border-top-right-radius: 5px;
			height: 35px;
			z-index: 1;
			transition: 0.5s !important;

			box-shadow: 1px 1px 15px rgba(0,0,0,0.5);
		}


		#MenuNombreCliente{
			position:absolute;
			width: 340px;
			left: 50%;
			z-index: 1;
			margin-left: -10px;
			background: rgba(255,255,255,1);
			
			box-shadow: 0px 5px 15px rgba(0,0,0,0.7);
		}
		#MenuNombreCliente input{
			font-size: 14px;
			width: 93%;
			border: none;
			border-bottom: 1px solid rgba(0,0,0,0.2);
			padding: 10px;
			transition: 0.5s;
			display: inline-block;	
		}

		.botonCliente{
			background: transparent;
			position: absolute;
			margin-left:-99%;
			width: 100% !important;
			border: none !important;
			cursor: pointer;
		}
		#MenuNombreCliente .botonCliente:hover{
			background: rgba(0,0,0,0.1);
			
			transition: 0.5s;
		}
		.divInsertar{
			position: absolute;
			right: 0;
			margin-top: 80px;
			z-index: 1;
		}
		.select{
			width: 40%;
			margin-left:6%;
			margin-top: 15px;
			box-sizing: border-box;
			font-size: 15px;
			padding: 10px;
			display:inline-block;
			border: 1px solid rgba(0,0,0,0.3);
			background: transparent;
			box-shadow: 0px 0px 2px rgba(0,0,0,0.5);	
			color: rgba(0,0,0,0.5);
		}
		.select option{
			color: black;
		}
		td input{
			background: none;
			border: none;
			padding:0;
			margin: 0;
		}
		td{
			padding: 10px;
		}
		.acciones a img{
			filter: invert(100%);
			-webkit-filter: invert(100%);
		}
		.acciones a img:hover{
			border: 2px solid white;
		}
		td,th{
			text-align: center;
		}
	</style>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".SubMenuAdminLink2").addClass("seleccionado");	
			$("#SubMenuAdministracion").show();
			$("#flechaAdministracion").addClass("rotarImagen");
		});
	</script>
</head>
<body>
	<?php 
		$conec=Conectarse();
		if ($_SESSION['TierraAlta_TipoMostrar']=='ADMIN_PRINCIPAL') {
			$admin_inmueble='ADMIN_INMUEBLE';
			$admin_principal='ADMIN_PRINCIPAL';
			$sql = "SELECT * FROM usuarios WHERE tipo='$admin_inmueble' or tipo='$admin_principal'"; 
			echo '<div class="divInsertar">
		  		<a href="#Modal_insertar" title="Agregar">+</a>
		  	</div>';
			echo "<span class='Span_tablaArticulos'>Usuarios</span>";

		} else{
			$usuario_conectado=$_SESSION['TierraAlta_Mostrar'];
			$sql = "SELECT * FROM usuarios WHERE usuario='$usuario_conectado'";
			echo "<span class='Span_tablaArticulos'>Mi Usuario</span>";

		}
		
		$result = mysql_query ($sql);
	?>
	
  	<!--INICIO - INSERTAR VENTANA MODAL-->
  	<div id="Modal_insertar">
  		<a href="#" class="Cerrar">x</a>
  		<form method="post" class="FormInsertar" action="GuardarUsuario.php">
  			<div class="TituloModalRegistro">Registro Usuario</div>
  			<input type="text" name="txtusuario" placeholder="Usuario" maxlength="15" min="1" required />
  			<input type="password" name="txtclave" placeholder="Contraseña" maxlength="40" required />
  			<input type="text" name="txtcedula" placeholder="Cédula de Identidad" maxlength="15"  required />
  			<input type="text" name="txtcorreo" placeholder="Correo Electrónico" maxlength="50" required />
  			
  			<select class="select" name="txttipo" required>
  				<option value="">Seleccionar tipo de usuario</option>
  				<option value="ADMIN_INMUEBLE">Administrador</option>
  			</select>

  		
			<div class="caja_botones">
				<input type="submit" class="btnRegistrar" value="Guardar" />
				<input type="reset" class="btnBorrar" value="Borrar" />
			</div>
  		</form>
  	</div>
	<?php 				
		
		if (! $result){
		   echo "La consulta SQL contiene errores.".mysql_error();
		   exit();
		}else {
			?>
				<br>
			<?php
			echo "<table class='tablaArticulos'>
	    		
	    		<tr class='primerTr'>
	    			<th>Usuario </th>
	    			<th>Contraseña</th>
	    			<th>Cédula</th>
	    			<th>Correo</th>
	    			<th>Tipo de usuario</th>
	    			<th>Acción</th>";
	         echo "</tr>";
		    while ($row = mysql_fetch_row($result)){
		    	if ($row[5]=="ADMIN_PRINCIPAL") {
		    		$tipo_usuario='Administrador Principal';
		    	} else {
		    		$tipo_usuario='Administrador';
		    	}

	        	echo "<tr>
                		<td>".$row[1]."</td>
                		<td><input type='password' onfocus='this.blur()' readonly='readonly' value='".$row[2]."'></td>
              			<td>".$row[3]."</td>
              			<td>".$row[4]."</td>
              			<td>".$tipo_usuario."</td>
						"
						?>
						<td>
							<div class="cuadroRubro">
								<div class="acciones">
									<a  href="edicionusuario.php?id_usuario=<?php echo $row[0]?>" onclick="return confirm('¿Está seguro que desea Modificar este archivo?')"><img src="../IMAGEN/modificar.png" title="Modificar"></a>
									<?php if ($_SESSION['TierraAlta_TipoMostrar']=='ADMIN_PRINCIPAL') { ?>
									<a  href="eliminarusuario.php?id_usuario=<?php echo $row[0]?>" onclick="return confirm('¿Está seguro que desea Eliminar este archivo?')"><img src="../IMAGEN/eliminar_48x48.png" title="Eliminar"></a>
									<?php } ?>
								</div>
							</div>
						</td>
			<?php }
	   		echo "</tr><br></table>";
	 	}
	 ?>
</body>
</html>