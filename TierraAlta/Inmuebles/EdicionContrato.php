<?php session_start(); 
	if($_SESSION['TierraAlta_TipoMostrar']==NULL){
		header("location: ../index.php");  
	}else if($_SESSION['TierraAlta_TipoMostrar']=='DEPOSITARIO'){
		header("location: ../DEPOSITARIO/index.php");  
	}else if($_SESSION['TierraAlta_TipoMostrar']=='ADMIN_INVENTARIO'){
		header("location: ../ADMINISTRADOR/index.php");
	}
	include("Cabecera.php");
	$codigo_inmueble=$_REQUEST["codigo_inmueble"];
	$codfac=$_REQUEST["codigo_factura"];
	$atras=$_REQUEST["atras"];

	$sql=mysql_query("SELECT * from alquiler_renta WHERE codigo_inmueble='$codigo_inmueble' and codigo_factura='$codfac'",$conec);
	$dato=mysql_fetch_array($sql);
	$rif_inquilino=$dato['rif_inquilino'];

	$sql_inquilino=mysql_query("SELECT * from alquiler_inquilino where rif_inquilino='$rif_inquilino'",$conec);
	$dato_inquilino=mysql_fetch_array($sql_inquilino);
	$nombre_inquilino=$dato_inquilino['nombre_inquilino'];
	
	$sql_inmueble=mysql_query("SELECT * FROM alquiler_inmueble where codigo_inmueble='$codigo_inmueble'",$conec);
	$dato_inmueble=mysql_fetch_array($sql_inmueble); 

	$sql_detalle=mysql_query("SELECT * from alquiler_renta_detalle WHERE codigo_factura='$codfac' and estado_cuota='Pendiente'",$conec);
	$dato_detalle=mysql_fetch_array($sql_detalle);
	$fecha_enviar=$dato_detalle['fecha_cuota_pagada'];
	$hora_enviar=$dato_detalle['hora_cuota_pagada'];

	$sql_historial=mysql_query("SELECT * from alquiler_renta_detalle WHERE codigo_factura='$codfac' ORDER BY cuota_renta + 0 ASC",$conec);
	$dato_historial=mysql_fetch_array($sql_historial);
	$nfila_historial=mysql_num_rows($sql_historial);

	
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
		.DivPrecio{
			border: 1px solid red;
			width: 40%;
		    
		    margin-left: -1%;
		    box-sizing: border-box;
		    font-size: 15px;
		    display: inline-block;
		    border: 1px solid rgba(0,0,0,0.3);
		    background: transparent;
		    box-shadow: 0px 0px 2px rgba(0,0,0,0.5);
		}
		.DivPrecio input{
			width: 70%;
			border: none;
			margin: 0;
			float: left;
		}
		.DivPrecio select{
			position: right;
			width: 30%;
			height: 38px;
			padding-left: 10px;
			border-right: none;
			border-top: none;
			border-bottom: none;

		}
		.periodo input{
			width: 79%;
		}
		.periodo select{
			position: right;
			width: 21%;
			height: 38px;
			text-align:center;
			padding-left: 6px;
		}
		.select_disabled{
		    -webkit-appearance: none;
		    color: black;
		}
		.gastos_administrativos{
			font-size: 15px !important;
		}
	</style>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".index").addClass("seleccionado");	
		});
	</script>
	<?php
		if ($dato['telefono2_cc']==0) {
			$Telefono2 = "";
		} else {
			$Telefono2 = $dato['telefono2_cc'];
		}
	?>
	<div class="contenedor_archivo">
	  	<form method="post" class="FormModificar" action="GuardaContrato_edicion.php">
	  		<div class="TituloModalRegistro">Modificar Contrato Nº <?php echo $codfac ?></div>
			<div class="DivInput">
				<p>Código del Inmueble</p>
				<input type="text" name="codigo_inmueble" maxlength="15" required placeholder="Código del inmueble" value="<?php echo $dato_inmueble['codigo_inmueble'] ?>" readonly/>
			</div>
			<div class="DivInput">
				<p>Inquilino</p>
				<?php 
					$sql = "SELECT * FROM alquiler_inquilino ORDER BY nombre_inquilino ASC";
					$result = mysql_query ($sql);
					if (!$result){
					   echo "La consulta SQL contiene errores.".mysql_error();
					   exit();
					}else {
						?>
							<select class="select" name="rif_inquilino" required>
			  					<option value="<?php echo $rif_inquilino; ?>"><?php echo $nombre_inquilino ?></option>
									<?php
										while ($row = mysql_fetch_row($result)){
											if ($row[1]==$rif_inquilino) {
												//no muestra nada
											} else {
							        			echo "
							  						<option value='".$row[1]."'>
							  							".$row[2]."
							  						</option>
							  				 	";
						  				 	}
						  				}
					  		echo "</select>";		
			  		} ?>	
					
			</div>
			<div class="DivInput">
				<p>Fecha de alquiler</p>
				<input type="date" name="fecha_contrato" required value='<?php echo $dato["fecha_contrato"]; ?>' />
			</div>
			<div class="DivInput">
				<p>Periodo de alquiler</p>
				<div class="DivPrecio periodo">
					<input type="number" name="tiempo_alquiler" required value="<?php echo $dato['tiempo_alquiler'] ?>" />
					<select required name="periodo_alquiler" class="select_disabled" disabled>
						<!--<option value="">Seleccione</option>
						<option value="Diario">		Diario		</option>
						<option value="Semanal">	Semanal		</option>
						<option value="Quincenal">	Quincenal	</option>-->
						<option value="Mensual">	Meses		</option>
						<!--<option value="Bimestral">	Bimestral	</option>
						<option value="Trimestral">	Trimestral	</option>
						<option value="Semestral">	Semestral	</option>
						<option value="Anual">		Anual		</option>-->
					</select>
				</div>
			</div>
			<div class="DivInput">
				<p>Meses de Depósito</p>
				<input type="text" name="meses_deposito" required value='<?php echo $dato["meses_deposito"]; ?>' />
			</div>
			
			<div class="DivInput">
				<p class="gastos_administrativos">Gastos Administrativos</p>
				<div class="DivPrecio">
					<input type="number" name="gastos_administrativos" required value="<?php echo $dato['gastos_administrativos']; ?>"/>
					

				<?php 
					$sql_moneda1 = "SELECT * FROM alquiler_moneda ORDER BY nombre_moneda ASC";
					$result_moneda1 = mysql_query ($sql_moneda1);
					if (!$result_moneda1){
					   echo "La consulta SQL contiene errores.".mysql_error();
					   exit();
					}else {
						?>
							<select name="moneda_gastos_administrativos" required class="ancho">
			  					<option value="<?php echo $dato['moneda_gastos_administrativos']; ?>"><?php echo $dato['moneda_gastos_administrativos'] ?></option>
									<?php
										while ($row_moneda1 = mysql_fetch_row($result_moneda1)){
											if ($row_moneda1[1]==$dato['moneda_gastos_administrativos']) {
												//no muestra nada
											} else {
							        			echo "
							  						<option value='".$row_moneda1[1]."'>
							  							".$row_moneda1[1]."
							  						</option>
							  				 	";
						  				 	}
						  				}
					  		echo "</select>";		
			  		} ?>
					
			
				</div>
			</div>
			<div class="DivInput">
				<p>Gastos Legales</p>
				<div class="DivPrecio">
					<input type="number" name="gastos_legales" required value="<?php echo $dato['gastos_legales']; ?>"/>
				
					<?php 
						$sql_moneda = "SELECT * FROM alquiler_moneda ORDER BY nombre_moneda ASC";
						$result_moneda = mysql_query ($sql_moneda);
						if (!$result_moneda){
						   echo "La consulta SQL contiene errores.".mysql_error();
						   exit();
						}else {
							?>
								<select name="moneda_gastos_legales" required class="ancho">
				  					<option value="<?php echo $dato['moneda_gastos_legales']; ?>"><?php echo $dato['moneda_gastos_legales'] ?></option>
										<?php
											while ($row_moneda = mysql_fetch_row($result_moneda)){
												if ($row_moneda[1]==$dato['moneda_gastos_legales']) {
													//no muestra nada
												} else {
								        			echo "
								  						<option value='".$row_moneda[1]."'>
								  							".$row_moneda[1]."
								  						</option>
								  				 	";
							  				 	}
							  				}
						  		echo "</select>";		
				  		} ?>
				</div>
			</div>
			<div class="DivInput">
				<p class="gastos_administrativos">Mes Muerto (Opcional)</p>
				<input type="number" name="mes_muerto" value='<?php echo $dato['mes_muerto'] ?>' />
			</div>
			<input type="hidden" name="atras" value="InmueblesOcupados">
			<input type="hidden" name="codigo_factura" value="<?php echo $codfac; ?>">
			<?php
				$iva_precio=(1+$dato_inmueble['iva_inmueble']/100)*$dato_inmueble['precio_inmueble'];
			?>
			<input type="hidden" name="iva_precio" value="<?php echo $iva_precio ?>">
			<div class="caja_botones">
				<br>
				<input type="submit" class="btnRegistrar" value="Actualizar" />
				<?php if ($atras=='InmueblesOcupados') {
					echo '<a href="InmueblesOcupados.php" class="btnBorrar">Atrás</a>';
				} ?>
				
			</div>
		</form>
		<div class="EspacioFinal"></div>
	</div>
</body>
</html>
