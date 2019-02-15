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
		<script language="javascript"> alert("ERROR: Falla en la conexión con el servidor");</script>
		<?php exit();
	}
	$codigo_inmueble=$_REQUEST["codigo_inmueble"];
	$atras=$_REQUEST["atras"];


	$sql=mysql_query("SELECT * from alquiler_renta WHERE codigo_inmueble='$codigo_inmueble' and estado_contrato='Vigente'",$conec);
	$dato=mysql_fetch_array($sql);
	$codfac=$dato['codigo_factura'];
	$rif_inquilino=$dato['rif_inquilino'];

	$sql_inquilino=mysql_query("SELECT * from alquiler_inquilino where rif_inquilino='$rif_inquilino'",$conec);
	$dato_inquilino=mysql_fetch_array($sql_inquilino);
	
	$sql_inmueble=mysql_query("SELECT * FROM alquiler_inmueble where codigo_inmueble='$codigo_inmueble'",$conec);
	$dato_inmueble=mysql_fetch_array($sql_inmueble); 

	$sql_detalle=mysql_query("SELECT * from alquiler_renta_detalle WHERE codigo_factura='$codfac' and estado_cuota='Pendiente'",$conec);
	$dato_detalle=mysql_fetch_array($sql_detalle);

	$sql_historial=mysql_query("SELECT * from alquiler_renta_detalle WHERE codigo_factura='$codfac' ORDER BY cuota_renta + 0 ASC",$conec);
	$dato_historial=mysql_fetch_array($sql_historial);
	$nfila_historial=mysql_num_rows($sql_historial);
	if (!$nfila_historial){
		$disabled_historial='onclick="return false;"';
		$titulo_historial="No hay historial de pago";
	}
	
	if ($dato_detalle['cuota_renta']==NULL) {
		$cuota_renta=0;
	} else {
		$cuota_renta=$dato_detalle['cuota_renta'];
	}
	$fecha_enviar=$dato_detalle['fecha_cuota_pagada'];
	$hora_enviar=$dato_detalle['hora_cuota_pagada'];
	
?>
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
		.DivInputDate{
			width: 35%;
		}
		.DivInput input{
			width: auto;
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
		
		.DivInput input[type="date"]{
			width: 45%;

		}

		.DivInput p{
			background: #efefef;
			box-sizing: border-box;
			color: rgba(0,0,0,1);
			padding: 10px 0px 10px 10px;
			font-size: 18px;
			width: 50%;
			display: inline-block;
			margin: 0;
			border-top-left-radius: 5px;
			border-bottom-left-radius: 5px;
			text-align: left;
		}
		.DivInput:first-child p{
			width: 40%;
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
	<script>
		$(document).ready(function(){
			<?php if ($nfila_historial) { ?>
				$('.historial').click(function () {
				      $('#CuadroHistorial').slideToggle('fast');
				      $('.historial').toggleClass('historial_seleccionado');
				      $('.img_historial').toggle('fast');

				      $('#CuadroPagarCuota').hide();
				      $('.img_pagar').hide();
				      $('.div_pagar_cuota').removeClass('div_pagar_cuota_seleccionado');
				});
			<?php } ?>
			$('.div_pagar_cuota').click(function () {
			      $('#CuadroPagarCuota').slideToggle('fast');
			      $('.div_pagar_cuota').toggleClass('div_pagar_cuota_seleccionado');
			      $('.img_pagar').toggle('fast');

			      $('#CuadroHistorial').hide();
			      $('.img_historial').hide();
			      $('.historial').removeClass('historial_seleccionado');
			});
			
		});
	</script>
</head>
<body>
	<?php 
		$fecha0 = $dato['fecha_contrato'];
		$timestamp = strtotime($fecha0);
		$fecha= date('d/m/Y', $timestamp);

		$fecha_con_mes_muerto0 = $dato['fecha_contrato_con_mes_muerto'];
		$timestamp2 = strtotime($fecha_con_mes_muerto0);
		$fecha_con_mes_muerto= date('d/m/Y', $timestamp2);

		$hora = $dato['hora_contrato']; 
		$horaAM_PM =date('h:i:sa', strtotime($hora));

		//FUNCION PARA SUMAR MES A LA FECHA
		function addMonths($date,$months) {
		  $orig_day = $date->format("d");
		  $date->modify("+".$months." months");
		  while ($date->format("d")<$orig_day && $date->format("d")<5) {
		    $date->modify("-1 day");
		  }
		}
	?>
	<br>
	<div class="contenedor">
		<div class="cabeceraPDF">
			<img src="../IMAGEN/logo_negro.jpg" class="imgPDF">
			<?php
				
				$nuevafecha_calculo0 =  strtotime ($fecha_con_mes_muerto0);
				$nuevafecha_calculo = date ( 'Y-m-d' , $nuevafecha_calculo0 );

				$d_final_contrato = new DateTime($nuevafecha_calculo);
				addmonths($d_final_contrato,$dato['tiempo_alquiler']);
				$nuevafecha=$d_final_contrato->format("d/m/Y");

			 	echo "<span class='spanfecha primero'>Final del contrato<br>".$nuevafecha."</span>";
			 	echo "<span class='spanfecha primero'>Inicio del contrato<br>".$fecha."</span>";

			?>
		</div>
		<br><br>
		<div class="subcontenedor">
			<span class="SpanNumeroOrden">Nº de Contrato: <b><?php echo $codfac ?></b></span>
			<p class="TituloOrden">Control de alquiler</p>
		</div>
		<br>
		<table class="tabla_menu">
			<tr>
				<th>Periodo de <br>alquiler</th>
				<th>Mes <br>Muerto</th>
				<th>Meses de <br>Depósito</th>
				<th>Gastos <br>Administrativos</th>
				<th>Gastos <br>Legales</th>
				<th>Cuotas <br>Pagadas</th>
				<th>Cuotas <br>Pendientes</th>
				<th>Próxima <br>Cuota</th>
				<th>Estado de Pago</th>
				
			</tr>
			<?php do{ 

					if ($dato['tiempo_alquiler']>1) {
						$tiempo_alquiler=$dato['tiempo_alquiler'].' Meses';
					} else {
						$tiempo_alquiler=$dato['tiempo_alquiler'].' Mes';
					}
					if ($dato['meses_deposito']>1) {
						$meses_deposito_texto=' Meses ';
					} else {
						$meses_deposito_texto=' Mes ';
					}
					
				?>
				<tr>
					<td><?php echo $tiempo_alquiler;?> </td>
					<td><?php echo $dato['mes_muerto']; ?></td>
					<?php if ($cuota_renta==1) {
						$cuota='cuota';
					} else {
						$cuota="cuotas";
					}
					?>
					<td><?php echo $dato['meses_deposito']." ".$meses_deposito_texto."= ".number_format($dato['total_deposito'], 2, ",", ".")." ".$dato_inmueble['moneda_precio_inmueble']; ?></td>
					<td><?php echo number_format($dato['gastos_administrativos'], 2, ",", ".")." ".$dato['moneda_gastos_administrativos']; ?></td>
					<td><?php echo number_format($dato['gastos_legales'], 2, ",", ".")." ".$dato['moneda_gastos_legales']; ?></td>
					
					<td><?php echo $cuota_renta." ".$cuota." de ".$dato['tiempo_alquiler'] ?></td>
					<td><?php echo $dato['tiempo_alquiler']-$cuota_renta; ?></td>
					<td>
						<?php 
							
							
							$nuevafecha_calculo1 =  strtotime ($fecha_con_mes_muerto0);
							$nuevafecha_calculo10 = date ( 'Y-m-d' , $nuevafecha_calculo1 );

							$d = new DateTime($nuevafecha_calculo10);
							addmonths($d,$cuota_renta);
							$nuevafecha_d= $d->format("Y-m-d");
							$nuevafecha_d1=$d->format("d/m/Y");

							

							if (($dato['tiempo_alquiler']-$cuota_renta)==0) {
								echo "Cuotas pagadas";
							} else {
								echo $nuevafecha_d1;
							}
						?>
					</td>
					<td class="td_estado_cuota">
						<?php 
							date_default_timezone_set('America/Caracas');
							$fecha_diario=date("Y-m-d",time());
							$timestamp_diario = strtotime($fecha_diario);
							//$fecha_diario= date('d/m/Y', $timestamp_diario);
						
						 ?>
						
						<?php
							if (($dato['tiempo_alquiler']-$cuota_renta)==0){
								$estado_pago='Solvente';
								echo "<span class='span_estado_cuota solvente'>".$estado_pago."</span>";
							} else if ($fecha_diario>=$nuevafecha_d) {
								$estado_pago='Vencida';
								echo "<span class='span_estado_cuota vencido'>".$estado_pago."</span>";
							} else {
								$estado_pago='Solvente';
								echo "<span class='span_estado_cuota solvente'>".$estado_pago."</span>";
							}
						?>

					</td>
				</tr>
					<?php 
			  			if ($dato['tiempo_alquiler']>$dato_detalle['cuota_renta']){
							$titulo1='Pagar';
							$display='none';							
						} else {
							$disabled='onclick="return false;"';
							$titulo="Contrato Terminado";
							$display='block';
							$display1='hidden';
						}
					?>
					
					
					
						
					
				

			<?php }while($dato=mysql_fetch_array($sql));?>
		</table>
		<div class="div_pagar_cuota">Pagar siguiente cuota <br><img class="img_pagar" src="../IMAGEN/ic_keyboard_arrow_down_blue_36dp.png"></div>
		<div class="historial">Historial de pago <br><img class="img_historial" src="../IMAGEN/ic_keyboard_arrow_down_blue_36dp.png"></div>

		<div id="CuadroPagarCuota" style="display: none" >
			<form method="post" action="pagar_cuota.php" <?php echo $display1; ?>>
				<div class="DivInput" title="Precio mensual del inmueble + IVA">
					<p>Pagar cuota <?php echo $cuota_renta+1; ?></p>
					<div class="DivPrecio">
						<?php
							$iva_precio=(1+$dato_inmueble['iva_inmueble']/100)*$dato_inmueble['precio_inmueble'];
						?>

						<input type="text" style="padding-left: 10px" name="" readonly="readonly" value="<?php echo number_format($iva_precio, 2, ",", ".") ?>">
						<input type="hidden" name="monto_cuota"  required  value="<?php echo $iva_precio; ?>" />

						<input type="hidden" name="moneda_precio_inmueble" value="<?php echo $dato_inmueble['moneda_precio_inmueble'] ?>">
						<select disabled class="select_disabled">
							
							<option value="<?php echo $dato_inmueble['moneda_precio_inmueble'] ?>"><?php echo $dato_inmueble['moneda_precio_inmueble'] ?></option>
							
						</select>
					</div>
				</div>
				<div class="DivInput DivInputDate">
					<p>Fecha del pago</p>
					<input type="date" name="fecha_pago" required class="fecha_pago">
				</div>
				<div class="DivInput">
					<p>Forma de pago</p>

					<script type="text/javascript">
						//MOSTRAR CUADROS DE TRANSFERENCIA
						$(function() {
						  $("#select_tipo").change(function() {
						    if ($("#Transferencia").is(":selected")) {
						    	$("#datos_transferencia").show();
						    } else {
						    	$("#datos_transferencia").hide();
						    }
						  }).trigger('change');
						});
						//MOSTRAR CUADROS DE CHEQUE
						$(function() {
						  $("#select_tipo").change(function() {
						    if ($("#Cheque").is(":selected")) {
						    	$("#datos_cheque").show();
						    } else {
						    	$("#datos_cheque").hide();
						    }
						  }).trigger('change');
						});
					</script>

					<select class="select" name="forma_pago" id="select_tipo" required>
	  					<option value="">Seleccione</option>
				  		<option value="Transferencia" id="Transferencia">Transferencia</option>
				  		<option value="Cheque" id="Cheque">Cheque</option>
				  		<option value="Efectivo">Efectivo</option>
			  		</select>
				</div>
				<br><br>
				<div class="DivInput" id="datos_transferencia">
                    <p>Datos de la Transferencia</p>                  
                    <input type="text" style="padding-left: 10px" maxlength="100" name="datos_transferencia" placeholder="Banco, código de transferencia">
	  			</div>
	  			<div class="DivInput" id="datos_cheque">
                    <p>Banco de Procedencia</p>
                    <input type="text" style="padding-left: 10px" maxlength="100" name="procedencia_cheque" placeholder="Nombre del Banco">
                    <p>Número de Cheque</p>                  
                    <input type="text" style="padding-left: 10px" maxlength="100" name="datos_cheque" placeholder="Número de cheque">
                </div>
				<input type="hidden" name="codigo_factura" value="<?php echo $codfac; ?>">
				<input type="hidden" name="codigo_inmueble" value="<?php echo $dato_inmueble['codigo_inmueble']; ?>">
				<input type="hidden" name="cuota_renta" value="<?php echo $dato_detalle['cuota_renta']; ?>">
				<input type="hidden" name="fecha_cuota_pagada" value="<?php echo $fecha_enviar; ?>">
				<input type="hidden" name="hora_cuota_pagada" value="<?php echo $hora_enviar; ?>">
				<input type="hidden" name="tiempo_alquiler" value="<?php echo $dato['tiempo_alquiler']; ?>">
				<br><br>
				<?php if ($atras=='RentasPorCobrar') { ?>
					<input type="hidden" name="atras" value="RentasPorCobrar">
				<?php } else if ($atras=='ContratosPorVencer') { ?>
					<input type="hidden" name="atras" value="ContratosPorVencer">
				<?php } ?>

				<input type="submit" name="" class="BotonImprimir" value="<?php echo $titulo1; ?>" <?php echo $disabled; ?> >
			</form>
			<?php
				if ($fecha_diario<$nuevafecha_d) {
					$disabled_contrato='onclick="return false;"';
					$titulo_renovar_contrato="Para renovar el contrato debe esperar a que este venza";
					$titulo_terminar_contrato="Para terminar el contrato debe esperar a que este venza";
				}
			?>
			<h2 style="display:<?php echo $display; ?>">Contrato vencido</h2>
			<a href="RenovarContrato.php?codigo_inmueble=<?php echo $dato_inmueble['codigo_inmueble'] ?>&rif_inquilino=<?php echo $dato_inquilino['rif_inquilino'] ?>&nombre_inquilino=<?php echo $dato_inquilino['nombre_inquilino'] ?>&atras=MostrarInmueblesOcupados&codigo_factura=<?php echo $codfac; ?>" class="link_extender_contrato" style="display:<?php echo $display; ?>" <?php echo $disabled_contrato;?> title="<?php echo $titulo_renovar_contrato; ?>" >Renovar</a>
			<a href="TerminarContrato.php?codigo_inmueble=<?php echo $dato_inmueble['codigo_inmueble'] ?>&codigo_factura=<?php echo $codfac ?>" class="link_extender_contrato" style="display:<?php echo $display; ?>" <?php echo $disabled_contrato;?> title="<?php echo $titulo_terminar_contrato; ?>" >Terminar Contrato</a>
		</div>
		<div id="CuadroHistorial" style="display: none">
			<table class="tabla_menu">
				<tr>
					<th>Nº de cuota</th>
					<th>Fecha de pago</th>
					<th>Monto</th>
					<th>Forma de pago</th>					
				</tr>
				<?php 
					
					do{
						
						$fecha_historial = $dato_historial['fecha_cuota_pagada'];
						$timestamp_historial = strtotime($fecha_historial);
						$fecha_historial= date('d/m/Y', $timestamp_historial);

						if ($dato_historial['forma_pago']=='Transferencia') {
							$forma_pago_historial="Transferencia: ";
						}else if($dato_historial['forma_pago']=='Cheque'){
							$forma_pago_historial="Cheque procedente de: ".$dato_historial['procedencia_cheque']."<br>Número de cheque: ";
						}else{
							$forma_pago_historial="Efectivo ";
						}

						echo "<tbody>
								<tr>
									<td>".$dato_historial['cuota_renta']."</td>
									<td>".$fecha_historial."</td>								
									<td class='Clase_PrecioInmueble'>".number_format($dato_historial["monto_cuota"], 2, ",", ".")." ".$dato_inmueble['moneda_precio_inmueble']."</td>
									<td>".$forma_pago_historial.$dato_historial['datos_transferencia'].$dato_historial['datos_cheque']."
									";
									if($dato_historial['forma_pago']=='Cheque'){ 
										if ($dato_historial['cheque_banco_depositado']==NULL) { ?>
											<form method="post" action="cheque_depositado.php" class="form_cheque_depositado">
												<input type="text" name="cheque_banco_depositado" placeholder="¿En que banco se deposito?" required>
												<input type="text" name="cheque_referencia_depositado" placeholder="Referencia del depósito" required>
												<input type="hidden" name="codigo_inmueble" value="<?php echo $codigo_inmueble; ?>">
												<input type="hidden" name="cuota_renta" value='<?php echo $dato_historial["cuota_renta"]; ?>'>
												<input type="hidden" name="codigo_factura" value='<?php echo $codfac; ?>'>
												<?php if ($atras=='RentasPorCobrar') { ?>
													<input type="hidden" name="atras" value="RentasPorCobrar">
												<?php } else if ($atras=='ContratosPorVencer') { ?>
													<input type="hidden" name="atras" value="ContratosPorVencer">
												<?php } ?>
												<input type="submit" value="Guardar">
											</form>	
										<?php } else { 
											echo "<br>Depositado en: ".$dato_historial['cheque_banco_depositado'].".<br>Número de referencia: ".$dato_historial['cheque_referencia_depositado'];
										}		
									} 
								echo "</td></tr>
						</tbody>";						
						} while($dato_historial=mysql_fetch_array($sql_historial));
				 ?>
				
			</table>
			<br><br>
			<a href="pdf_historial_pago.php?codigo_inmueble=<?php echo $codigo_inmueble?>&nombre_inquilino=<?php echo $dato_inquilino['nombre_inquilino'] ?>&fecha_inicio=<?php echo $fecha; ?>&fecha_final=<?php echo $nuevafecha; ?>&cuota_renta=<?php echo $cuota_renta ?>&cuota=<?php echo $cuota ?>&tiempo_alquiler=<?php echo $dato['tiempo_alquiler'] ?> " class="BotonImprimir boton_historial">Imprimir historial</a>
		</div>

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
								<td class='Clase_PrecioInmueble'>".number_format($dato_inmueble["precio_inmueble"], 2, ",", ".").$dato_inmueble['moneda_precio_inmueble']."</td>
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
		
			<a href="pdf_contrato.php?codigo_factura=<?php echo $codfac ?>&codigo_inmueble=<?php echo $codigo_inmueble ?>&rif_inquilino=<?php echo $rif_inquilino; ?>" class="BotonImprimir">Imprimir Contrato</a>
		<?php if ($atras=='RentasPorCobrar') { ?>
			<a href="RentasPorCobrar.php" class="BotonRegresar">Atrás</a>
		<?php } else if ($atras=='ContratosPorVencer') { ?>
			<a href="ContratosPorVencer.php" class="BotonRegresar">Atrás</a>
		<?php } else { ?>
			<a href="InmueblesOcupados.php?tiempo=<?php echo $campo ?>&input_reporte=despacho" class="BotonRegresar">Atrás</a>
		<?php } ?>
		

	</div>

	
	<br>
</body>
</html>