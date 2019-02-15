<?php ob_start();
	session_start();
	if($_SESSION['TierraAlta_TipoMostrar']==NULL){
		header("location: ../index.php");  
	}else if($_SESSION['TierraAlta_TipoMostrar']=='DEPOSITARIO'){
		header("location: ../DEPOSITARIO/index.php");  
	}else if($_SESSION['TierraAlta_TipoMostrar']=='ADMIN_INVENTARIO'){
		header("location: ../ADMINISTRADOR/index.php");
	}
	include("../conexion.php");
	$conec=Conectarse();

	$codigo_inmueble=$_REQUEST["codigo_inmueble"];
	$rif_inquilino=$_REQUEST["rif_inquilino"];
	$codfac=$_REQUEST["codigo_factura"];


	$cons=mysql_query("SELECT * FROM alquiler_renta WHERE codigo_factura='$codfac'",$conec);
	$dato=mysql_fetch_array($cons);

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<style type="text/css">
		.subcontenedor{
			text-align: left;
			padding: 15px 5px;
			width: 78%;
		  	margin-left: 10%;
		}
		.TituloContrato{			
			font-size: 25px;
			font-weight: bold;
			display: inline-block;
			width: 54%;
			text-align: center;
			margin: 0;
		}
		.centro{
			width: 100%;
		}
		.subcontenedor .SpanNumeroContrato{
			width: 20%;
			text-align: left;
			display: inline-block;
			margin: 0;			
			font-size: 15px;
		}
		.th_inquilino{
			padding: 0px 20px;
		}
		.tabla_menu {
		  border-collapse: collapse;
		  width: 90%;
		  margin-top: -7px;
		  margin-left: 10%;
		}
		th {
		  border: 1px solid #C1C3D1;
		  border-bottom:4px solid #9ea7af;
		  text-align:center;
		  vertical-align: middle;
		}
		
		td {
		  padding: 3px 2px;
		  text-align:center;
		  vertical-align: middle;
		  border: 1px solid #C1C3D1;
		}
		
		.Th_tlf{
			padding: 0px 20px;
		}
		.th_direccion{
			padding: 0px 10px;
		}
		.td_correo{
			word-break: break-all;
			width: 50px;
		}
		.spanfecha{
			
			display: inline-block;
			font-size: 20px;
			margin-left: 15%;
			width: 30%;
		}
		.imgPDF{
			margin-left: 10%;
			width: 26%;
		}
		.cuadroPaginas{
			height: 50px;
			display: block;
		}
		.div_datos_contrato{
			border: 1px solid #C1C3D1;
			text-align: center;
			width: 80%;
		  	margin-left: 10%;
		}
		.div_datos_contrato span{
			width: 25%;
			display: inline-block;
		}
		hr{
			padding: 0;
			margin: 3px;
			opacity: 0.3;
			height: 1px;
		}
		.td_forma_pago{
			text-align: left;
			padding-left: 10px;
		}
	</style>
</head>
<body>
	<br><br>
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

		 	//SUMAR TIEMPO DE ALQUILER A LA FECHA DE CONTRATO

			function addMonths($date,$months) {
			  $orig_day = $date->format("d");
			  $date->modify("+".$months." months");
			  while ($date->format("d")<$orig_day && $date->format("d")<5) {
			    $date->modify("-1 day");
			  }
			}
			$fecha_contrato=$dato['fecha_contrato'];
		 	$timestamp2 = strtotime($fecha_contrato);
			$fecha_contrato= date('d/m/Y', $timestamp2);

			$fecha_contrato_con_mes_muerto=$dato['fecha_contrato_con_mes_muerto'];
			$nuevafecha_calculo0 =  strtotime ($fecha_contrato_con_mes_muerto);
			$nuevafecha_calculo = date ( 'Y-m-d' , $nuevafecha_calculo0 );

			$d_final_contrato = new DateTime($nuevafecha_calculo);
			addmonths($d_final_contrato,$dato['tiempo_alquiler']);
			$nuevafecha=$d_final_contrato->format("d/m/Y");
		?>
	</div>
	<div class="subcontenedor">
		
		<p class="TituloContrato centro">Contrato</p>		
	</div>
	<?php
		$sql_inmueble=mysql_query("SELECT * FROM alquiler_inmueble where codigo_inmueble='$codigo_inmueble'",$conec);
		$dato_inmueble=mysql_fetch_array($sql_inmueble); 

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
		if ($dato_inmueble['moneda_precio_inmueble']=='U') {
			$moneda = ' US$';
		} else {
			$moneda = ' BsF';
		}
	?>
	<table class="tabla_menu">
		<tr>
			<th>Nº Contrato </th>
			<th>Inicio del Contrato </th>
			<th>Final del Contrato </th>
			<th>Periodo de alquiler </th>
		</tr>
		<tr>
			<td><?php echo $codfac ?></td>
			<td><?php echo $fecha_contrato; ?></td>
			<td><?php echo $nuevafecha; ?></td>
			<td><?php echo $tiempo_alquiler ?></td>
		</tr>
	</table>
	<br><br><br>
	<table class="tabla_menu">
		<tr>
			<th>Mes Muerto </th>
			<th>Meses de Depósito </th>
			<th>Gastos Administrativos </th>
			<th>Gastos Legales </th>
		</tr>
		<tr>
			<td><?php echo $dato['mes_muerto'] ?></td>
			<td><?php echo $dato['meses_deposito']." ".$meses_deposito_texto."= ".number_format($dato['total_deposito'], 2, ",", ".")." ".$dato_inmueble['moneda_precio_inmueble']; ?></td>
			<td><?php echo number_format($dato['gastos_administrativos'], 2, ",", ".")." ".$dato['moneda_gastos_administrativos']; ?></td>
			<td><?php echo number_format($dato['gastos_legales'], 2, ",", ".")." ".$dato['moneda_gastos_administrativos']; ?></</td>
		</tr>
	</table>
	<br><br>
	<p class="TituloContrato centro">Datos del Inmueble</p><br><br>
	<table class="tabla_menu">
		
		<tr>
			<th>Código</th>
			<th>Tipo de inmueble</th>
			<th>Dirección</th>
			<th>Descripción<br>Detallada</th>
			<th>Precio</th>	
			<th>I.V.A (%)</th>
		</tr>
		<?php 
				
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
		 ?>
	</table>
	<br><br>
	<p class="TituloContrato centro">Datos del Inquilino</p><br><br>
	<table class="tabla_menu">
		
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
		 ?>
	</table>
	

		<?php
			require_once("../dompdf/dompdf_config.inc.php");
			$dompdf = new DOMPDF();
			$dompdf->load_html(ob_get_clean());
			$dompdf->render();
			//contador de paginas
			$canvas = $dompdf->get_canvas(); 
			$font = Font_Metrics::get_font("helvetica", "bold"); 
			$canvas->page_text(290, 730, "Pág. {PAGE_NUM}/{PAGE_COUNT}", $font, 10, array(0,0,0)); //header
			header("Content-type: application/pdf");     

			//nombre de archivo
			$pdf = $dompdf->output();
			
			$fecha1 = date('d_m_Y');
			$hora1= date (" h_i a");
			$filename = "Informes/Contratos/Contrato_Nro".$codfac."_".$fecha1."__".$hora1.".pdf";
			file_put_contents($filename, $pdf);
			$dompdf->stream($filename);  
		?>

</body>
</html>