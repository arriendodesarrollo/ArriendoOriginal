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

	$sql = "SELECT * FROM alquiler_renta ORDER BY codigo_factura ASC";
	$result = mysql_query ($sql);

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
	.th_inquilino{
		padding: 0px 20px;
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
	.th_fecha{
		padding: 0 15px;
	}
	.td_fecha{
		padding: 0px;
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
	.th_direccion{
		width: 50px;
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
	<center><h1>Historial de Contratos</h1></center>
	<table class="tabla_menu">
		<?php if($result>0) { ?>
			<tr>
				<th>Nº de Contrato</th>
				<th class="th_fecha">Fecha</th>
				<th>Código <br> Inmueble</th>
				<th>Tipo de <br> Inmueble</th>
				<th class="th_direccion">Dirección</th>
				<th>Precio</th>
				<th>Inquilino</th>				
			</tr>
			<?php
				$contador = 0;
				$articulosPorHoja=6;

				while ($row = mysql_fetch_row($result)){
					$rif_inquilino=$row[2];
					$codigo_inmueble=$row[1];
					$cons=mysql_query("SELECT * FROM alquiler_inmueble WHERE codigo_inmueble='$codigo_inmueble' ",$conec);
					$dato=mysql_fetch_array($cons);
					$nfila=mysql_num_rows($cons);
					
					if ($dato['tipo_inmueble']=='Residencia') {
						$tipo_inmueble= $dato['tipo_inmueble'].": ".$dato['tipo_residencia_inmueble'];
					} else if ($dato['tipo_inmueble']=='Independiente') {
						$tipo_inmueble='Local Independiente';
					} else {
						$tipo_inmueble=$dato['tipo_inmueble'];
					}
					$codigo_cc=$dato['codigo_cc'];
					$cons_nombre_cc=mysql_query("SELECT * FROM alquiler_cc WHERE codigo_cc='$codigo_cc' ",$conec);
					$dato_nombre_cc=mysql_fetch_array($cons_nombre_cc);
					$nfila_nombre_cc=mysql_num_rows($cons_nombre_cc);
					
					if ($dato['tipo_inmueble']=='Local') {
						$nombre_cc=" en ".$dato_nombre_cc['nombre_cc'];
						$pisos_cc=" - Piso ".$dato['pisos_cc'];
					} else {
						$nombre_cc="";
						$pisos_cc="";
					}							

					$cons_inquilino=mysql_query("SELECT * FROM alquiler_inquilino where rif_inquilino='$rif_inquilino'",$conec);
					$dato_inquilino=mysql_fetch_array($cons_inquilino);
					$nfila_inquilino=mysql_num_rows($cons_inquilino);

					$codfac=$row[0];

					$fecha_contrato=$row[4];
					$timestamp = strtotime($fecha_contrato);
					$fecha= date('d/m/Y', $timestamp);
					$nuevafecha = strtotime ( '+'.$row[6].' month' , strtotime ( $fecha_contrato ) ) ;
					$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
					$timestamp1 = strtotime($nuevafecha);
					$nuevafecha= date('d/m/Y', $timestamp1);

					//FECHA INICIAL CONTRATO
					$fecha_inicio_contrato=$row[3];
					$timestamp_inicio = strtotime($fecha_inicio_contrato);
					$fecha_inicio_contrato= date('d/m/Y', $timestamp_inicio);

					echo "<tbody>
							<tr>
								<td>".$codfac."</td>
								<td class='td_fecha'>Desde:<br> ".$fecha_inicio_contrato."<br>Hasta:<br> ".$nuevafecha."</td>
								<td>".$dato['codigo_inmueble']."</td>
								<td class='Clase_TipoInmueble'>".$tipo_inmueble.$nombre_cc.$pisos_cc."</td>
								<td>".$dato['direccion_inmueble']."</td>
								<td>".number_format($dato['precio_inmueble'], 2, ",", ".")." ".$dato['moneda_precio_inmueble']."</td>
								<td>".$dato_inquilino['nombre_inquilino']."<br>".$rif_inquilino."</td>
							</tr>
					</tbody>";
					
						$contador = $contador+1;
						
						if ($contador==$articulosPorHoja) {
							echo "</table>
								
							<br><table style='page-break-after:always;'></table><br>
							<div class='cuadroPaginas'></div><br>
							<table class='tabla_menu'>
								<tr>
									<th>Nº de Contrato</th>
									<th class='th_fecha'>Fecha</th>
									<th>Código <br> Inmueble</th>
									<th>Tipo de <br> Inmueble</th>
									<th class='th_direccion'>Dirección</th>
									<th>Precio</th>
									<th>Inquilino</th>	
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
			$filename = "Informes/HistorialContratos/HistorialContratos_".$fecha1."__".$hora1.".pdf";
			file_put_contents($filename, $pdf);
			$dompdf->stream($filename);  
		?>

</body>
</html>