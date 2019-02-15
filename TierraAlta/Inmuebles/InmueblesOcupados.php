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
		$codigo_inmueble=$_POST["codigo_inmueble"];
		$cons=mysql_query("SELECT * FROM alquiler_inmueble WHERE estado_inmueble='Ocupado' AND codigo_inmueble LIKE '%$codigo_inmueble%' ORDER BY codigo_inmueble ASC",$conec);
		$dato=mysql_fetch_array($cons);
		$nfila=mysql_num_rows($cons);
	} else {
		$cons=mysql_query("SELECT * FROM alquiler_inmueble where estado_inmueble='Ocupado' ORDER BY codigo_inmueble ASC",$conec);
		

		$dato=mysql_fetch_array($cons);
		$nfila=mysql_num_rows($cons);
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
			padding: 0px 60px !important;
		}
		.th_inquilino{
			padding: 0px 50px !important;
		}
		.td_inquilino{
			padding: 0px !important;
		}
	</style>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".index").addClass("seleccionado");	
		});
	</script>
	<script type="text/javascript" src="../js/script_inmueble.js"></script>
	<div class="contenedor_archivo">
	  	<div class="divInsertar">
	  		<a href="#Modal_insertar" hidden title="Agregar">+</a>
	  		<?php 
	  			if (!$nfila){
					$disabled='onclick="return false;"';
					$titulo="No hay resultados para imprimir";
				} else {
					$titulo="Imprimir";
				}
			?>
	  		<a href="pdf_inmuebles_ocupados.php?codigo_inmueble=<?php echo $dato['codigo_inmueble']?> " <?php echo $disabled; ?> title="<?php echo $titulo; ?>"><img src="../IMAGEN/print-printer-tool-with-printed-paper-outlined-symbol_icon-icons.png"></a>
	  	</div>
		<form class="form_buscar" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
	  		<span>Inmuebles Ocupados (<?php echo $nfila ?>)</span>
			<input type="search" autocomplete="off" class="form_inputText" name="codigo_inmueble" autofocus="autofocus" value="<?php echo $codigo_inmueble; ?>" placeholder="Buscar por código" /> 
			<input type="submit" name="btnbuscar" hidden value="Ir" class="btnBuscar" />
		</form>
		<br><br>
		<table class="tabla_menu">
			
			<?php if($nfila>0) { ?>
				<tr>
					<th>Código</th>
					<th>Tipo de inmueble</th>
					<th>Dirección</th>
					<th>Precio</th>
					<th class="th_inquilino">Contrato</th>
					<th class="th_inquilino">Inquilino</th>
					<th class="th_detalles">Acción</th>
				</tr>
				<?php
					$i=1;
					do{
						if($i==1){
							$i=2;
							
							if ($dato['tipo_inmueble']=='Residencia') {
								$tipo_inmueble= $dato['tipo_inmueble'].": ".$dato['tipo_residencia_inmueble'];
							} else if ($dato['tipo_inmueble']=='Independiente') {
								$tipo_inmueble='Local Independiente';
							} else {
								$tipo_inmueble=$dato['tipo_inmueble'];
							}

							$iva_precio=(1+$dato['iva_inmueble']/100)*$dato['precio_inmueble'];
							$iva_precio=round($iva_precio,2);

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
							$codigo_inmueble_renta=$dato['codigo_inmueble'];
							$cons_renta=mysql_query("SELECT * FROM alquiler_renta where codigo_inmueble='$codigo_inmueble_renta' and estado_contrato='Vigente'",$conec);
							$dato_renta=mysql_fetch_array($cons_renta);
							$nfila_renta=mysql_num_rows($cons_renta);
							$rif_inquilino=$dato_renta['rif_inquilino'];

							$cons_inquilino=mysql_query("SELECT * FROM alquiler_inquilino where rif_inquilino='$rif_inquilino'",$conec);
							$dato_inquilino=mysql_fetch_array($cons_inquilino);
							$nfila_inquilino=mysql_num_rows($cons_inquilino);

							$codfac=$dato_renta['codigo_factura'];

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
							echo "<tbody>
									<tr>
										<td>".$dato['codigo_inmueble']."</td>
										<td class='Clase_TipoInmueble'>".$tipo_inmueble.$nombre_cc.$pisos_cc."</td>
										
										<td>".$dato['direccion_inmueble']."</td>
										
										<td class='Clase_PrecioInmueble'>".number_format($iva_precio, 2, ",", ".")." ".$dato['moneda_precio_inmueble']."</td>
										<td>Nº: ".$codfac."<br>Desde: ".$fecha_inicio_contrato."<br>Hasta: ".$nuevafecha."</td>
										<td class='td_inquilino'>".$dato_inquilino['nombre_inquilino']."<br>".$rif_inquilino."</td>
										";
										?>
										<td>
											<a href="MostrarInmueblesOcupados.php?codigo_inmueble=<?php echo $dato['codigo_inmueble']; ?>"><img src="../IMAGEN/SEARCH_48x48-32.png" title="Ver Contrato"></a>

											<a  href="EdicionContrato.php?codigo_inmueble=<?php echo $dato['codigo_inmueble']; ?>&codigo_factura=<?php echo $codfac ?>&atras=InmueblesOcupados" onclick="return confirm('¿Está seguro que desea Modificar este Contrato?')"><img src="../IMAGEN/modificar.png" title="Modificar Contrato"></a>
											<a  href="EliminarContrato.php?codigo_inmueble=<?php echo $dato['codigo_inmueble']; ?>&codigo_factura=<?php echo $codfac ?>&atras=InmueblesOcupados" onclick="return confirm('¿Está seguro que desea Eliminar este Contrato?')"><img src="../IMAGEN/eliminar_48x48.png" title="Eliminar Contrato"></a>
										</td>
										
										<?php
									echo "</tr>
							</tbody>";
						} else if($i==2){							
							$i=1;
							
							if ($dato['tipo_inmueble']=='Residencia') {
								$tipo_inmueble= $dato['tipo_inmueble'].": ".$dato['tipo_residencia_inmueble'];
							} else if ($dato['tipo_inmueble']=='Independiente') {
								$tipo_inmueble='Local Independiente';
							} else {
								$tipo_inmueble=$dato['tipo_inmueble'];
							}

							$iva_precio=(1+$dato['iva_inmueble']/100)*$dato['precio_inmueble'];
							$iva_precio=round($iva_precio,2);
							
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
							$codigo_inmueble_renta=$dato['codigo_inmueble'];
							$cons_renta=mysql_query("SELECT * FROM alquiler_renta where codigo_inmueble='$codigo_inmueble_renta' and estado_contrato='Vigente'",$conec);
							$dato_renta=mysql_fetch_array($cons_renta);
							$nfila_renta=mysql_num_rows($cons_renta);
							$rif_inquilino=$dato_renta['rif_inquilino'];

							$cons_inquilino=mysql_query("SELECT * FROM alquiler_inquilino where rif_inquilino='$rif_inquilino'",$conec);
							$dato_inquilino=mysql_fetch_array($cons_inquilino);
							$nfila_inquilino=mysql_num_rows($cons_inquilino);

							$codfac=$dato_renta['codigo_factura'];

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

							echo "<tbody>
									<tr>
										<td>".$dato['codigo_inmueble']."</td>
										<td class='Clase_TipoInmueble'>".$tipo_inmueble.$nombre_cc.$pisos_cc."</td>
										
										<td>".$dato['direccion_inmueble']."</td>
										
										<td class='Clase_PrecioInmueble'>".number_format($iva_precio, 2, ",", ".")." ".$dato['moneda_precio_inmueble']."</td>
										<td>Nº: ".$codfac."<br>Desde: ".$fecha_inicio_contrato."<br>Hasta: ".$nuevafecha."</td>
										<td class='td_inquilino'>".$dato_inquilino['nombre_inquilino']."<br>".$rif_inquilino."</td>
										";
										?>
										<td>
											<a href="MostrarInmueblesOcupados.php?codigo_inmueble=<?php echo $dato['codigo_inmueble']; ?>"><img src="../IMAGEN/SEARCH_48x48-32.png" title="Ver Contrato"></a>

											<a  href="EdicionContrato.php?codigo_inmueble=<?php echo $dato['codigo_inmueble']; ?>&codigo_factura=<?php echo $codfac ?>&atras=InmueblesOcupados" onclick="return confirm('¿Está seguro que desea Modificar este Contrato?')"><img src="../IMAGEN/modificar.png" title="Modificar Contrato"></a>
											<a  href="EliminarContrato.php?codigo_inmueble=<?php echo $dato['codigo_inmueble']; ?>&codigo_factura=<?php echo $codfac ?>&atras=InmueblesOcupados" onclick="return confirm('¿Está seguro que desea Eliminar este Contrato?')"><img src="../IMAGEN/eliminar_48x48.png" title="Eliminar Contrato"></a>
										</td>
										<?php
									echo "</tr>
							</tbody>";
						}
					} while($dato=mysql_fetch_array($cons));
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
