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
	$nombre_inquilino=$_REQUEST["nombre_inquilino"];
	$fecha_inicio=$_REQUEST["fecha_inicio"];
	$fecha_final=$_REQUEST["fecha_final"];
	$cuota_renta=$_REQUEST["cuota_renta"];
	$cuota=$_REQUEST["cuota"];
	$tiempo_alquiler=$_REQUEST["tiempo_alquiler"];
	$mostrar_contrato=$_REQUEST['mostrar_contrato'];
	if ($mostrar_contrato=='Si') {
		$codfac_contratos=$_REQUEST['codigo_factura'];
		$sql=mysql_query("SELECT * from alquiler_renta WHERE codigo_inmueble='$codigo_inmueble' and codigo_factura='$codfac_contratos'",$conec);
	}else{
		$sql=mysql_query("SELECT * from alquiler_renta WHERE codigo_inmueble='$codigo_inmueble' and estado_contrato='Vigente'",$conec);
	}
	
	$dato=mysql_fetch_array($sql);
	$codfac=$dato['codigo_factura'];
	$rif_inquilino=$dato['rif_inquilino'];

	$sql = "SELECT * from alquiler_renta_detalle WHERE codigo_factura='$codfac' and monto_cuota>0 ORDER BY cuota_renta + 0 ASC";
	$result = mysql_query ($sql);
	$contador_inmuebles = mysql_num_rows($result);


	//consulta de cuotas unidas
	$sql1 = "SELECT GROUP_CONCAT(cuota_renta SEPARATOR ', ') FROM alquiler_renta_detalle WHERE codigo_factura='$codfac' GROUP BY fecha_cuota_pagada, hora_cuota_pagada;";
	$result1 = mysql_query ($sql1);

	if (!$result){
	   echo "La consulta SQL contiene errores.".mysql_error();
	   exit();
	}
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
			font-size: 18px;
			font-weight: bold;
			display: inline-block;
			width: 60%;
			text-align: center;
			margin: 0;
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
		.th_fecha{
			width: 10%;
		}
		.th_pago{
			width:15%;
		}
		.td_forma_pago{
			text-align: center;
		
		}
		.th_form_pago{
			width: 30%;
		}
		.td_pago{
			padding: 0;
		}
		.th_detalles{
			width: 20%;
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
		?>
	</div>
	<div class="subcontenedor">

		<span class="SpanNumeroContrato">Nº Contrato: <b><?php echo $codfac ?></b></span>
		<p class="TituloContrato">Historial de pago<br> <?php echo $nombre_inquilino; ?></p>

		
	</div>
	
	<div class="div_datos_contrato">
		<span>Código del inmueble <br> <?php echo $codigo_inmueble; ?></span>
		<span>Inicio del contrato <br> <?php echo $fecha_inicio; ?></span>
		<span>Final del contrato <br> <?php echo $fecha_final; ?></span>
		<span>Cuotas pagadas <br> <?php echo $cuota_renta." ".$cuota." de ".$dato['tiempo_alquiler'] ?></span>
	</div>
	<br><br>
	<table class="tabla_menu">
		<?php if($result>0) { ?>
			<tr>
				<th class="th_pago">Pago</th>
				<th class='th_fecha'>Fecha de <br> pago</th>
				<th class="th_monto">Monto</th>
				<th class="th_form_pago">Forma de <br>pago</th>
				<th class="th_detalles">Detalles</th>
			</tr>
			<?php
				$contador = 0;
				$articulosPorHoja=6;

				while ($row = mysql_fetch_row($result)){
					
					
					if ($row[8]=='Transferencia') {
						$forma_pago_historial="Transferencia: ".$row[9];
					}else if($row[8]=='Cheque'){
						$forma_pago_historial="<b>Cheque procedente de: </b><br>".$row[10]."<br><b>N° de cheque: </b> ".$row[11]."<br><b>Depositado en: </b>".$row[12].".<br><b>N° de referencia: </b> ".$row[13];
					}else{
						$forma_pago_historial="Efectivo ";
					}
					$fecha_cuota_pagada = $row[3];
					$timestamp_cuota_pagada = strtotime($fecha_cuota_pagada);
					$fecha_cuota_pagada= date('d/m/Y', $timestamp_cuota_pagada);

					//consulta de cuotas unidas
					$row1 = mysql_fetch_row($result1);
	                //Obtenemos la primera columna, el GROUP_CONCAT
	                $cuotas = $row1[0];

	                

	                $detalles=$row[14].$row[15];
					if ($detalles==NULL) {
						$detalles="No";
					}

	    			echo "
						<tr>			
							<td class='td_pago'><b>N° de Cuota: </b><br> ".$cuotas."<br> <b>Abono: </b><br>".number_format($row[16], 2, ",", ".")." ".$row[7]."</td>
							<td>".$fecha_cuota_pagada."</td>
							<td>".number_format($row[6], 2, ",", ".")." ".$row[7]."</td>
							<td class='td_forma_pago'>".$forma_pago_historial."</td>
							<td>".$detalles."</td>
							";
							
						echo "</tr>
							


					 	";
						$contador = $contador+1;
						
						if ($contador==$articulosPorHoja) {
							echo "</table>
								
							<br><table style='page-break-after:always;'></table><br>
							<div class='cuadroPaginas'></div><br>
							<table class='tabla_menu'>
								<tr>
									<th class='th_pago'>Pago</th>
									<th class='th_fecha'>Fecha de <br> pago</th>
									<th class='th_monto'>Monto</th>
									<th class='th_form_pago'>Forma de <br>pago</th>
									<th class='th_fecha'>Detalles</th>
									
								</tr>";
							$contador=0;
							$articulosPorHoja= 8;
						}
					  	
					}
				
			

			
			} else { ?>
			<br>

			<center><h1>No hay resultados que mostrar</h1></center>			
			<?php } ?>
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
			$filename = "Informes/HistorialPago/HistorialPago_".$fecha1."__".$hora1.".pdf";
			file_put_contents($filename, $pdf);
			$dompdf->stream($filename);  
		?>

</body>
</html>