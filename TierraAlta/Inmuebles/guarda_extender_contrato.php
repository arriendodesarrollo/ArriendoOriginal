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
	
	date_default_timezone_set('America/Caracas');
	//$fecha=date("Y-m-d",time());
	$hora=date("H:i:s",time());
	$timestamp = strtotime($hora);
	$hora = date('H:i', $timestamp);

	
		mysql_query("UPDATE alquiler_inmueble set estado_inmueble='Ocupado' where codigo_inmueble='$codigo_inmueble' and estado_inmueble='Disponible'",$conec);
		mysql_query("INSERT INTO alquiler_renta values ('id','$codigo_inmueble','$rif_inquilino','$fecha_contrato','$hora','$tiempo_alquiler','$periodo_alquiler')",$conec);
		$cuota_renta=1;
		$cons=mysql_query("SELECT codigo_factura FROM alquiler_renta WHERE codigo_inmueble='$codigo_inmueble' and rif_inquilino='$rif_inquilino'",$conec);
		$dato=mysql_fetch_array($cons);
		$codfac=$dato['codigo_factura'];
		mysql_query("INSERT INTO alquiler_renta_detalle values ('$codfac','$codigo_inmueble','$cuota_renta','$fecha_contrato','$hora','Pendiente')",$conec);
	
	$sqlerror=mysql_error($conec);
	if(!empty($sqlerror)) { ?>
		<script language="javascript">alert("No se pudo asignar el inmueble");window.location="MostrarInmueblesOcupados.php?codigo_inmueble=<?php echo $codigo_inmueble ?>";</script>
	<?php } else { ?>
		<script type="text/javascript">alert("Inmueble Asignado");window.location="MostrarInmueblesOcupados.php?codigo_inmueble=<?php echo $codigo_inmueble ?>";</script>
	<?php } ?>
</body>
</html>