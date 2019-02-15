<?php session_start();
	if($_SESSION['TierraAlta_TipoMostrar']==NULL){
		header("location: ../index.php");  
	}else if($_SESSION['TierraAlta_TipoMostrar']=='DEPOSITARIO'){
		header("location: ../DEPOSITARIO/index.php");  
	}else if($_SESSION['TierraAlta_TipoMostrar']=='ADMIN_INVENTARIO'){
		header("location: ../ADMINISTRADOR/index.php");
	}
	include("../Conexion.php");
	$conec=Conectarse();
	if(!$conec) { ?>
		<meta charset="utf-8">
		<script language="javascript"> alert("ERROR: Falla en la Conexión Con el Servidor");</script>
	<?php exit(); }

	$codigo_inmueble=$_POST['codigo_inmueble'];
	$rif_inquilino=$_POST['rif_inquilino'];
	$fecha_contrato=$_POST['fecha_contrato'];
	$tiempo_alquiler=$_POST['tiempo_alquiler'];
	$periodo_alquiler=$_POST['periodo_alquiler'];
	$monto_cuota=$_POST['monto_cuota'];
	$iva_precio=$_POST['iva_precio'];
	$forma_pago=$_POST['forma_pago'];
	$moneda_precio_inmueble=$_POST['moneda_precio_inmueble'];
	$meses_deposito=$_POST['meses_deposito'];
	$total_deposito=$meses_deposito*$iva_precio;
	$gastos_administrativos=$_POST['gastos_administrativos'];
	$moneda_gastos_administrativos=$_POST['moneda_gastos_administrativos'];
	$gastos_legales=$_POST['gastos_legales'];
	$moneda_gastos_legales=$_POST['moneda_gastos_legales'];
	$mes_muerto=$_POST['mes_muerto'];
	$estado_contrato=$_POST['estado_contrato'];
	if ($mes_muerto==NULL) {
		$mes_muerto=0;
	}

	date_default_timezone_set('America/Caracas');
	//$fecha=date("Y-m-d",time());
	$hora=date("H:i:s",time());
	$timestamp = strtotime($hora);
	$hora = date('H:i', $timestamp);

	//AGREGAR MES MUERTO A LA FECHA
	function addMonths($date,$months) {
	  $orig_day = $date->format("d");
	  $date->modify("+".$months." months");
	  while ($date->format("d")<$orig_day && $date->format("d")<5) {
	    $date->modify("-1 day");
	  }
	}

	$d = new DateTime($fecha_contrato);
	addmonths($d,$mes_muerto);
	$fecha_contrato_con_mes_muerto=$d->format("Y-m-j");	

	$sql_alquiler_renta=mysql_query("SELECT codigo_factura from alquiler_renta where codigo_inmueble='$codigo_inmueble' and estado_contrato='Vigente'",$conec);
	$dato_alquiler_renta=mysql_fetch_array($sql_alquiler_renta);
	$nfila_alquiler_renta=mysql_num_rows($sql_alquiler_renta);
	$codigo_factura_alquiler=$dato_alquiler_renta['codigo_factura'];
	if($nfila_alquiler_renta) { ?>
		<script language="javascript">alert("Este inmueble ya se encuentra asignado, por revisar el Contrato Nro: <?php echo $codigo_factura_alquiler; ?>");window.location="InmueblesDisponibles.php";</script>
	<?php } else {

		mysql_query("UPDATE alquiler_inmueble set estado_inmueble='Ocupado' where codigo_inmueble='$codigo_inmueble' and estado_inmueble='Disponible'",$conec);
		mysql_query("INSERT INTO alquiler_renta values ('id','$codigo_inmueble','$rif_inquilino','$fecha_contrato','$fecha_contrato_con_mes_muerto','$hora','$tiempo_alquiler','$periodo_alquiler','$meses_deposito','$total_deposito','$gastos_legales','$moneda_gastos_legales','$gastos_administrativos','$moneda_gastos_administrativos','$mes_muerto','$estado_contrato')",$conec);
		$cuota_renta=1;
		$cons=mysql_query("SELECT codigo_factura FROM alquiler_renta WHERE codigo_inmueble='$codigo_inmueble' and rif_inquilino='$rif_inquilino'",$conec);
		$dato=mysql_fetch_array($cons);
		$codfac=$dato['codigo_factura'];
	}
	
	$sqlerror=mysql_error($conec);
	if(!empty($sqlerror)) { ?>
		<script language="javascript">alert("No se pudo asignar el inmueble");window.location="InmueblesDisponibles.php";</script>
	<?php } else { ?>
		
		<!--<script type="text/javascript">alert("Inmueble Asignado");window.location="InmueblesDisponibles.php";</script>-->

		<!DOCTYPE html>
		<html>
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
			<link rel="shortcut icon" type="image/x-icon" href="../IMAGEN/logo_ico.png" />
			<script type="text/javascript" src="../js/jquery.min.js"></script>
			<title>Tierra Alta</title>
			<style type="text/css">
				.form_cheque_depositado{
					padding: 10px;
				}
				.form_cheque_depositado input[type="text"]{
					font-size: 14px;
					padding: 5px;
					width: 30%;
				}
				.form_cheque_depositado input[type="submit"]{
				    text-decoration: none;
				    color: white;
				    font-size: 14px;
				    box-sizing: border-box;
				    padding: 5px;
				    width: 20%;
				    margin-left: 1%;
				    text-align: center;
				    cursor: pointer;
				    font-weight: bold;
				    background: #4cb1ff;
					border: 2px solid #4cb1ff;
				}

				.DivInput{
					margin: 0;
					text-align: center;
					margin-top: 10px;
					display: inline-block;
				}
				.DivInput input{
					width: 40%;
					margin-left: -1%;
					vertical-align: top;
					box-sizing: border-box;
					font-size: 17px;
					padding: 10px 0px;
					display:inline-block;
					border: 1px solid rgba(0,0,0,0.3);
					background: transparent;
					box-shadow: 0px 0px 2px rgba(0,0,0,0.5);	
					color: rgba(0,0,0,1);
				}
				.DivInput p{
					background: #efefef;
					box-sizing: border-box;
					color: rgba(0,0,0,1);
					padding: 10px 20px;
					font-size: 18px;
					width: 200px;
					display: inline-block;
					margin: 0;
					border-top-left-radius: 5px;
					border-bottom-left-radius: 5px;
					text-align: left;
				}
				#datos_cheque{
					width:100%;
				}
				#datos_cheque input{
					width: 20%;
					margin-right: 2%;
					margin-left: -0.5%;
				}
				#datos_cheque p{
					width: 220px;
				}
				#datos_transferencia{
					width: 75%;
				}
				#datos_transferencia p{
					width: auto;
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
				.select_disabled{
				    -webkit-appearance: none;
				    color: black;
				}
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
				.historial,.div_pagar_cuota{
					color: rgba(0,0,0,0.5);
					text-decoration: none;
					font-size: 20px;
					padding: 20px;
					text-align: center;
					display: inline-block;
					vertical-align: top;
					-webkit-user-select: none;
				    -moz-user-select: none;
				    -khtml-user-select: none;
				    -ms-user-select:none;
				    text-decoration: underline;
				}
				.historial_seleccionado,.historial:hover,.div_pagar_cuota_seleccionado,.div_pagar_cuota:hover{
					color: #3e94ec;
					cursor: pointer;
				}
				.img_historial,.img_pagar{
					display: none;
					margin: 0;
					margin-top: -10px;
				}
				#CuadroHistorial,#CuadroPagarCuota{
					border-top: 2px solid #3e94ec;
					border-bottom: 2px solid #3e94ec;
					padding: 20px 0;
					margin-top: -20px;
				}
				.link_pagar_cuota{
					text-decoration: none;
					display: block;
					color: black;
				}
				.link_extender_contrato{
					text-decoration: none;
					background: #4cb1ff;
		    		border: 2px solid #4cb1ff;
		    		text-decoration: none;
					color: white;
					font-size: 17px;
					box-sizing: border-box;
					padding: 5px;
					width: 20%;
					margin: 10px auto;
					text-align: center;
					cursor: pointer;
					font-weight: bold;
					
					transition: 0.5s;
				}
				.link_extender_contrato:hover{
					transition: 0.5s;
					background: transparent;
					color: #4cb1ff;
				}
				.span_cuota_pendiente{
					font-weight: bold;
					color: #4cb1ff;
				}
				.span_cuota_pendiente:hover{
					text-decoration: underline;
				}
				.span_estado_cuota{
					color: white;
					border-radius: 5px;
					
					box-sizing: border-box;
					vertical-align: top;
					font-weight: bold;
					letter-spacing: 1px;
				}
				.vencido{
					color: #be4b49;
				}
				.solvente{
					color: #42b72a;
				}
				
				body{margin:0;padding: 0}
				.DespachoExitoso{
					text-align: center;
					width: 100%;
					font-size: 30px;
					color: rgba(0,0,0,0.5);
					padding:15px;
					box-sizing: border-box;
					border-bottom: 2px solid rgba(0,0,0,0.1);
				}
				.contenedor{
					padding: 20px;
					position: relative;
					width: 80%;
					left: 50%;
					margin-left: -40%;
					text-align: center;
					-webkit-box-shadow: 1px 1px 10px 2px rgba(0,0,0,0.3);
					   -moz-box-shadow: 1px 1px 10px 2px rgba(0,0,0,0.3);
					  		box-shadow: 1px 1px 10px 2px rgba(0,0,0,0.3);
				}
				.cabeceraPDF:first-child{
					text-align: left;
				}
				.imgPDF{
					vertical-align: top;
					width: 26%;
				}
				.spanfecha{
					display: inline-block;
					font-size: 20px;
					float: right;
					border: 1px solid #e3e3e3;
					padding: 5px 15px;
					text-align: center;
				}
				
				.subcontenedor{
					text-align: left;
					padding: 15px 5px;
				}
				.TituloOrden{			
					font-size: 30px;
					font-weight: bold;
					display: inline-block;
					width: 33%;
					text-align: center;
					margin: 0;

				}
				.subcontenedor .SpanNumeroOrden{
					width: 33%;
					text-align: left;
					display: inline-block;
					margin: 0;			
					font-size: 18px;
				}
				.subcontenedor .SpanNombreObra{
					width: 33%;
					text-align: right;
					display: inline-block;
					margin: 0;
					font-size: 18px;
				}
				.tabla_menu {
				  border-collapse: collapse;
				  width: 100%;
				}
				th {
				  border: 1px solid #C1C3D1;
				  border-bottom:4px solid #9ea7af;
				  text-align:center;
				}
				td {
				  padding: 3px 2px;
				  text-align:center;
				  border: 1px solid #C1C3D1;
				}
				.BotonImprimir, .BotonRegresar{
				    display: inline-block;
				    text-decoration: none;
				    color: white;
				    font-size: 17px;
				    box-sizing: border-box;
				    padding: 10px;
				    width: 30%;
				    margin-left: 1%;
				    margin-bottom: 15px;
				    text-align: center;
				    cursor: pointer;
				    font-weight: bold;
				}
				.BotonImprimir{
					background: #4cb1ff;
					border: 2px solid #4cb1ff;
					
					margin-bottom: 0;
				}
				.BotonRegresar{
					border: 2px solid rgba(255,0,0,0.4);
					background: transparent;
					color: rgba(255,0,0,0.4);
				}
				.BotonImprimir:hover, .BotonRegresar:hover, .form_cheque_depositado input[type="submit"]:hover{
				    -webkit-box-shadow: 1px 1px 10px 2px rgba(0,0,0,0.3);
				       -moz-box-shadow: 1px 1px 10px 2px rgba(0,0,0,0.3);
				  			box-shadow: 1px 1px 10px 2px rgba(0,0,0,0.3);
				}
				.td_responsables span{
					display: inline-block;
					display: block;
					vertical-align: top;
					padding: 5px 0px;
				}
				.segunda_tabla{
					width: 100%;
				}
				.segunda_tabla tr td{
					width: 50%;
				}
			</style>
		</head>
		<body>
			<?php 

				$timestamp = strtotime($fecha_contrato);
				$fecha= date('d/m/Y', $timestamp);

				$timestamp2 = strtotime($fecha_contrato_con_mes_muerto);
				$fecha_con_mes_muerto= date('d/m/Y', $timestamp2);


				$nuevafecha_calculo0 =  strtotime ($fecha_contrato_con_mes_muerto);
				$nuevafecha_calculo = date ( 'Y-m-d' , $nuevafecha_calculo0 );

				$d_final_contrato = new DateTime($nuevafecha_calculo);
				addmonths($d_final_contrato,$tiempo_alquiler);
				$nuevafecha=$d_final_contrato->format("d/m/Y");
				
			?>
			<br>
			<div class="contenedor">
				<div class="cabeceraPDF">
					<img src="../IMAGEN/logo_negro.jpg" class="imgPDF">
					<?php
						date_default_timezone_set('America/Caracas');
						$fecha_diario=date("Y-m-d",time());
						$hora_diario=date("H:i:s",time());
						$timestamp_diario = strtotime($hora_diario);
						$hora_diario = date('H:i', $timestamp_diario);

						$timestamp_diario = strtotime($fecha_diario);
						$fecha_diario= date('d/m/Y', $timestamp_diario);
						$horaAM_PM_diario =date('h:i:s a', strtotime($hora_diario));

					 	echo "<span class='spanfecha primero'>Fecha: ".$fecha_diario."<br>Hora: ".$horaAM_PM_diario."</span>";
					?>
				</div>
				<br><br>
				<div class="subcontenedor">
					<span class="SpanNumeroOrden">Nº de Contrato: <b><?php echo $codfac ?></b></span>
					<p class="TituloOrden">Contrato</p>
				</div>
				<br>
				<table class="tabla_menu">
					<tr>
						<th>Inicio del <br> Contrato</th>
						<th>Final del <br> Contrato</th>
						<th>Periodo de <br>alquiler</th>
						<th>Mes <br>Muerto</th>
						<th>Meses de <br>Depósito</th>
						<th>Gastos <br>Administrativos</th>
						<th>Gastos <br>Legales</th>						
					</tr>
					<?php 

							$sql_inmueble=mysql_query("SELECT * FROM alquiler_inmueble where codigo_inmueble='$codigo_inmueble'",$conec);
							$dato_inmueble=mysql_fetch_array($sql_inmueble); 

							if ($tiempo_alquiler>1) {
								$tiempo_alquiler=$tiempo_alquiler.' Meses';
							} else {
								$tiempo_alquiler=$tiempo_alquiler.' Mes';
							}
							if ($meses_deposito>1) {
								$meses_deposito_texto=' Meses ';
							} else {
								$meses_deposito_texto=' Mes ';
							}
							
						?>
						<tr>
							<td><?php echo $fecha; ?></td>
							<td><?php echo $nuevafecha; ?></td>
							<td><?php echo $tiempo_alquiler;?> </td>
							<td><?php echo $mes_muerto; ?></td>
							
							<td><?php echo $meses_deposito." ".$meses_deposito_texto."= ".number_format($total_deposito, 2, ",", ".")." ".$dato_inmueble['moneda_precio_inmueble']; ?></td>
							<td><?php echo number_format($gastos_administrativos, 2, ",", ".")." ".$moneda_gastos_administrativos; ?></td>
							<td><?php echo number_format($gastos_legales, 2, ",", ".")." ".$moneda_gastos_legales; ?></td>

				
				</table>
				
				<br><br>
				<table class="tabla_menu">
					<h1>Datos del Inmueble</h1>
					<tr>
						<th>Código</th>
						<th>Tipo de inmueble</th>
						<th>Dirección</th>
						<th>Descripción Detallada</th>
						<th>Precio</th>	
						<th>I.V.A (%)</th>
					</tr>
					<?php 
						do{
							
							if ($dato_inmueble['tipo_inmueble']=='Residencia') {
								$tipo_inmueble= $dato_inmueble['tipo_inmueble'].": ".$dato_inmueble['tipo_residencia_inmueble'];
							} else if ($dato_inmueble['tipo_inmueble']=='Independiente') {
								$tipo_inmueble='Local Independiente';
							} else {
								$tipo_inmueble=$dato_inmueble['tipo_inmueble'];
							}
							$codigo_cc=$dato_inmueble['codigo_cc'];
							$cons_nombre_cc=mysql_query("SELECT * FROM alquiler_cc WHERE codigo_cc='$codigo_cc' ",$conec);
							$dato_nombre_cc=mysql_fetch_array($cons_nombre_cc);
							$nfila_nombre_cc=mysql_num_rows($cons_nombre_cc);
							
							if ($dato_inmueble['tipo_inmueble']=='Local') {
								$nombre_cc=" en ".$dato_nombre_cc['nombre_cc'];
								$pisos_cc=" - Piso ".$dato_inmueble['pisos_cc'];
							} else {
								$nombre_cc="";
								$pisos_cc="";
							}
							
							echo "<tbody>
									<tr>
										<td>".$dato_inmueble['codigo_inmueble']."</td>
										<td class='Clase_TipoInmueble'>".$tipo_inmueble.$nombre_cc.$pisos_cc."</td>								
										
										<td>".$dato_inmueble['direccion_inmueble']."</td>
										<td>".$dato_inmueble['descripcion_inmueble']."</td>
										<td class='Clase_PrecioInmueble'>".number_format($dato_inmueble["precio_inmueble"], 2, ",", ".")." ".$dato_inmueble['moneda_precio_inmueble']."</td>
										<td>".$dato_inmueble['iva_inmueble']." %</td>
										
										";
										?>
										<?php
									echo "</tr>
							</tbody>";						
							} while($dato_inmueble=mysql_fetch_array($sql_inmueble));
					 ?>
				</table>
				<br><br>
				<table class="tabla_menu">
					<h1>Datos del Inquilino</h1>
					<tr>
						<th>Rif</th>
						<th>Razón Social</th>
						<th>Teléfono</th>
						<th>Dirección</th>
						<th>Correo</th>
					</tr>
					<?php 
						$sql_inquilino=mysql_query("SELECT * from alquiler_inquilino where rif_inquilino='$rif_inquilino'",$conec);
						$dato_inquilino=mysql_fetch_array($sql_inquilino);
						do{
							$Telefono1 = $dato_inquilino['telefono1_inquilino'];
							$area1 = substr($Telefono1, 0, 4);
							$numero1 = substr($Telefono1, 4, 16);
							$Telefono1 = $area1 . '-' . $numero1;
							if ($dato_inquilino['telefono2_inquilino']==0) {
								$Telefono2 = "";
							} else {
								$Telefono2 = $dato_inquilino['telefono2_inquilino'];
								$area2 = substr($Telefono2, 0, 4);
								$numero2 = substr($Telefono2, 4, 16); //el maximo permito para los telefonos es 20 numeros
								$Telefono2 = "<hr>".$area2 . '-' . $numero2;
							}
							$i=2;
							echo "<tbody>
									<tr>
										<td>".$dato_inquilino['rif_inquilino']."</td>
										<td>".$dato_inquilino['nombre_inquilino']."</td>
										<td>".$Telefono1.$Telefono2."</td>
										<td>".$dato_inquilino['direccion_inquilino']."</td>
										<td>".$dato_inquilino['correo_inquilino']."</td>
										";
										?>
										<?php
									echo "</tr>
							</tbody>";				
							} while($dato_inmueble=mysql_fetch_array($sql_inmueble));
					 ?>
				</table>
				<br><br>
				

				
					<a href="pdf_contrato.php?codigo_factura=<?php echo $codfac ?>&codigo_inmueble=<?php echo $codigo_inmueble ?>&rif_inquilino=<?php echo $rif_inquilino; ?>" class="BotonImprimir">Imprimir</a>
					<a href="InmueblesDisponibles.php" class="BotonRegresar">Ir a inmuebles disponibles</a>
				
				
				

			</div>

			
			<br>
		</body>
		</html>


	<?php } ?>