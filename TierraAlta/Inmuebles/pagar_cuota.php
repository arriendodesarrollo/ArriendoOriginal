<?php session_start();
	if($_SESSION['TierraAlta_TipoMostrar']==NULL){
		header("location: ../index.php");  
	}else if($_SESSION['TierraAlta_TipoMostrar']=='DEPOSITARIO'){
		header("location: ../DEPOSITARIO/index.php");  
	}else if($_SESSION['TierraAlta_TipoMostrar']=='ADMIN_INVENTARIO'){
		header("location: ../ADMINISTRADOR/index.php");
	}
	include("../Conexion.php");
	$conec=Conectarse();
	if(!$conec) { ?>
		<meta charset="utf-8">
		<script language="javascript"> alert("ERROR: Falla en la Conexión Con el Servidor");</script>
	<?php exit(); }

	$monto_cuota=$_POST['monto_cuota'];
	$moneda_precio_inmueble=$_POST['moneda_precio_inmueble'];
	$forma_pago=$_POST['forma_pago'];
	$codfac=$_POST['codigo_factura'];
	$codigo_inmueble=$_POST['codigo_inmueble'];
	$cuota_renta=$_POST['cuota_renta'];
	$fecha=$_POST['fecha_pago'];
	$monto_abono=$_POST['monto_abono'];
	$detalles_transferencia=$_POST['detalles_transferencia'];
	$detalles_cheque=$_POST['detalles_cheque'];
	$contador_de_cuotas=$_POST['contador_de_cuotas'];
	$total_id=$_POST['total_id'];

	//variables solo para insertar la cuota pagada
	$fecha_cuota_pagada=$_POST['fecha_cuota_pagada'];
	$hora_cuota_pagada=$_POST['hora_cuota_pagada'];
	$datos_transferencia=$_POST['datos_transferencia'];

	$procedencia_cheque=$_POST['procedencia_cheque'];
	$datos_cheque=$_POST['datos_cheque'];

	//variable para regresar a RentasPorCobrar.php
	$atras=$_POST['atras'];
	
	date_default_timezone_set('America/Caracas');
	//$fecha=date("Y-m-d",time());
	$hora=date("H:i:s",time());
	$timestamp = strtotime($hora);
	$hora = date('H:i:s', $timestamp);

	//SI SOLO ABONAN UNA CUOTA, MAS NO LA TERMINAN DE PAGAR
	if ($contador_de_cuotas==NULL) {
		
		$sql=mysql_query("SELECT * FROM alquiler_renta_detalle WHERE codigo_factura='$codfac' ORDER BY cuota_renta DESC",$conec);
		$dato=mysql_fetch_array($sql);
		$nfila=mysql_num_rows($sql);

	//Consulta de la cuota pasada
		$cuota_renta_pasada=$dato['cuota_renta'];
		$fecha_cuota_pagada_pasada=$dato['fecha_cuota_pagada'];
		$hora_cuota_pagada_pasada=$dato['hora_cuota_pagada'];
		$monto_cuota_pasada=$dato['monto_cuota'];
		$moneda_monto_cuota_pasada=$dato['moneda_monto_cuota'];
		$forma_pago_pasada=$dato['forma_pago'];
		$datos_transferencia_pasada=$dato['datos_transferencia'];
		$procedencia_cheque_pasada=$dato['procedencia_cheque'];
		$datos_cheque_pasada=$dato['datos_cheque'];
		$cheque_banco_depositado_pasada=$dato['cheque_banco_depositado'];
		$cheque_referencia_depositado_pasada=$dato['cheque_referencia_depositado'];
		$detalles_transferencia_pasada=$dato['detalles_transferencia'];
		$detalles_cheque_pasada=$dato['detalles_cheque'];
		$monto_abono_pasada=$dato['monto_abono'];
		$abono_sin_cuota_pasada=$dato['abono_sin_cuota'];
		$fecha_abono_sin_cuota_pasada=$dato['fecha_abono_sin_cuota'];
		$forma_pago_abono_pasada=$dato['forma_pago_abono'];
		$datos_transferencia_abono_pasada=$dato['datos_transferencia_abono'];
		$procedencia_cheque_abono_pasada=$dato['procedencia_cheque_abono'];
		$datos_cheque_abono_pasada=$dato['datos_cheque_abono'];
		$cheque_banco_depositado_abono_pasada=$dato['cheque_banco_depositado_abono'];
		$cheque_referencia_depositado_abono_pasada=$dato['cheque_referencia_depositado_abono'];
		$detalles_transferencia_abono_pasada=$dato['detalles_transferencia_abono'];
		$detalles_cheque_abono_pasada=$dato['detalles_cheque_abono'];
	//Fin de la consulta de la cuota pasada

		if ($datos_transferencia_pasada==NULL) {
			$datos_transferencia_pasada='';
		}
		if ($datos_cheque_pasada==NULL) {
			$datos_cheque_pasada='';
		}
		
		$monto_cuota=0;
		if (!$nfila) {
			//cuando solo va a abonar la primera cuota
			$cuota_renta_abono=1;
			mysql_query("INSERT INTO alquiler_renta_detalle values ('$codfac','$codigo_inmueble','$cuota_renta_abono','','','Pendiente','$monto_cuota','$moneda_precio_inmueble','','','','','','','','','','$monto_abono','$fecha','$forma_pago','$datos_transferencia','$procedencia_cheque','$datos_cheque','','','$detalles_transferencia','$detalles_cheque')",$conec);
		} else {
			//ya ha realizado otros pagos y va a hacer un abono sin cuota
			if ($monto_cuota_pasada>0 and $dato['estado_cuota']=='Pendiente') {
				$cuota_renta_abono=$cuota_renta_pasada+1;
				mysql_query("INSERT INTO alquiler_renta_detalle values ('$codfac','$codigo_inmueble','$cuota_renta_abono','$fecha','$hora','Pendiente','$monto_cuota','$moneda_precio_inmueble','','','','','','','','','','$monto_abono','$fecha','$forma_pago','$datos_transferencia','$procedencia_cheque','$datos_cheque','','','$detalles_transferencia','$detalles_cheque')",$conec);

				//actualizo el estado de la cuota pasada a Pagado
				mysql_query("UPDATE alquiler_renta_detalle set 
															estado_cuota='Pagado'
													  where codigo_factura='$codfac' and
													  		cuota_renta='$cuota_renta_pasada'",$conec);
			} else {
				$suma_abono=$abono_sin_cuota_pasada+$monto_abono;
				mysql_query("UPDATE alquiler_renta_detalle set 
															abono_sin_cuota='$suma_abono',
															fecha_abono_sin_cuota='$fecha',
															forma_pago_abono='$forma_pago',
															datos_transferencia_abono='$datos_transferencia',
															procedencia_cheque_abono='$procedencia_cheque',
															datos_cheque_abono='$datos_cheque',
															cheque_banco_depositado_abono='',
															cheque_referencia_depositado_abono='',
															detalles_transferencia_abono='$detalles_transferencia',
															detalles_cheque_abono='$detalles_cheque'
													  where codigo_factura='$codfac' and
													  		estado_cuota='Pendiente' and
													  		cuota_renta='$cuota_renta_pasada'",$conec);	
			
			}
						
		}
	}
	//CICLO PARA PAGAR VARIAS CUOTAS AL MISMO TIEMPO

	$i = 1;
	$j = 1;

	//SI PAGAN 1 ó MAS CUOTAS
	while ($i <= $contador_de_cuotas) {
		
		$sql=mysql_query("SELECT * FROM alquiler_renta_detalle WHERE codigo_factura='$codfac' ",$conec);
		$dato=mysql_fetch_array($sql);
		$nfila=mysql_num_rows($sql);

	//Consulta de la cuota pasada
		$cuota_renta_pasada=$dato['cuota_renta'];
		$fecha_cuota_pagada_pasada=$dato['fecha_cuota_pagada'];
		$hora_cuota_pagada_pasada=$dato['hora_cuota_pagada'];
		$monto_cuota_pasada=$dato['monto_cuota'];
		$moneda_monto_cuota_pasada=$dato['moneda_monto_cuota'];
		$forma_pago_pasada=$dato['forma_pago'];
		$datos_transferencia_pasada=$dato['datos_transferencia'];
		$procedencia_cheque_pasada=$dato['procedencia_cheque'];
		$datos_cheque_pasada=$dato['datos_cheque'];
		$cheque_banco_depositado_pasada=$dato['cheque_banco_depositado'];
		$cheque_referencia_depositado_pasada=$dato['cheque_referencia_depositado'];
		$detalles_transferencia_pasada=$dato['detalles_transferencia'];
		$detalles_cheque_pasada=$dato['detalles_cheque'];
		$monto_abono_pasada=$dato['monto_abono'];
		$abono_sin_cuota_pasada=$dato['abono_sin_cuota'];
		$fecha_abono_sin_cuota_pasada=$dato['fecha_abono_sin_cuota'];
		$forma_pago_abono_pasada=$dato['forma_pago_abono'];
		$datos_transferencia_abono_pasada=$dato['datos_transferencia_abono'];
		$procedencia_cheque_abono_pasada=$dato['procedencia_cheque_abono'];
		$datos_cheque_abono_pasada=$dato['datos_cheque_abono'];
		$cheque_banco_depositado_abono_pasada=$dato['cheque_banco_depositado_abono'];
		$cheque_referencia_depositado_abono_pasada=$dato['cheque_referencia_depositado_abono'];
		$detalles_transferencia_abono_pasada=$dato['detalles_transferencia_abono'];
		$detalles_cheque_abono_pasada=$dato['detalles_cheque_abono'];
	//Fin de la consulta de la cuota pasada

		if ($datos_transferencia_pasada==NULL) {
			$datos_transferencia_pasada='';
		}
		if ($datos_cheque_pasada==NULL) {
			$datos_cheque_pasada='';
		}
		
		//SI VA A PAGAR UNA CUOTA Y HAY UN ABONO (abono sin cuota) DE DICHA CUOTA
		if ($abono_sin_cuota_pasada>0 and $monto_cuota_pasada==0) {
			mysql_query("UPDATE alquiler_renta_detalle set 
															
															fecha_cuota_pagada='$fecha',
															hora_cuota_pagada='$hora',
															forma_pago='$forma_pago',
															monto_abono='$monto_abono',
															monto_cuota='$monto_cuota',
															datos_transferencia='$datos_transferencia',
															procedencia_cheque='$procedencia_cheque',
															datos_cheque='$datos_cheque',
															cheque_banco_depositado='',
															cheque_referencia_depositado='',
															detalles_transferencia='$detalles_transferencia',
															detalles_cheque='$detalles_cheque'

															

													  where codigo_factura='$codfac' and
													  		estado_cuota='Pendiente' and
													  		cuota_renta='$cuota_renta_pasada'",$conec);		
													  $prueba= "AQUIIIIIIIIIIII";				
		} else { //SI VAN A PAGAR UNA CUOTA SIN ANTES HABER REALIZADO UN ABONO_SIN_CUOTA...

			if (!$nfila) {
				$cuota_renta=1;
				mysql_query("INSERT INTO alquiler_renta_detalle values ('$codfac','$codigo_inmueble','$cuota_renta','$fecha','$hora','Pendiente','$monto_cuota','$moneda_precio_inmueble','$forma_pago','$datos_transferencia','$procedencia_cheque','$datos_cheque','','','$detalles_transferencia','$detalles_cheque','$monto_abono','','','','','','','','','','')",$conec);
			} else {
				if ($abono_sin_cuota_pasada>0 and $dato['estado_cuota']=='Pendiente' and $monto_cuota_pasada==0) {
					$total_cuota_y_abono=$monto_cuota+$monto_abono_pasada;
					if ($cuota_renta_pasada==NULL) {
						$cuota_renta_pasada_abono=1;
					}
					mysql_query("UPDATE alquiler_renta_detalle set forma_pago='$forma_pago', cuota_renta='$cuota_renta_pasada_abono', fecha_cuota_pagada='$fecha', hora_cuota_pagada='$hora',monto_cuota='$total_cuota_y_abono',datos_transferencia='$datos_transferencia',procedencia_cheque='$procedencia_cheque',datos_cheque='$datos_cheque',cheque_banco_depositado='',cheque_referencia_depositado='', monto_abono='$monto_abono_pasada',abono_sin_cuota='$abono_sin_cuota_pasada', detalles_transferencia='$detalles_transferencia',detalles_cheque='$detalles_cheque' where codigo_factura='$codfac' and estado_cuota='Pendiente'",$conec);

					$prueba= "AQUIIIIIIIIIIII 222222222222222222";				
				} else {
					$cuota_renta_suma=$cuota_renta_pasada+$j;
					
					if ($hora_cuota_pagada_pasada==$hora) {
						$monto_cuota_pasada=0;
						$moneda_monto_cuota_pasada="";
						$monto_abono_pasada=0;
						$detalles_cheque_pasada="";
						$detalles_transferencia_pasada="";
						$procedencia_cheque_pasada="";
						$datos_cheque_pasada="";
						$datos_transferencia_pasada="";
					}

					mysql_query("UPDATE alquiler_renta_detalle set forma_pago='$forma_pago', cuota_renta='$cuota_renta_suma', fecha_cuota_pagada='$fecha', hora_cuota_pagada='$hora',monto_cuota='$monto_cuota',datos_transferencia='$datos_transferencia',procedencia_cheque='$procedencia_cheque',datos_cheque='$datos_cheque',cheque_banco_depositado='',cheque_referencia_depositado='', monto_abono='$monto_abono', detalles_transferencia='$detalles_transferencia',detalles_cheque='$detalles_cheque', abono_sin_cuota='', fecha_abono_sin_cuota='',	forma_pago_abono='',datos_transferencia_abono='', procedencia_cheque_abono='', datos_cheque_abono='', cheque_banco_depositado_abono='', cheque_referencia_depositado_abono='', detalles_transferencia_abono='',	detalles_cheque_abono='' where codigo_factura='$codfac' and estado_cuota='Pendiente'",$conec);
					//insertar cuota anterior
					mysql_query("INSERT INTO alquiler_renta_detalle values ('$codfac','$codigo_inmueble','$cuota_renta_pasada','$fecha_cuota_pagada_pasada','$hora_cuota_pagada_pasada','Pagado','$monto_cuota_pasada','$moneda_monto_cuota_pasada','$forma_pago_pasada','$datos_transferencia_pasada','$procedencia_cheque_pasada','$datos_cheque_pasada','$cheque_banco_depositado_pasada','$cheque_referencia_depositado_pasada','$detalles_transferencia_pasada','$detalles_cheque_pasada','$monto_abono_pasada','$abono_sin_cuota_pasada','$fecha_abono_sin_cuota_pasada','$forma_pago_abono_pasada','$datos_transferencia_abono_pasada','$procedencia_cheque_abono_pasada','$datos_cheque_abono_pasada','$cheque_banco_depositado_abono_pasada','$cheque_referencia_depositado_abono_pasada','$detalles_transferencia_abono_pasada','$detalles_cheque_abono_pasada')",$conec);

					$prueba= "AQUIIIIIIIIIIII ooooooooooooooooooooooo".$cuota_renta_pasada;				
				}
			}
		} //Cierre del if $abono_sin_cuota_pasada>0
		$i++;

	}
	
	$sqlerror=mysql_error($conec);
	if(!empty($sqlerror)) { ?>
		<script language="javascript">alert("No se pudo pagar la cuota");window.location="MostrarInmueblesOcupados.php?codigo_inmueble=<?php echo $codigo_inmueble; ?>";</script>
	<?php } else { 
				if ($atras=='RentasPorCobrar') { ?>
					<script type="text/javascript">alert("Cuota Pagada");window.location="MostrarInmueblesOcupados.php?codigo_inmueble=<?php echo $codigo_inmueble; ?>&atras=RentasPorCobrar";</script>
				<?php } else if ($atras=='ContratosPorVencer') { ?>
					<script type="text/javascript">alert("Cuota Pagada");window.location="MostrarInmueblesOcupados.php?codigo_inmueble=<?php echo $codigo_inmueble; ?>&atras=ContratosPorVencer";</script>
				<?php } else { ?>
					<script type="text/javascript">alert("Cuota Pagada");window.location="MostrarInmueblesOcupados.php?codigo_inmueble=<?php echo $codigo_inmueble; ?>";</script>
				<?php }
		?>
		
	<?php } ?>
</body>
</html>