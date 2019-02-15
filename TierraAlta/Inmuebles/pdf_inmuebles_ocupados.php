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
	$sql = "SELECT * FROM alquiler_inmueble WHERE estado_inmueble='Ocupado' ORDER BY codigo_inmueble ASC";
	$result = mysql_query ($sql);
	$contador_inmuebles = mysql_num_rows($result);

	if (!$result){
	   echo "La consulta SQL contiene errores.".mysql_error();
	   exit();
	}

	//FUNCION PARA SUMAR MES A LA FECHA
	function addMonths($date,$months) {
	  $orig_day = $date->format("d");
	  $date->modify("+".$months." months");
	  while ($date->format("d")<$orig_day && $date->format("d")<5) {
	    $date->modify("-1 day");
	  }
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<style type="text/css">
	.th_inquilino{
		padding: 0px 20px;
	}
	.contrato{
		padding: 0px 30px;
	}
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
	hr{
		padding: 0;
		margin: 3px;
		opacity: 0.3;
		height: 1px;
	}
	.Clase_TipoInmueble{
		text-align: left !important;
	}
	.Clase_PrecioInmueble{
		text-align:right;
		padding: 0px;
	}
	.th_estado{
		padding: 0px;
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
	<center><h1>Inmuebles Ocupados (<?php echo $contador_inmuebles ?>)</h1></center>
	<table class="tabla_menu">
		<?php if($result>0) { ?>
			<tr>
				<th>Código</th>
				<th>Tipo de inmueble</th>
				<th>Dirección</th>
				<th>Precio</th>
				<th class="th_inquilino contrato">Contrato</th>
				<th class="th_inquilino">Inquilino</th>
				
			</tr>
			<?php
				$contador = 0;
				$articulosPorHoja=7;

				while ($row = mysql_fetch_row($result)){
					
					if ($row[2]=='Residencia') {
						$tipo_inmueble= $row[2].": ".$row[3];
					} else if ($row[2]=='Independiente') {
						$tipo_inmueble='Local Independiente';
					} else {
						$tipo_inmueble=$row[2];
					}
					$codigo_cc=$row[9];
					$cons_nombre_cc=mysql_query("SELECT * FROM alquiler_cc WHERE codigo_cc='$codigo_cc' ",$conec);
					$dato_nombre_cc=mysql_fetch_array($cons_nombre_cc);
					$nfila_nombre_cc=mysql_num_rows($cons_nombre_cc);
					
					if ($row[2]=='Local') {
						$nombre_cc=" en ".$dato_nombre_cc['nombre_cc'];
						$pisos_cc=" - Piso ".$row[10];
					} else {
						$nombre_cc="";
						$pisos_cc="";
					}
					$codigo_inmueble_renta=$row[1];
					$cons_renta=mysql_query("SELECT * FROM alquiler_renta where codigo_inmueble='$codigo_inmueble_renta' and estado_contrato='Vigente'",$conec);
					$dato_renta=mysql_fetch_array($cons_renta);
					$nfila_renta=mysql_num_rows($cons_renta);
					$rif_inquilino=$dato_renta['rif_inquilino'];
					$codfac=$dato_renta['codigo_factura'];

					$cons_inquilino=mysql_query("SELECT * FROM alquiler_inquilino where rif_inquilino='$rif_inquilino'",$conec);
					$dato_inquilino=mysql_fetch_array($cons_inquilino);
					$nfila_inquilino=mysql_num_rows($cons_inquilino);


					$fecha_contrato=$dato_renta['fecha_contrato_con_mes_muerto'];
					$timestamp = strtotime($fecha_contrato);
					$fecha= date('d/m/Y', $timestamp);
					//SUMAR MES A LA FECHA
					$nuevafecha_calculo0 =  strtotime ($fecha_contrato);
					$nuevafecha_calculo = date ( 'Y-m-d' , $nuevafecha_calculo0 );
					$d_final_contrato = new DateTime($nuevafecha_calculo);
					addmonths($d_final_contrato,$dato_renta['tiempo_alquiler']);
					$nuevafecha=$d_final_contrato->format("d/m/Y");

					//FECHA INICIAL CONTRATO
					$fecha_inicio_contrato=$dato_renta['fecha_contrato'];
					$timestamp_inicio = strtotime($fecha_inicio_contrato);
					$fecha_inicio_contrato= date('d/m/Y', $timestamp_inicio);
	    			echo "
						<tr>							
							<td>".$row[1]."</td>
							<td class='Clase_TipoInmueble'>".$tipo_inmueble.$nombre_cc.$pisos_cc."</td>
							<td>".$row[7]."</td>
							<td class='Clase_PrecioInmueble'>".number_format($row[4], 2, ",", ".")." ".$row[5]."</td>
							<td>Nº: ".$codfac."<br>Desde: ".$fecha_inicio_contrato."<br>Hasta: ".$nuevafecha."</td>
							<td class='td_inquilino'>".$dato_inquilino['nombre_inquilino']."<br>".$rif_inquilino."</td>
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
									<th>Código</th>
									<th>Tipo de inmueble</th>
									<th>Dirección</th>
									<th>Precio</th>
									<th class='th_inquilino  contrato'>Contrato</th>
									<th class='th_inquilino'>Inquilino</th>
									
								</tr>";
							$contador=0;
							$articulosPorHoja= 7;
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
			$filename = "Informes/Inmuebles/InmueblesOcupados_".$fecha1."__".$hora1.".pdf";
			file_put_contents($filename, $pdf);
			$dompdf->stream($filename);  
		?>

</body>
</html>