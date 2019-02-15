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
	$codigo_cc=$_REQUEST['codigo_cc'];
	$cons=mysql_query("SELECT * FROM alquiler_cc WHERE codigo_cc='$codigo_cc'",$conec);
	$dato=mysql_fetch_array($cons);

	$sql = "SELECT * FROM alquiler_inmueble WHERE codigo_cc='$codigo_cc' ORDER BY codigo_inmueble ASC";
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
	.th_obra{
		padding: 0px 40px;
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
			padding: 0px 0px;
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
	<center><h1>Centro Comercial <?php echo $dato['nombre_cc']; ?></h1></center>
	<table class="tabla_menu">
		<tr>
			<th>Código</th>
			<th>Dirección</th>
			<th>Tamaño</th>
			<th>Teléfono</th>
		</tr>
		<?php
			if ($dato['cantidad_pisos_cc']>1) {
			$pisos_cc=$dato['cantidad_pisos_cc']." Pisos, ";
		} else {
			$pisos_cc=$dato['cantidad_pisos_cc']." Piso, ";
		}
		$cantidad_locales_cc=$dato['cantidad_locales_cc']." Locales";

		$Telefono1 = $dato['telefono1_cc'];
		$area1 = substr($Telefono1, 0, 4);
		$numero1 = substr($Telefono1, 4, 16);
		$Telefono1 = $area1 . '-' . $numero1;
		if ($dato['telefono2_cc']==0) {
			$Telefono2 = "";
		} else {
			$Telefono2 = $dato['telefono2_cc'];
			$area2 = substr($Telefono2, 0, 4);
			$numero2 = substr($Telefono2, 4, 16); //el maximo permito para los telefonos es 20 numeros
			$Telefono2 = "<br>".$area2 . '-' . $numero2;
		}
		echo "
				<tr>
					<td>".$dato['codigo_cc']."</td>
					<td>".$dato['direccion_cc']."</td>
					<td>".$pisos_cc.$cantidad_locales_cc."</td>
					<td>".$Telefono1.$Telefono2."</td>
				</td>";
		?>
	</table>
	<center><h1>Lista de Locales</h1></center>
	<table class="tabla_menu">
		<?php if($result>0) { ?>
			<tr>
				<th>Código</th>
				<th>Piso</th>  
				<th>Descripción Detallada</th>
				<th>Precio</th>
				<th>I.V.A</th>
				<th>Estado</th>
			</tr>
			<?php 
				$contador = 0;
				$articulosPorHoja=11;
				
				while ($row = mysql_fetch_row($result)){

					
					
										
					if ($row[11]=='Ocupado') {
						$codigo_inmueble1=$row[1];
						$cons_estado_inmueble=mysql_query("SELECT rif_inquilino FROM alquiler_renta WHERE codigo_inmueble='$codigo_inmueble1' and estado_contrato='Vigente' ",$conec);
						$dato_estado_inmueble=mysql_fetch_array($cons_estado_inmueble);
						$rif_inquilino1=$dato_estado_inmueble['rif_inquilino'];

						$cons_estado_inmueble_inquilino=mysql_query("SELECT nombre_inquilino FROM alquiler_inquilino WHERE rif_inquilino='$rif_inquilino1' ",$conec);
						$dato_estado_inmueble_inquilino=mysql_fetch_array($cons_estado_inmueble_inquilino);
						$estado_nombre=" por:<br>".$dato_estado_inmueble_inquilino['nombre_inquilino']."<br>";
					} else {
						$estado_nombre='';
						$rif_inquilino1='';
					}

					if (empty($row[1])) {
						echo "<span>No hay resultados.</span>";
					} else {

				       	echo "<tr>
				                <td>".$row[1]."</td>
				  				<td>".$row[10]."</td>
				  				<td>".$row[8]."</td>
				  				<td>".number_format($row[4], 2, ",", ".")." ".$row[5]."</td>  
				  				<td>".$row[6]." % </td>  
				  				<td>".$row[11].$estado_nombre.$rif_inquilino1."</td>
							</tr>";
					}

					
						$contador = $contador+1;
						
						if ($contador==$articulosPorHoja) {
							echo "</table>
								
							<br><table style='page-break-after:always;'></table><br>
							<div class='cuadroPaginas'></div><br>
							<table class='tabla_menu'>
								<tr>
									<th>Código</th>
									<th>Piso</th>  
									<th>Descripción Detallada</th>
									<th>Precio</th>
									<th>I.V.A</th>
									<th>Estado</th>
									
								</tr>";
							$contador=0;
							$articulosPorHoja= 14;
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
			$filename = "Informes/CentroComercial/CC_".$fecha1."__".$hora1.".pdf";
			file_put_contents($filename, $pdf);
			$dompdf->stream($filename);  
		?>

</body>
</html>