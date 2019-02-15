<?php session_start();
	if($_SESSION['TierraAlta_TipoMostrar']==NULL){
		header("location: ../index.php");  
	}else if($_SESSION['TierraAlta_TipoMostrar']=='DEPOSITARIO'){
		header("location: ../DEPOSITARIO/index.php");  
	}else if($_SESSION['TierraAlta_TipoMostrar']=='ADMIN_INVENTARIO'){
		header("location: ../ADMINISTRADOR/index.php");
	}
	include("Cabecera.php");

	/*if($_POST){
		$codigo_inmueble=$_POST["codigo_inmueble"];
		$cons=mysql_query("SELECT * FROM alquiler_inmueble WHERE estado_inmueble='Disponible' AND codigo_inmueble LIKE '%$codigo_inmueble%' ORDER BY codigo_inmueble ASC",$conec);
		$dato=mysql_fetch_array($cons);
		$nfila=mysql_num_rows($cons);
	} else {
		$cons=mysql_query("SELECT * FROM alquiler_inmueble where estado_inmueble='Disponible' ORDER BY codigo_inmueble ASC",$conec);
		$dato=mysql_fetch_array($cons);
		$nfila=mysql_num_rows($cons);
	}*/

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
	
		.color_dias{
			color: red;
		}
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
		
		.tabla_menu{
			margin-left: -47.5%;
			margin-top: -30px;
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
		.span_rentas{
			position: absolute;
			float: left;
		    padding: 7px 30px;
		    font-weight: bold;
		    font-size: 30px;
		    color: rgba(0,0,0,0.5);
		    top: 97px;
		}
		.form_inputText{
			position: absolute;
			top: 97px;
			right: 30px;
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
	  		<a hidden href="pdf_inmuebles_disponibles.php?codigo_inmueble=<?php echo $dato['codigo_inmueble']?> " <?php echo $disabled; ?> title="<?php echo $titulo; ?>"><img src="../IMAGEN/print-printer-tool-with-printed-paper-outlined-symbol_icon-icons.png"></a>
	  	</div>
	  	
		
		
		<?php 
			$cons_inmueble=mysql_query("SELECT * FROM alquiler_inmueble where estado_inmueble='Ocupado' ORDER BY codigo_inmueble ASC",$conec);
			$dato_inmueble=mysql_fetch_array($cons_inmueble);
			$nfila_inmueble=mysql_num_rows($cons_inmueble);

			if($nfila_inmueble>0) { ?>
				<br><br>
				<table class="tabla_menu">

				<tr>
					<th>Código del <br> Inmueble</th>
					<th>Nº de<br> Contrato</th>
					<th>Inquilino</th>
					<th>Cuotas<br> Pagadas</th>
					<th>Próxima<br> Cuota</th>
					<th>Estado de <br>Pago</th>
					<th>Ver<br> Detalles</th>
				</tr>
				<?php
					$i_inmueble=1;
					do{
						if($i_inmueble==1){
							$i_inmueble=2;
							$codigo_inmueble=$dato_inmueble['codigo_inmueble'];
							$cons_rentas=mysql_query("SELECT * FROM alquiler_renta where codigo_inmueble='$codigo_inmueble' and estado_contrato='Vigente' ORDER BY codigo_inmueble ASC",$conec);
							$dato_rentas=mysql_fetch_array($cons_rentas);
							$nfila_rentas=mysql_num_rows($cons_rentas);
							$codfac=$dato_rentas['codigo_factura'];


							$cons_renta_detalle=mysql_query("SELECT * FROM alquiler_renta_detalle where codigo_factura='$codfac' ORDER BY codigo_inmueble ASC",$conec);
							$dato_renta_detalle=mysql_fetch_array($cons_renta_detalle);
							$nfila_renta_detalle=mysql_num_rows($cons_renta_detalle);


							$rif_inquilino=$dato_rentas['rif_inquilino'];

							$cons_inquilino=mysql_query("SELECT * FROM alquiler_inquilino where rif_inquilino='$rif_inquilino'",$conec);
							$dato_inquilino=mysql_fetch_array($cons_inquilino);
							$nfila_inquilino=mysql_num_rows($cons_inquilino);

							//comparar cuotas pagadas y tiempo de alquiler
							$tiempo_alquiler=$dato_rentas['tiempo_alquiler'];
							$mes_muerto=$dato_rentas['mes_muerto'];
							$cuotas_pagadas=$dato_renta_detalle['cuota_renta'];
							if ($cuotas_pagadas==$tiempo_alquiler) {
								$comparar_tiempo_alquiler= 1; //"Las cuotas pagadas y el tiempo de alquiler es el mismo"
							} else {
								$comparar_tiempo_alquiler= 2; // "Contrato vigente"
							}

							if ($comparar_tiempo_alquiler==1) {
								//no muestra nada
							} else {
								//HORA ACTUAL
								
								date_default_timezone_set('America/Caracas');
								$fecha_diario0=date("Y-m-d",time());
								$timestamp_diario = strtotime($fecha_diario0);
								$fecha_diario= date('d/m/Y', $timestamp_diario);

								//FECHA DE CONTRATO CON MES MUERTO INCLUIDO
								$fecha_contrato_con_mes_muerto = $dato_rentas['fecha_contrato_con_mes_muerto'];
								
								if ($cuotas_pagadas==NULL) {
									$cuotas_pagadas=0;
								}
								
								//FECHA AGREGAR MES
								
								$nuevafecha_calculo0 =  strtotime ($fecha_contrato_con_mes_muerto);
								$nuevafecha_calculo = date ( 'Y-m-d' , $nuevafecha_calculo0 );

								$d_final_contrato = new DateTime($nuevafecha_calculo);
								addmonths($d_final_contrato,$cuotas_pagadas);
								$nuevafecha  =$d_final_contrato->format("d/m/Y");
								$nuevafecha_d=$d_final_contrato->format("Y-m-d"); //Para comparar con la fecha actual

								$nuevafecha_str =  strtotime ($nuevafecha_d);
								


								
								//RESTAR 3 DIAS A LA FECHA
								
								$proxima_cuota_3dias_menos = strtotime ( '-3 day' , $nuevafecha_str ) ;
								$proxima_cuota_3dias_menos0 = date ( 'Y-m-j' , $proxima_cuota_3dias_menos );
								$timestamp_3dias_menos = strtotime($proxima_cuota_3dias_menos0);
								$proxima_cuota_3dias_menos= date('d/m/Y', $timestamp_3dias_menos);

								//SI A LA CUOTA DEL INMUEBLE LE QUEDAN MENOS DE 3 DIAS PARA VENCERSE
								if ($timestamp_diario>=$timestamp_3dias_menos) {
										$contador_primario=$contador_primario+1;

									if ($fecha_diario0>=$nuevafecha_d) {
										$estado_renta="Cuota vencida ";
									}elseif ($timestamp_diario>=$timestamp_3dias_menos) {
										$start = new DateTime($fecha_diario0);
										$end = new DateTime($nuevafecha_d);
										$days = round(($end->format('U') - $start->format('U')) / (60*60*24));
										
										if ($days==1) {
											$Mensaje_dia_restante="Queda <b class='color_dias'>1 día</b> ";
										} else{
											$Mensaje_dia_restante="Quedan <b class='color_dias'>".$days." dias</b> ";
										}

										$estado_renta=$Mensaje_dia_restante."para que la cuota se venza ";
									} else {
										$estado_renta="Solvente";
									}
									
									if ($dato_renta_detalle['cuota_renta']==NULL) {
										$cuota_renta=0;
									
										
										$timestamp_contrato_mes_muerto = strtotime($fecha_contrato_con_mes_muerto);
										$nuevafecha= date('d/m/Y', $timestamp_contrato_mes_muerto);


										
									} else {
										$cuota_renta=$dato_renta_detalle['cuota_renta'];
									}
									echo "<tbody>

											<tr>
												<td>".$dato_inmueble['codigo_inmueble']."</td>
												<td>".$codfac."</td>
												<td>".$dato_inquilino['nombre_inquilino']."<br>".$rif_inquilino."</td>
												<td>".$cuota_renta." de ".$tiempo_alquiler."</td>
												<td>".$nuevafecha."</td>
												<td>".$estado_renta."</td>
												";

												?>										
												<td><a href="MostrarInmueblesOcupados.php?codigo_inmueble=<?php echo $codigo_inmueble; ?>&atras=RentasPorCobrar"><img src="../IMAGEN/SEARCH_48x48-32.png" title="Ver orden"></a></td>
												<?php
											echo "</tr>
									</tbody>";
									$contador1=1;
								} else{
									
								} 						
							}
						} else if($i_inmueble==2) {							
							$i_inmueble=1;
							$codigo_inmueble=$dato_inmueble['codigo_inmueble'];
							$cons_rentas=mysql_query("SELECT * FROM alquiler_renta where codigo_inmueble='$codigo_inmueble' and estado_contrato='Vigente' ORDER BY codigo_inmueble ASC",$conec);
							$dato_rentas=mysql_fetch_array($cons_rentas);
							$nfila_rentas=mysql_num_rows($cons_rentas);
							$codfac=$dato_rentas['codigo_factura'];


							$cons_renta_detalle=mysql_query("SELECT * FROM alquiler_renta_detalle where codigo_factura='$codfac' ORDER BY codigo_inmueble ASC",$conec);
							$dato_renta_detalle=mysql_fetch_array($cons_renta_detalle);
							$nfila_renta_detalle=mysql_num_rows($cons_renta_detalle);

							$rif_inquilino=$dato_rentas['rif_inquilino'];

							$cons_inquilino=mysql_query("SELECT * FROM alquiler_inquilino where rif_inquilino='$rif_inquilino'",$conec);
							$dato_inquilino=mysql_fetch_array($cons_inquilino);
							$nfila_inquilino=mysql_num_rows($cons_inquilino);

							//comparar cuotas pagadas y tiempo de alquiler
							$tiempo_alquiler=$dato_rentas['tiempo_alquiler'];
							$mes_muerto=$dato_rentas['mes_muerto'];
							$cuotas_pagadas=$dato_renta_detalle['cuota_renta'];
							if ($cuotas_pagadas==$tiempo_alquiler) {
								$comparar_tiempo_alquiler= 1; //"Las cuotas pagadas y el tiempo de alquiler es el mismo"
							} else {
								$comparar_tiempo_alquiler= 2; // "Contrato vigente"
							}

							if ($comparar_tiempo_alquiler==1) {
								//no muestra nada
							} else {
								$fecha_contrato_con_mes_muerto = $dato_rentas['fecha_contrato_con_mes_muerto'];
								if ($cuotas_pagadas==NULL) {
									$cuotas_pagadas=0;
								}
								

								//HORA ACTUAL
								
								date_default_timezone_set('America/Caracas');
								$fecha_diario0=date("Y-m-d",time());
								$timestamp_diario = strtotime($fecha_diario0);
								$fecha_diario= date('d/m/Y', $timestamp_diario);
								
								
								//FECHA AGREGAR MES

								
								$nuevafecha_calculo0 =  strtotime ($fecha_contrato_con_mes_muerto);
								$nuevafecha_calculo = date ( 'Y-m-d' , $nuevafecha_calculo0 );

								$d_final_contrato = new DateTime($nuevafecha_calculo);
								addmonths($d_final_contrato,$cuotas_pagadas);
								$nuevafecha  =$d_final_contrato->format("d/m/Y");
								$nuevafecha_d=$d_final_contrato->format("Y-m-d"); //Para comparar con la fecha actual

								$nuevafecha_str =  strtotime ($nuevafecha_d);
								


								
								//RESTAR 3 DIAS A LA FECHA
								
								$proxima_cuota_3dias_menos = strtotime ( '-3 day' , $nuevafecha_str ) ;
								$proxima_cuota_3dias_menos0 = date ( 'Y-m-j' , $proxima_cuota_3dias_menos );
								$timestamp_3dias_menos = strtotime($proxima_cuota_3dias_menos0);
								$proxima_cuota_3dias_menos= date('d/m/Y', $timestamp_3dias_menos);

								//SI A LA CUOTA DEL INMUEBLE LE QUEDAN MENOS DE 3 DIAS PARA VENCERSE
								if ($timestamp_diario>=$timestamp_3dias_menos) {
										$contador_secundario=$contador_secundario+1;

									if ($fecha_diario0>=$nuevafecha_d) {
										$estado_renta="Cuota vencida ";
									}elseif ($timestamp_diario>=$timestamp_3dias_menos) {
										$start = new DateTime($fecha_diario0);
										$end = new DateTime($nuevafecha_d);
										$days = round(($end->format('U') - $start->format('U')) / (60*60*24));
										
										if ($days==1) {
											$Mensaje_dia_restante="Queda <b class='color_dias'>1 día</b> ";
										} else{
											$Mensaje_dia_restante="Quedan <b class='color_dias'>".$days." dias</b> ";
										}

										$estado_renta=$Mensaje_dia_restante."para que la cuota se venza ";
									} else {
										$estado_renta="Solvente";
									}
									
									if ($dato_renta_detalle['cuota_renta']==NULL) {
										$cuota_renta=0;
									
										$timestamp_contrato_mes_muerto = strtotime($fecha_contrato_con_mes_muerto);
										$nuevafecha= date('d/m/Y', $timestamp_contrato_mes_muerto);



										
									} else {
										$cuota_renta=$dato_renta_detalle['cuota_renta'];
									}
									echo "<tbody>

											<tr>
												<td>".$dato_inmueble['codigo_inmueble']."</td>
												<td>".$codfac."</td>
												<td>".$dato_inquilino['nombre_inquilino']."<br>".$rif_inquilino."</td>
												<td>".$cuota_renta." de ".$tiempo_alquiler."</td>
												<td>".$nuevafecha."</td>
												<td>".$estado_renta."</td>
												";

												?>										
												<td><a href="MostrarInmueblesOcupados.php?codigo_inmueble=<?php echo $codigo_inmueble; ?>&atras=RentasPorCobrar"><img src="../IMAGEN/SEARCH_48x48-32.png" title="Ver orden"></a></td>
												<?php
											echo "</tr>
									</tbody>";
									$contador2=1;
								} else{
									
								} 						
							}
						}
					} while($dato_inmueble=mysql_fetch_array($cons_inmueble));
					
			} else { ?>
			<tr>
				<center><h1>No hay resultados que mostrar</h1></center>
			</tr>
			
		</table>

			<?php }
				$contador_registros=$contador_primario+$contador_secundario;
			?>

			<form class="form_buscar_rentas" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
		  		<span class="span_rentas">Rentas por Cobrar (<?php echo $contador_registros; ?>)</span>
				<input type="search" hidden autocomplete="off" class="form_inputText" name="codigo_inmueble" autofocus="autofocus" value="<?php echo $codigo_inmueble; ?>" placeholder="Buscar por código" /> 
				<input type="submit" name="btnbuscar" hidden value="Ir" class="btnBuscar" />
			</form>
			<?php 
			$contador_total=$contador1+$contador2;
			if ($contador_total==0) { ?>
				<center><h1>No hay resultados que mostrar</h1></center>
				<style type="text/css">
					.tabla_menu{
						display: none;
					}
				</style>
			<?php }
		?>
		
	</div>
	<div class="EspacioFinal"></div>
</body>
</html>
