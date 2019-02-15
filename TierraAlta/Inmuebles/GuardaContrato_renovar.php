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

	$codigo_inmueble=$_POST['codigo_inmueble'];
	$rif_inquilino=$_POST['rif_inquilino'];
	$fecha_contrato=$_POST['fecha_contrato'];
	$tiempo_alquiler=$_POST['tiempo_alquiler'];
	$periodo_alquiler=$_POST['periodo_alquiler'];
	$monto_cuota=$_POST['monto_cuota'];
	$iva_precio=$_POST['iva_precio'];
	$forma_pago=$_POST['forma_pago'];
	$moneda_precio_inmueble=$_POST['moneda_precio_inmueble'];
	$meses_deposito=$_POST['meses_deposito'];
	$total_deposito=$meses_deposito*$iva_precio;
	$gastos_administrativos=$_POST['gastos_administrativos'];
	$gastos_legales=$_POST['gastos_legales'];
	$moneda_gastos_legales=$_POST['moneda_gastos_legales'];
	$mes_muerto=$_POST['mes_muerto'];
	$estado_contrato=$_POST['estado_contrato'];

	//variable PARA CAMBIAR ESTADO DE CONTRATO ANTERIOR
	$codigo_factura_vieja=$_POST['codigo_factura_vieja'];	

	if ($mes_muerto==NULL) {
		$mes_muerto=0;
	}

	date_default_timezone_set('America/Caracas');
	//$fecha=date("Y-m-d",time());
	$hora=date("H:i:s",time());
	$timestamp = strtotime($hora);
	$hora = date('H:i', $timestamp);

	
				
	$fecha_contrato_con_mes_muerto = strtotime ( '+'.$mes_muerto.' month' , strtotime ( $fecha_contrato ) ) ;
	$fecha_contrato_con_mes_muerto = date ( 'Y-m-j' , $fecha_contrato_con_mes_muerto );

			
	mysql_query("UPDATE alquiler_renta set estado_contrato='Terminado' where codigo_inmueble='$codigo_inmueble' and codigo_factura='$codigo_factura_vieja'",$conec);

	mysql_query("UPDATE alquiler_inmueble set estado_inmueble='Ocupado' where codigo_inmueble='$codigo_inmueble' and estado_inmueble='Disponible'",$conec);
	mysql_query("INSERT INTO alquiler_renta values ('id','$codigo_inmueble','$rif_inquilino','$fecha_contrato','$fecha_contrato_con_mes_muerto','$hora','$tiempo_alquiler','$periodo_alquiler','$meses_deposito','$total_deposito','$gastos_legales','$moneda_gastos_legales','$gastos_administrativos','$mes_muerto','$estado_contrato')",$conec);
	$cuota_renta=1;
	$cons=mysql_query("SELECT codigo_factura FROM alquiler_renta WHERE codigo_inmueble='$codigo_inmueble' and rif_inquilino='$rif_inquilino'",$conec);
	$dato=mysql_fetch_array($cons);
	$codfac=$dato['codigo_factura'];
		
	
	$sqlerror=mysql_error($conec);
	if(!empty($sqlerror)) { ?>
		<script language="javascript">alert("No se pudo asignar el inmueble");window.location="Index.php";</script>
	<?php } else { ?>
		<script type="text/javascript">alert("Inmueble Asignado");window.location="Index.php";</script>
	<?php } ?>
</body>
</html>