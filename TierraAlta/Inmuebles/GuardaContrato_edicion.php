<?php session_start();
	include("../Conexion.php");
	$conec=Conectarse();
	if(!$conec) { ?>
		<meta charset="utf-8">
		<script language="javascript"> alert("ERROR: Falla en la Conexión Con el Servidor");</script>
	<?php exit(); }

	$codigo_inmueble=$_POST["codigo_inmueble"];
	$rif_inquilino=$_POST["rif_inquilino"];
	$fecha_contrato=$_POST["fecha_contrato"];
	$tiempo_alquiler=$_POST['tiempo_alquiler'];
	$periodo_alquiler=$_POST["periodo_alquiler"];
	$meses_deposito=$_POST['meses_deposito'];
	$total_deposito=$meses_deposito*$iva_precio;
	$gastos_administrativos=$_POST["gastos_administrativos"];
	$moneda_gastos_administrativos=$_POST['moneda_gastos_administrativos'];
	$gastos_legales=$_POST["gastos_legales"];
	$moneda_gastos_legales=$_POST["moneda_gastos_legales"];
	$mes_muerto=$_POST["mes_muerto"];
	$atras=$_POST["atras"];
	$codfac=$_POST['codigo_factura'];

	//AGREGAR MES MUERTO A LA FECHA
	function addMonths($date,$months) {
	  $orig_day = $date->format("d");
	  $date->modify("+".$months." months");
	  while ($date->format("d")<$orig_day && $date->format("d")<5) {
	    $date->modify("-1 day");
	  }
	}

	$d = new DateTime($fecha_contrato);
	addmonths($d,$mes_muerto);
	$fecha_contrato_con_mes_muerto=$d->format("Y-m-j");	
	
	mysql_query("UPDATE alquiler_renta SET rif_inquilino='$rif_inquilino',fecha_contrato='$fecha_contrato',fecha_contrato_con_mes_muerto='$fecha_contrato_con_mes_muerto',tiempo_alquiler='$tiempo_alquiler',periodo_alquiler='$periodo_alquiler',meses_deposito='$meses_deposito',total_deposito='$total_deposito',gastos_administrativos='$gastos_administrativos',moneda_gastos_administrativos='$moneda_gastos_administrativos',gastos_legales='$gastos_legales',moneda_gastos_legales='$moneda_gastos_legales',mes_muerto='$mes_muerto' WHERE codigo_factura='$codfac'",$conec);
	
	if ($atras=='InmueblesOcupados') {
		$link="InmueblesOcupados.php";
	}

	if(!empty($sqlerror)) { ?>
		<script language="javascript">alert("No se pudo actualizar el Contrato");window.location="<?php echo $link; ?>";</script>
	<?php } else { ?>
		<script type="text/javascript">alert("Contrato Actualizado");window.location="<?php echo $link; ?>";</script>
	<?php } 
?>