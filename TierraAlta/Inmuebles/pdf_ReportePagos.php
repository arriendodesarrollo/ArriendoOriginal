<?php ob_start();
	include("../conexion.php");
	$conec=Conectarse();

	$busq=$_REQUEST["input_reporte"];	
	$campo=$_REQUEST["tiempo"];
	$moneda=$_REQUEST["moneda"];
	$nombre=$_REQUEST["nombre"];

	date_default_timezone_set('America/Caracas');
	$ano=date('Y');
	$semana=date('W');
	$mes=date('m');
	$dias=date('t');
	
	if($campo=="Diario"){
		$fechaini=date("Y-m-d");
		$fechafin=date("Y-m-d");
		$Titulo_compras="Pagos diario";
	}
	if($campo=="Semanal"){
		$fechaini=date("Y-m-d",strtotime($ano.'W'.str_pad($semana,2,'0',STR_PAD_LEFT)));
		$fechafin=date("Y-m-d",strtotime($fechaini.'6 day'));
		$Titulo_compras="Pagos semanal";
	}
	if($campo=="Mensual"){
		$Titulo_compras="Pagos mensual";
		if(($mes==1) || ($mes==3) || ($mes==5) || ($mes==7) || ($mes==8) || ($mes==10) || ($mes==12)) {
			$fechaini=date("Y-m-d",strtotime("01-".$mes."-".$ano));
			$fechafin=date("Y-m-d",strtotime("31-".$mes."-".$ano));
		}
		if(($mes==4) || ($mes==6) || ($mes==9) || ($mes==11)) {
			$fechaini=date("Y-m-d",strtotime("01-".$mes."-".$ano));
			$fechafin=date("Y-m-d",strtotime("30-".$mes."-".$ano));
		}
		if($mes==2) {
			if (((fmod($ano,4)==0) and (fmod($ano,100)!=0)) or (fmod($ano,400)==0)) {
				$fechaini=date("Y-m-d",strtotime("01-02-".$ano));
				$fechafin=date("Y-m-d",strtotime("29-02-".$ano));
			} else {
				$fechaini=date("Y-m-d",strtotime("01-02-".$ano));
				$fechafin=date("Y-m-d",strtotime("28-02-".$ano));
			}
		}
	}

	if($campo=="Semestral"){
		$Titulo_compras="Pagos semestral";
		if(($mes>1) && ($mes<7)){
			$fechaini=date("Y-m-d",strtotime("01-01-".$ano));
			$fechafin=date("Y-m-d",strtotime("30-06-".$ano));
		} else if(($mes>6) && ($mes<13)){
			$fechaini=date("Y-m-d",strtotime("01-07-".$ano));
			$fechafin=date("Y-m-d",strtotime("31-12-".$ano));
		}
	}

	if($campo=="Anual"){
		$fechaini=date("Y-m-d",strtotime("01-01-".$ano));
		$fechafin=date("Y-m-d",strtotime("31-12-".$ano));
		$Titulo_compras="Pagos anual";
	}
	if($campo=="Rango"){
		$fechaini=date("Y-m-d",strtotime($_REQUEST["txtfechaini"]));
		$fechafin=date("Y-m-d",strtotime($_REQUEST["txtfechafin"]));
		$Titulo_compras="Pagos por rango de fecha";
	}
	if($busq=="pagos"){
		$cons=mysql_query("SELECT * FROM alquiler_renta_detalle WHERE fecha_cuota_pagada>='$fechaini' AND fecha_cuota_pagada<='$fechafin' and moneda_monto_cuota='$moneda' and monto_cuota>0 ORDER BY (fecha_cuota_pagada and hora_cuota_pagada) ASC",$conec);
		$dato=mysql_fetch_array($cons);
		$nfila=mysql_num_rows($cons);

		
	}
	//PENDIENTE
	if(!empty($nombre)){
		$Titulo_compras="Pagos de ";
		$cons=mysql_query("SELECT * FROM compras WHERE rif_proveedores='$rif_proveedores' and estado_compras='RECIBIDO' ORDER BY rif_proveedores ASC",$conec);
		$dato=mysql_fetch_array($cons);
		$nfila=mysql_num_rows($cons);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<style type="text/css">
		.tabla_menu {
		  border-collapse: collapse;
		  width: 90%;
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
		  border: 1px solid #C1C3D1;
		  vertical-align: middle;
		}
		
		.TD_proveedor{
			padding: 3px 2px;
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
		.td_total{
			text-align: left;
			padding-left: 15px;
			font-weight: bold;
			font-size: 18px;
		}
	</style>
	
</head>
<body>
	<br><br>
	<div class="cabeceraPDF">
		<img src="../IMAGEN/logo_negro.jpg" class="imgPDF">
		
		<?php
			if ($campo=="Diario" or $nombre) {
				date_default_timezone_set('America/Caracas');
				$fecha_diario=date("Y-m-d",time());
				$hora_diario=date("H:i:s",time());
				$timestamp_diario = strtotime($hora_diario);
				$hora_diario = date('H:i', $timestamp_diario);

				$timestamp_diario = strtotime($fecha_diario);
				$fecha_diario= date('d/m/Y', $timestamp_diario);
				$horaAM_PM_diario =date('h:i:s a', strtotime($hora_diario));

			 	echo "<span class='spanfecha primero'>Fecha: ".$fecha_diario."<br>Hora: ".$horaAM_PM_diario."</span>";
			} else {
				$timestamp1_titulo = strtotime($fechaini);
				$fechaini_formateada= date('d/m/Y', $timestamp1_titulo);

				$timestamp2_titulo = strtotime($fechafin);
				$fechafin_formateada= date('d/m/Y', $timestamp2_titulo);
			 	echo "<span class='spanfecha primero'>Desde: ".$fechaini_formateada."<br>Hasta: ".$fechafin_formateada."</span>";
			}
		?>
	</div>
	<?php 
		$rif_proveedores1=$dato['rif_proveedores'];
		$cons_proveedores1=mysql_query("SELECT nombre_proveedores FROM proveedores WHERE rif_proveedores='$rif_proveedores1'",$conec);
		$dato_proveedores1=mysql_fetch_array($cons_proveedores1);
	 ?>
	<center>
		<h1>
			<?php
				echo $Titulo_compras;
				if ($nombre) {
					echo "<br>".$dato_proveedores1['nombre_proveedores'];
				}
			?>
		</h1>
	</center>
	<?php if($nfila>0) { ?>		
		<?php if ($nombre) { ?>
			<style type="text/css">
				.Ocultar{
					display: none;
				}
			</style>
		<?php } ?>
		<table class='tabla_menu'>
			<tr>
				<th>Nº Contrato</th>
				<th>Inquilino</th>
				<th>Código del <br> Inmueble</th>
				<th>Pago</th>
				<th>Fecha</th>
				<th>Monto</th>
			</tr>
			<?php
				$contador = 0;
				
				if ($nombre) {
					$articulosPorHoja=22;
				} else{
					$articulosPorHoja=7;
				}
				do{ 
					$codigo_factura_pagos=$dato['codigo_factura'];
					$hora_cuota_pagada=$dato['hora_cuota_pagada'];
					$cons_renta=mysql_query("SELECT rif_inquilino FROM alquiler_renta WHERE codigo_factura='$codigo_factura_pagos' ",$conec);
					$dato_renta=mysql_fetch_array($cons_renta);
					$rif_inquilino_pagos=$dato_renta['rif_inquilino'];

					$cons_inquilino=mysql_query("SELECT nombre_inquilino FROM alquiler_inquilino WHERE rif_inquilino='$rif_inquilino_pagos' ",$conec);
					$dato_inquilino=mysql_fetch_array($cons_inquilino);
					$nombre_inquilino_pagos=$dato_inquilino['nombre_inquilino'];

					//consulta de cuotas unidas
					$sql1 = "SELECT GROUP_CONCAT(cuota_renta SEPARATOR ', ') FROM alquiler_renta_detalle WHERE codigo_factura='$codigo_factura_pagos' and hora_cuota_pagada='$hora_cuota_pagada' GROUP BY fecha_cuota_pagada, hora_cuota_pagada;";
					$result1 = mysql_query ($sql1);
					//consulta de cuotas unidas
					$row1 = mysql_fetch_row($result1);
	                //Obtenemos la primera columna, el GROUP_CONCAT
	                $cuotas = $row1[0];
					
					$moneda_consulta=$dato['moneda_monto_cuota'];
					?>
					<tr>
						<td><?php echo $dato['codigo_factura']?></td>
						<td><?php echo $nombre_inquilino_pagos." <br>".$rif_inquilino_pagos; ?></td>
						<td><?php echo $dato['codigo_inmueble']?></td>
						<td><?php echo "Nº de cuota: ".$cuotas."<br>Abono: ".$dato['monto_abono']." ".$moneda_consulta;?></td>
						

						<td>
							<?php
								$fecha0 = $dato['fecha_cuota_pagada'];
								$timestamp = strtotime($fecha0);
								$fecha= date('d/m/Y', $timestamp);
								echo $fecha;
							?>
						</td>
						
						<td>
							<?php
								$suma_abono_cuota=$dato['monto_cuota']+$dato['monto_abono'];
								echo number_format($suma_abono_cuota, 2, ",", ".")." ".$moneda_consulta;
							?>
						</td>
						<?php
							$total=$total+$dato['monto_cuota']+$dato['monto_abono'];
						?>
						
					</tr>
					
				<?php
			
			$contador = $contador+1;						
			if ($contador==$articulosPorHoja) {
				echo "</table>
					
				<br><table style='page-break-after:always;'></table><br>
				<div class='cuadroPaginas'></div><br>
				<table class='tabla_menu'>
					<tr>
						<th>Nº Contrato</th>
						<th>Inquilino</th>
						<th>Código del <br> Inmueble</th>
						<th>Pago</th>
						<th>Fecha</th>
						<th>Monto</th>
					</tr>";
				$contador=0;
				if ($nombre) {
					$articulosPorHoja= 25;
				} else {
					$articulosPorHoja= 9;
				}
			}
			} 

				while($dato=mysql_fetch_array($cons)); ?>
	<?php } ?>
			<tr>
				<td colspan="5" class="td_total">Total</td>
				<td colspan="1" align="center"><b><?php echo number_format($total, 2, ",", ".")." ".$moneda_consulta; ?></td>
			</tr>
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
			
			if ($campo=="Diario" or $nombre) {
				$fecha1 = date('d_m_Y');
				$hora1= date (" h_i a");
			} else {
				$timestamp1_pdf = strtotime($fechaini);
				$fechaini_formateada= date('d_m_Y', $timestamp1_pdf);

				$timestamp2_pdf = strtotime($fechafin);
				$fechafin_formateada= date('d_m_Y', $timestamp2_pdf);

				$fecha1=  $fechaini_formateada;
				$hora1=  $fechafin_formateada;
			}
			
			$filename = "Informes/Pagos/pagos_".$campo."_".$fecha1."__".$hora1.".pdf";
			file_put_contents($filename, $pdf);
			$dompdf->stream($filename);  
		?>
</body>
</html>