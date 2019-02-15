<?php
	session_start();
	if($_SESSION['TierraAlta_TipoMostrar']==NULL){
		header("location: ../index.php");  
	}else if($_SESSION['TierraAlta_TipoMostrar']=='DEPOSITARIO'){
		header("location: ../DEPOSITARIO/index.php");  
	}else if($_SESSION['TierraAlta_TipoMostrar']=='ADMIN_INVENTARIO'){
		header("location: ../ADMINISTRADOR/index.php");
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
	<meta charset="utf-8">
	<title>Administrador - Control de alquiler</title>
	<link rel="shortcut icon" type="image/x-icon" href="../IMAGEN/logo_ico.png"/>
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/script.js"></script>


	<link rel="stylesheet" type="text/css" href="../css/estilos_admin.css">
	<style type="text/css">
		.seccion2 .categorias:nth-child(1),.seccion2 .categorias:nth-child(4){
			visibility: visible;
		}
		.seccion2 .categorias:nth-child(1) span{
			padding: 15px 10px;
		}
		.reportes{
			position: absolute;
			top: 55%;
			left: 40%;
			color: rgba(0,0,0,0.5);
			text-decoration: none;
			font-size: 30px;
			padding: 10px;
			text-align: center;
		}
		.reportes:hover{
			border-bottom: 2px solid #3e94ec;
			color: #3e94ec  !important;
		}
	</style>
</head>
<body>
	<!--Cabecera-->
	
	<header class="headerCabecera">
		<div class="TituloAdministrador">ADMINISTRADOR</div>
		<nav class="navegador">
			<div id="fecha"></div>
			<div class="datos_usuario">
				<img class="usuario_imagen" src="../IMAGEN/ic_person_black_36dp1.png">
				<img class="usuario_imagen" src="../IMAGEN/ic_keyboard_arrow_down_white_36dp.png">
			</div>
			<div id="MenuDatosUsuario" style="display:none">
				<p onclick="window.location='usuarios.php'"><?php echo strtoupper($_SESSION["TierraAlta_Mostrar"])." "; ?></p>
				
				<?php if($_SESSION["TierraAlta_TipoMostrar"]=="ADMIN_PRINCIPAL") { ?>
					<p onclick="window.location='../index_escoger.php'">Cambiar de sistema</p>
				<?php } ?>
		    	<p onclick="window.location='../Desconectar.php'">Cerrar Sesión</p>
		    	
			</div>
		</nav>
	</header>

	<!--Seccion 1-->
	<section class="seccion1">
		<div class="cuadroMenu">
			<li class="seleccionado">
				<a href="index.php" id="Principal">
					<img src="../IMAGEN/HOME_32x32-321.png">
					<span class="MenuTexto">Control de Alquiler</span>
				</a>
			</li>
		    
		    <li>
		    	<a id="ClienteLink" href="ConsultaInquilinos.php">
		    		<img src="../IMAGEN/ic_person_black_36dp1.png">
		    		<span class="MenuTexto" id="idTexto">Inquilinos</span>
		    	</a>
		    </li>
		    <li>
		    	<a href="ConsultaCentroComercial.php">
		    		<img src="../IMAGEN/ic_location_city_white_48dp.png">
		    		<span class="MenuTexto" id="idTexto">Centro Comercial</span>
		    	</a>
		    </li>
		    <li>
		    	<a href="ConsultaInmuebles.php">
		    		<img src="../IMAGEN/ic_store_white_48dp.png">
		    		<span class="MenuTexto" id="idTexto">Inmuebles</span>
		    	</a>
		    </li>
		    <li>
		    	<a href="ConsultarMoneda.php">
		    		<img src="../IMAGEN/moneda.png">
		    		<span class="MenuTexto" id="idTexto">Moneda</span>
		    	</a>
		    </li>
		    <li>
		    	<a href="historial_contratos.php">
		    		<img src="../IMAGEN/FILE - TEXT_48x48-32.png">
		    		<span class="MenuTexto" id="idTexto">Historial de Contratos</span>
		    	</a>
		    </li>
		    <li>
		    	<a href="ReportePagos.php">
		    		<img src="../IMAGEN/ic_beenhere_white_48dp.png">
		    		<span class="MenuTexto" id="idTexto">Reportes de Pagos</span>
		    	</a>
		    </li>
			<li>
				<a href="#" id="MenuAdministracion">
					<img src="../IMAGEN/SETTINGS_32x32-321.png">
					<span class="MenuTexto">Administración</span>
					<div>
						<img id="flechaAdministracion" src="../IMAGEN/ic_keyboard_arrow_left_white_36dp.png">
					</div>
				</a>
			</li>
			<div id="SubMenuAdministracion" style="display:none">
				<?php 
					if ($_SESSION['TierraAlta_TipoMostrar']=='ADMIN_PRINCIPAL') { ?>
						<a class="SubMenuAdminLink2" href="usuarios.php">Usuarios</a>
				<?php } else { ?>
					<a class="SubMenuAdminLink2" href="usuarios.php">Mi Usuario</a>
				<?php }
				 ?>
				
		    	<a class="SubMenuAdminLink1" href="desarrollador.php">Desarrollador</a>
			</div>
			<div class="EspacioFinal"></div>
		</div>
	</section>
	<section class="seccion2">
		<div class="cuadroPrincipal">
			
			
			<?php 
				include("../Conexion.php");
				$conec=Conectarse();

				$cons_pp1=mysql_query("SELECT * FROM alquiler_inmueble WHERE estado_inmueble='Disponible'",$conec);	
				$nfila_pp1=mysql_num_rows($cons_pp1);
				
				if (!$nfila_pp1){
					$cambio_color1="";
					$disabled1='onclick="return false;"';
					$titulo1="No existen inmuebles disponibles.";
				} else{
					$cambio_color1="cambio_color";
				}

				$cons_pp2=mysql_query("SELECT * FROM alquiler_inmueble WHERE estado_inmueble='Ocupado'",$conec);	
				$nfila_pp2=mysql_num_rows($cons_pp2);
				
				if (!$nfila_pp2){
					
					$disabled2='onclick="return false;"';
					$titulo2="No existen inmuebles ocupados.";
				}

				//CONSULTA DE CONTRATOS POR VENCER
				
				$cons_inmueble_contratos=mysql_query("SELECT * FROM alquiler_inmueble where estado_inmueble='Ocupado' ORDER BY codigo_inmueble ASC",$conec);
				$dato_inmueble_contratos=mysql_fetch_array($cons_inmueble_contratos);
				$nfila_inmueble_contratos=mysql_num_rows($cons_inmueble_contratos);

				if($nfila_inmueble_contratos>0) {
					$i_inmueble_contratos=1;
					do{
						if($i_inmueble_contratos==1){
							$i_inmueble_contratos=2;
							
							$codigo_inmueble_contratos=$dato_inmueble_contratos['codigo_inmueble'];
							$cons_rentas_contratos=mysql_query("SELECT * FROM alquiler_renta where codigo_inmueble='$codigo_inmueble_contratos' and estado_contrato='Vigente' ORDER BY codigo_inmueble ASC",$conec);
							$dato_rentas_contratos=mysql_fetch_array($cons_rentas_contratos);
							$nfila_rentas_contratos=mysql_num_rows($cons_rentas_contratos);
							$codfac_contratos=$dato_rentas_contratos['codigo_factura'];


							$cons_renta_detalle_contratos=mysql_query("SELECT * FROM alquiler_renta_detalle where codigo_factura='$codfac_contratos' ORDER BY codigo_inmueble ASC",$conec);
							$dato_renta_detalle_contratos=mysql_fetch_array($cons_renta_detalle_contratos);
							$nfila_renta_detalle_contratos=mysql_num_rows($cons_renta_detalle_contratos);

							//comparar cuotas pagadas y tiempo de alquiler
							$tiempo_alquiler_contratos=$dato_rentas_contratos['tiempo_alquiler'];
							$cuotas_pagadas_contratos=$dato_renta_detalle_contratos['cuota_renta'];

							//HORA ACTUAL
							date_default_timezone_set('America/Caracas');
							$fecha_diario0_contratos=date("Y-m-d",time());
							$timestamp_diario_contratos = strtotime($fecha_diario0_contratos);
							$fecha_diario_contratos= date('d/m/Y', $timestamp_diario_contratos);

							//FECHA FINAL DEL CONTRATO

							$fecha_contrato_con_mes_muerto_contratos = $dato_rentas_contratos['fecha_contrato_con_mes_muerto'];
							$nuevafecha_calculo0_contratos =  strtotime ($fecha_contrato_con_mes_muerto_contratos);
							$nuevafecha_calculo_contratos = date ( 'Y-m-d' , $nuevafecha_calculo0_contratos );

							$d_final_contrato = new DateTime($nuevafecha_calculo_contratos);
							addmonths($d_final_contrato,$dato_rentas_contratos['tiempo_alquiler']);
							$nuevafecha_contratos  =$d_final_contrato->format("d/m/Y");
							$nuevafecha_d_contratos=$d_final_contrato->format("Y-m-d"); //Para comparar con la fecha actual

							$nuevafecha_str =  strtotime ($nuevafecha_d_contratos);

							//RESTAR 1 MES A LA FECHA FINAL DEL CONTRATO
							
							$contrato_1mes_menos_contratos = strtotime ( '-1 month' , $nuevafecha_str ) ;
							$contrato_1mes_menos0_contratos = date ( 'Y-m-j' , $contrato_1mes_menos_contratos );
							$timestamp_1mes_menos_contratos = strtotime($contrato_1mes_menos0_contratos);
							$contrato_1mes_menos_contratos= date('d/m/Y', $timestamp_1mes_menos_contratos);

							if ($cuotas_pagadas_contratos==$tiempo_alquiler_contratos) { //Todas las cuotas han sido pagadas

								//CONTRATO VENCIDO
								if ($fecha_diario0_contratos>=$nuevafecha_d_contratos) {
									$contador_primario2=$contador_primario2+1;
								}else if ($timestamp_diario_contratos>=$timestamp_1mes_menos_contratos) {
									//CUENTA LOS DIAS QUE FALTAN PARA QUE EL CONTRATO VENZA
									$contador_primario2=$contador_primario2+1;
								}	
							} else { //Aun quedan cuotas pendientes por pagar
								//CONTRATO VENCIDO
								if ($fecha_diario0_contratos>=$nuevafecha_d_contratos) {
									$contador_primario2=$contador_primario2+1;									
								}else if ($timestamp_diario_contratos>=$timestamp_1mes_menos_contratos) {
									//CUENTA LOS DIAS QUE FALTAN PARA QUE EL CONTRATO VENZA
									$contador_primario2=$contador_primario2+1;
								}
							}
						} else if($i_inmueble_contratos==2) {							
							$i_inmueble_contratos=1;
							
							$codigo_inmueble_contratos=$dato_inmueble_contratos['codigo_inmueble'];
							$cons_rentas_contratos=mysql_query("SELECT * FROM alquiler_renta where codigo_inmueble='$codigo_inmueble_contratos' and estado_contrato='Vigente' ORDER BY codigo_inmueble ASC",$conec);
							$dato_rentas_contratos=mysql_fetch_array($cons_rentas_contratos);
							$nfila_rentas_contratos=mysql_num_rows($cons_rentas_contratos);
							$codfac_contratos=$dato_rentas_contratos['codigo_factura'];


							$cons_renta_detalle_contratos=mysql_query("SELECT * FROM alquiler_renta_detalle where codigo_factura='$codfac_contratos' ORDER BY codigo_inmueble ASC",$conec);
							$dato_renta_detalle_contratos=mysql_fetch_array($cons_renta_detalle_contratos);
							$nfila_renta_detalle_contratos=mysql_num_rows($cons_renta_detalle_contratos);

							//comparar cuotas pagadas y tiempo de alquiler
							$tiempo_alquiler_contratos=$dato_rentas_contratos['tiempo_alquiler'];
							$cuotas_pagadas_contratos=$dato_renta_detalle_contratos['cuota_renta'];

							//HORA ACTUAL
							date_default_timezone_set('America/Caracas');
							$fecha_diario0_contratos=date("Y-m-d",time());
							$timestamp_diario_contratos = strtotime($fecha_diario0_contratos);
							$fecha_diario_contratos= date('d/m/Y', $timestamp_diario_contratos);

							//FECHA FINAL DEL CONTRATO

							$fecha_contrato_con_mes_muerto_contratos = $dato_rentas_contratos['fecha_contrato_con_mes_muerto'];
							$nuevafecha_calculo0_contratos =  strtotime ($fecha_contrato_con_mes_muerto_contratos);
							$nuevafecha_calculo_contratos = date ( 'Y-m-d' , $nuevafecha_calculo0_contratos );

							$d_final_contrato = new DateTime($nuevafecha_calculo_contratos);
							addmonths($d_final_contrato,$dato_rentas_contratos['tiempo_alquiler']);
							$nuevafecha_contratos  =$d_final_contrato->format("d/m/Y");
							$nuevafecha_d_contratos=$d_final_contrato->format("Y-m-d"); //Para comparar con la fecha actual

							$nuevafecha_str =  strtotime ($nuevafecha_d_contratos);

							//RESTAR 1 MES A LA FECHA FINAL DEL CONTRATO
							
							$contrato_1mes_menos_contratos = strtotime ( '-1 month' , $nuevafecha_str ) ;
							$contrato_1mes_menos0_contratos = date ( 'Y-m-j' , $contrato_1mes_menos_contratos );
							$timestamp_1mes_menos_contratos = strtotime($contrato_1mes_menos0_contratos);
							$contrato_1mes_menos_contratos= date('d/m/Y', $timestamp_1mes_menos_contratos);

							if ($cuotas_pagadas_contratos==$tiempo_alquiler_contratos) { //Todas las cuotas han sido pagadas

								//CONTRATO VENCIDO
								if ($fecha_diario0_contratos>=$nuevafecha_d_contratos) {
									$contador_secundario2=$contador_secundario2+1;
								}else if ($timestamp_diario_contratos>=$timestamp_1mes_menos_contratos) {
									//CUENTA LOS DIAS QUE FALTAN PARA QUE EL CONTRATO VENZA
									$contador_secundario2=$contador_secundario2+1;
								}	
							} else { //Aun quedan cuotas pendientes por pagar
								//CONTRATO VENCIDO
								if ($fecha_diario0_contratos>=$nuevafecha_d_contratos) {
									$contador_secundario2=$contador_secundario2+1;									
								}else if ($timestamp_diario_contratos>=$timestamp_1mes_menos_contratos) {
									//CUENTA LOS DIAS QUE FALTAN PARA QUE EL CONTRATO VENZA
									$contador_secundario2=$contador_secundario2+1;
								}
							}
						}
					} while($dato_inmueble_contratos=mysql_fetch_array($cons_inmueble_contratos));
						
				}
				
				$contador_registros_contratos=$contador_primario2+$contador_secundario2;

				if ($contador_registros_contratos==0){
					$cambio_color3="";
					$disabled3='onclick="return false;"';
					$titulo3="No existen contratos por vencer.";
				} else{
					$cambio_color3="cambio_color";
				}
				

				//CONSULTA DE RENTAS POR COBRAR
				
				$cons_inmueble=mysql_query("SELECT * FROM alquiler_inmueble where estado_inmueble='Ocupado' ORDER BY codigo_inmueble ASC",$conec);
				$dato_inmueble=mysql_fetch_array($cons_inmueble);
				$nfila_inmueble=mysql_num_rows($cons_inmueble);

				if($nfila_inmueble>0) {									
					
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
									if ($fecha_diario0>=$nuevafecha_d) {
										$contador_primario=$contador_primario+1;	
									}elseif ($timestamp_diario>=$timestamp_3dias_menos) {
										$contador_primario=$contador_primario+1;	
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
									if ($fecha_diario0>=$nuevafecha_d) {
										$contador_secundario=$contador_secundario+1;	
									}elseif ($timestamp_diario>=$timestamp_3dias_menos) {
										$contador_secundario=$contador_secundario+1;	
									}	 						
								}
							}
						} while($dato_inmueble=mysql_fetch_array($cons_inmueble));
						
				}
				
				$contador_registros=$contador_primario+$contador_secundario;
				if ($contador_registros==0){
					$cambio_color4="";
					$disabled4='onclick="return false;"';
					$titulo4="No existen rentas por cobrar.";
				} else{
					$cambio_color4="cambio_color";
				}
				?>
				
			  		
					
				
			<a class="categorias <?php echo $cambio_color1; ?>" href="InmueblesDisponibles.php" <?php echo $disabled1; ?> title="<?php echo $titulo1; ?>">
				<img src="../IMAGEN/infographic-diagram.svg" class="categorias_imagen">
				<div class="saldo">
					<?php echo $nfila_pp1; ?>
				</div>
				<span>Inmuebles Disponibles</span>
			</a>
			<a class="categorias" href="InmueblesOcupados.php" <?php echo $disabled2; ?> title="<?php echo $titulo2; ?>">
				<img src="../IMAGEN/infographic-diagram_no.png" class="categorias_imagen">
				<div class="saldo">
					<?php echo $nfila_pp2; ?>
				</div>
				<span>Inmuebles Ocupados</span>
			</a>
			
			<a class="categorias <?php echo $cambio_color3; ?>" href="ContratosPorVencer.php?atras=index" <?php echo $disabled3; ?> title="<?php echo $titulo3; ?>">
				<img src="../IMAGEN/ic_warning_orange_96dp.png" class="categorias_imagen">
				<div class="saldo">
					<?php echo $contador_registros_contratos; ?>
				</div>
				<span>Contratos por vencer</span>
			</a>				
			
			<a class="categorias <?php echo $cambio_color4; ?>" href="RentasPorCobrar.php?atras=index" <?php echo $disabled4; ?> title="<?php echo $titulo4; ?>">
				<img src="../IMAGEN/icons8-Llamada de conferencia Filled-1001.png" class="categorias_imagen">
				<div class="saldo">
					<?php echo $contador_registros; ?>
				</div>
				<span>Rentas por Cobrar </span>
			</a>

			<div class="Bienvenido_admin">
				Bienvenido al sistema <br> Administrador
			</div>
		</div>
	</section>
</body>
</html>