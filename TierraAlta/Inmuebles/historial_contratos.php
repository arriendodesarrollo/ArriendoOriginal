<?php session_start();
	if($_SESSION['TierraAlta_TipoMostrar']==NULL){
		header("location: ../index.php");  
	}else if($_SESSION['TierraAlta_TipoMostrar']=='DEPOSITARIO'){
		header("location: ../DEPOSITARIO/index.php");  
	}else if($_SESSION['TierraAlta_TipoMostrar']=='ADMIN_INVENTARIO'){
		header("location: ../ADMINISTRADOR/index.php");
	}
	include("Cabecera.php");
	if($_POST){
		$codfac=$_POST["codigo_factura"];
		$cons_renta=mysql_query("SELECT * FROM alquiler_renta WHERE codigo_factura LIKE '%$codfac%' ORDER BY codigo_factura ASC ",$conec);
		$dato_renta=mysql_fetch_array($cons_renta);
		$nfila_renta=mysql_num_rows($cons_renta);
	} else {
		$cons_renta=mysql_query("SELECT * FROM alquiler_renta ORDER BY codigo_factura ASC",$conec);
		$dato_renta=mysql_fetch_array($cons_renta);
		$nfila_renta=mysql_num_rows($cons_renta);
	}
	

?>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/estilos_archivos.css">
	<style type="text/css">

		.link_cambiar_estado{
			color:white;
			border: 2px solid #009900;
			background: #009900;
			border-radius: 5px;
			text-decoration: none;
			padding: 10px;
		}
		tr td a img{
			filter: invert(100%);
			-webkit-filter: invert(100%);
			border: 2px solid transparent;
			width: 30px;
			margin-bottom: -5px;
			height: 30px;
			padding: 3px;
		}
		tr td a img:hover{
			
			border: 2px solid white;
			border-radius: 5px;
		}
		#tipo_residencia_inmueble label{
		    display: inline-block;
		    cursor: pointer;
		    color: #4cb1ff;
		    position: relative;
		    font-size: 1em;
		    border-radius: 5px;
		    -webkit-transition: all 0.3s ease;
		    -o-transition: all 0.3s ease;
		    transition: all 0.3s ease;
		    text-align: center;
		    margin: 0px 7% 10px 7%;
			padding: 5px 15px 5px 30px;
		}
	    #tipo_residencia_inmueble label:hover{
	      	background: rgba(76, 177, 255, 0.1); }

	    #tipo_residencia_inmueble label:before{
			content: "";
			display: inline-block;
			width: 17px;
			height: 17px;
			position: absolute;
			left: 10px;
			border-radius: 50%;
			background: none;
			border: 3px solid #4cb1ff;
	  	}
		#tipo_residencia_inmueble label:before{
			width: 14px;
		    height: 14px;
		    left: 5px;
		}
		#tipo_residencia_inmueble input[type="radio"] {
			display: none !important;
		}
		#tipo_residencia_inmueble input[type="radio"]:checked + label:before {
			display: none; }
		#tipo_residencia_inmueble input[type="radio"]:checked + label {
		    padding: 5px 15px;
		    background: #4cb1ff;
		    border-radius: 2px;
		    color: #fff;
		}
		#tipo_residencia_inmueble{
			display: inline-block;
			box-sizing: border-box;
		    width: 40%;
		    margin-left: 6%;
		    margin-top: 15px;
		    border: 1px solid rgba(0,0,0,0.3);
		    box-shadow: 0px 0px 2px rgba(0,0,0,0.5);
		    vertical-align: top;
		}
		.bloqueradio p{
			text-align: center;
			color: rgba(0,0,0,0.5);
			margin: 10px 0;
		}
		.FormInsertar .btnRegistrar{
			margin-left: 30%;
		}
		.form_buscar{
			margin-top: -70px;
			margin-right: 1%;
		}
		.tabla_menu{
			margin-left: -47.5%;
		}
		.tabla_menu th{
			box-sizing: border-box !important;
			padding: 10px 0px;
			text-align: center;
			font-size: 17px;
		}
		
		.tabla_menu td{
			padding: 10px;
		}
		.acciones a img{
			filter: invert(100%);
			-webkit-filter: invert(100%);
		}
		.acciones a img:hover{
			border: 2px solid white;
			
		}
		hr{
			padding: 0;
			margin: 3px;
			opacity: 0.3;
		}
		.select{
			width: 40%;
			margin-left: 6%;
			margin-top: 15px;
			box-sizing: border-box;
			font-size: 15px;
			padding: 10px;
			display:inline-block;
			border: 1px solid rgba(0,0,0,0.3);
			background: transparent;
			box-shadow: 0px 0px 2px rgba(0,0,0,0.5);	
			color: rgba(0,0,0,0.5);
		}
		.select option{
			color: black;
		}
		#codigo_cc{
			display: inline-block;
			width: 100%;
		}
		.DivPrecio{
			border: 1px solid red;
			width: 40%;
		    margin-left: 6%;
		    margin-top: 15px;
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
		.Clase_TipoInmueble{
			text-align: left !important;
		}
		.Clase_PrecioInmueble{
			text-align:right !important;
		}
		
		.th_detalles{
			padding: 0px 15px !important;
		}
		.th_inquilino{
			padding: 0px 50px !important;
		}
		.td_inquilino{
			padding: 0px !important;
		}
		.th_fecha{
			padding: 0px 50px !important;
		}
		.td_fecha{
			padding: 0 !important;
		}
	</style>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".contratosLink").addClass("seleccionado");	
		});
	</script>
	<script type="text/javascript" src="../js/script_inmueble.js"></script>
	<div class="contenedor_archivo">
	  	<div class="divInsertar">
	  		<a href="#Modal_insertar" hidden title="Agregar">+</a>
	  		<?php 
	  			if (!$nfila_renta){
					$disabled='onclick="return false;"';
					$titulo="No hay resultados para imprimir";
				} else {
					$titulo="Imprimir";
				}
			?>
	  		<a href="pdf_historial_contratos.php" <?php echo $disabled; ?> title="<?php echo $titulo; ?>"><img src="../IMAGEN/print-printer-tool-with-printed-paper-outlined-symbol_icon-icons.png"></a>
	  	</div>
		<form class="form_buscar" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
	  		<span>Historial de Contratos</span>
			<input type="search" autocomplete="off" class="form_inputText" name="codigo_factura" autofocus="autofocus" value="<?php echo $codfac; ?>" placeholder="Buscar contrato" /> 
			<input type="submit" name="btnbuscar" hidden value="Ir" class="btnBuscar" />
		</form>
		<br><br>
		<table class="tabla_menu">
			
			<?php if($nfila_renta>0) { ?>
				<tr>
					<th>Nº de Contrato</th>
					<th class="th_fecha">Fecha</th>
					<th>Código <br> Inmueble</th>
					<th>Tipo de <br> Inmueble</th>
					<th class="th_detalles">Dirección</th>
					<th>Precio</th>
					<th class="th_inquilino">Inquilino</th>
					<th class="th_detalles">Ver Detalles</th>
				</tr>
				<?php
					$i=1;
					do{
						if($i==1){
							$i=2;
							$rif_inquilino=$dato_renta['rif_inquilino'];
							$codigo_inmueble=$dato_renta['codigo_inmueble'];
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

							$codfac=$dato_renta['codigo_factura'];

							$fecha_contrato=$dato_renta['fecha_contrato_con_mes_muerto'];
							$timestamp = strtotime($fecha_contrato);
							$fecha= date('d/m/Y', $timestamp);
							$nuevafecha = strtotime ( '+'.$dato_renta['tiempo_alquiler'].' month' , strtotime ( $fecha_contrato ) ) ;
							$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
							$timestamp1 = strtotime($nuevafecha);
							$nuevafecha= date('d/m/Y', $timestamp1);

							//FECHA INICIAL CONTRATO
							$fecha_inicio_contrato=$dato_renta['fecha_contrato'];
							$timestamp_inicio = strtotime($fecha_inicio_contrato);
							$fecha_inicio_contrato= date('d/m/Y', $timestamp_inicio);

							
							echo "<tbody>
									<tr>
										<td>".$codfac."</td>
										<td class='td_fecha'>Desde: ".$fecha_inicio_contrato."<br>Hasta: ".$nuevafecha."</td>
										<td>".$dato['codigo_inmueble']."</td>
										<td class='Clase_TipoInmueble'>".$tipo_inmueble.$nombre_cc.$pisos_cc."</td>
										
										<td>".$dato['direccion_inmueble']."</td>
										
										<td class='Clase_PrecioInmueble'>".number_format($dato["precio_inmueble"], 2, ",", ".")." ".$dato['moneda_precio_inmueble']."</td>
										
										<td class='td_inquilino'>".$dato_inquilino['nombre_inquilino']."<br>".$rif_inquilino."</td>
										";
										?>
										<td><a href="mostrar_contrato.php?codigo_factura=<?php echo $codfac ?>&codigo_inmueble=<?php echo $dato['codigo_inmueble']; ?>&atras=HistorialContratos"><img src="../IMAGEN/SEARCH_48x48-32.png" title="Ver orden"></a></td>
										
										<?php
									echo "</tr>
							</tbody>";
						} else if($i==2){							
							$i=1;
							$rif_inquilino=$dato_renta['rif_inquilino'];
							$codigo_inmueble=$dato_renta['codigo_inmueble'];
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

							$codfac=$dato_renta['codigo_factura'];

							$fecha_contrato=$dato_renta['fecha_contrato_con_mes_muerto'];
							$timestamp = strtotime($fecha_contrato);
							$fecha= date('d/m/Y', $timestamp);
							$nuevafecha = strtotime ( '+'.$dato_renta['tiempo_alquiler'].' month' , strtotime ( $fecha_contrato ) ) ;
							$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
							$timestamp1 = strtotime($nuevafecha);
							$nuevafecha= date('d/m/Y', $timestamp1);

							//FECHA INICIAL CONTRATO
							$fecha_inicio_contrato=$dato_renta['fecha_contrato'];
							$timestamp_inicio = strtotime($fecha_inicio_contrato);
							$fecha_inicio_contrato= date('d/m/Y', $timestamp_inicio);

							
							echo "<tbody>
									<tr>
										<td>".$codfac."</td>
										<td class='td_fecha'>Desde: ".$fecha_inicio_contrato."<br>Hasta: ".$nuevafecha."</td>
										<td>".$dato['codigo_inmueble']."</td>
										<td class='Clase_TipoInmueble'>".$tipo_inmueble.$nombre_cc.$pisos_cc."</td>
										
										<td>".$dato['direccion_inmueble']."</td>
										
										<td class='Clase_PrecioInmueble'>".number_format($dato["precio_inmueble"], 2, ",", ".")." ".$dato['moneda_precio_inmueble']."</td>
										
										<td class='td_inquilino'>".$dato_inquilino['nombre_inquilino']."<br>".$rif_inquilino."</td>
										";
										?>
										<td><a href="mostrar_contrato.php?codigo_factura=<?php echo $codfac ?>&codigo_inmueble=<?php echo $dato['codigo_inmueble']; ?>&atras=HistorialContratos"><img src="../IMAGEN/SEARCH_48x48-32.png" title="Ver orden"></a></td>
										
										<?php
									echo "</tr>
							</tbody>";
						}
					} while($dato_renta=mysql_fetch_array($cons_renta));
			} else { ?>
			<tr>
				<center><h1>No hay resultados que mostrar</h1></center>
			</tr>
			<?php } ?>
		</table>
		<div class="EspacioFinal"></div>
	</div>
</body>
</html>
