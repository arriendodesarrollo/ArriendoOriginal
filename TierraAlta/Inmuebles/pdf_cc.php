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
	$sql = "SELECT * FROM alquiler_cc ORDER BY nombre_cc ASC";
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
		}
		
		td {
		  padding: 3px 2px;
		  text-align:center;
		  border: 1px solid #C1C3D1;
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
	<center><h1>Centro Comercial</h1></center>
	<table class="tabla_menu">
		<?php if($result>0) { ?>
			<tr>
				<th class="th_cedula">Código</th>
				<th>Nombre</th>
				<th class="th_direccion">Dirección</th>
				<th>Tamaño</th>
				<th class="Th_tlf">Teléfono</th>
			</tr>
			<?php 
				$contador = 0;
				$articulosPorHoja=10;

				while ($row = mysql_fetch_row($result)){
					if ($row[4]>1) {
						$pisos_cc=$row[4]." Pisos, ";
					} else {
						$pisos_cc=$row[4]." Piso, ";
					}
					$cantidad_locales_cc=$row[5]." Locales";

					$Telefono1 = $row[6];
					$area1 = substr($Telefono1, 0, 4);
					$numero1 = substr($Telefono1, 4, 16);
					$Telefono1 = $area1 . '-' . $numero1;
					if ($row[7]==0) {
						$Telefono2 = "";
					} else {
						$Telefono2 = $row[7];
						$area2 = substr($Telefono2, 0, 4);
						$numero2 = substr($Telefono2, 4, 16); //el maximo permito para los telefonos es 20 numeros
						$Telefono2 = "<br>".$area2 . '-' . $numero2;
					}

					
	    			echo "
						<tr>
							<td>".$row[1]."</td>
							<td>".$row[2]."</td>
							<td>".$row[3]."</td>
							<td>".$pisos_cc.$cantidad_locales_cc."</td>
							<td>".$Telefono1.$Telefono2."</td>
							
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
									<th class='th_cedula'>Código</th>
									<th>Nombre</th>
									<th class='th_direccion'>Dirección</th>
									<th>Tamaño</th>
									<th class='Th_tlf'>Teléfono</th>
									
								</tr>";
							$contador=0;
							$articulosPorHoja= 11;
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