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
	$hora = date('H:i', $timestamp);

	$sql=mysql_query("SELECT * FROM alquiler_renta_detalle WHERE codigo_factura='$codfac'",$conec);
	$dato=mysql_fetch_array($sql);
	$nfila=mysql_num_rows($sql);
	$datos_transferencia_pasada=$dato['datos_transferencia'];
	$datos_cheque_pasada=$dato['datos_cheque'];
	$forma_pago_pasada=$dato['forma_pago'];
	$monto_cuota_pasada=$dato['monto_cuota'];
	$moneda_monto_cuota_pasada=$dato['moneda_monto_cuota'];
	$cheque_referencia_depositado_pasada=$dato['cheque_referencia_depositado'];
	$cheque_banco_depositado_pasada=$dato['cheque_banco_depositado'];
	$procedencia_cheque_pasada=$dato['procedencia_cheque'];
	if ($datos_transferencia_pasada==NULL) {
		$datos_transferencia_pasada='';
	}
	if ($datos_cheque_pasada==NULL) {
		$datos_cheque_pasada='';
	}
	if ($dato['codigo_factura']==NULL) {
		$cuota_renta=1;
		mysql_query("INSERT INTO alquiler_renta_detalle values ('$codfac','$codigo_inmueble','$cuota_renta','$fecha','$hora','Pendiente','$monto_cuota','$moneda_precio_inmueble','$forma_pago','$datos_transferencia','$procedencia_cheque','$datos_cheque','','')",$conec);
	} else {
		$cuota_renta_suma=$cuota_renta+1;
		
			mysql_query("UPDATE alquiler_renta_detalle set forma_pago='$forma_pago', cuota_renta='$cuota_renta_suma', fecha_cuota_pagada='$fecha', hora_cuota_pagada='$hora',monto_cuota='$monto_cuota',datos_transferencia='$datos_transferencia',procedencia_cheque='$procedencia_cheque',datos_cheque='$datos_cheque',cheque_banco_depositado='',cheque_referencia_depositado='' where codigo_inmueble='$codigo_inmueble' and codigo_factura='$codfac' and cuota_renta  = '$cuota_renta'",$conec);
		
			mysql_query("INSERT INTO alquiler_renta_detalle values ('$codfac','$codigo_inmueble','$cuota_renta','$fecha_cuota_pagada','$hora_cuota_pagada','Pagado','$monto_cuota_pasada','$moneda_monto_cuota_pasada','$forma_pago_pasada','$datos_transferencia_pasada','$procedencia_cheque_pasada','$datos_cheque_pasada','$cheque_banco_depositado_pasada','$cheque_referencia_depositado_pasada')",$conec);
		
		
	}
	$sqlerror=mysql_error($conec);
	if(!empty($sqlerror)) { ?>
		<script language="javascript">alert("No se pudo asignar el inmueble");window.location="MostrarInmueblesOcupados.php?codigo_inmueble=<?php echo $codigo_inmueble; ?>";</script>
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