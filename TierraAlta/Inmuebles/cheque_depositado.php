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
	$cheque_banco_depositado=$_POST['cheque_banco_depositado'];
	$cheque_referencia_depositado=$_POST['cheque_referencia_depositado'];
	$codigo_inmueble=$_POST['codigo_inmueble'];
	$cuota_renta=$_POST['cuota_renta'];
	$codfac=$_POST['codigo_factura'];

	//variable para regresar a RentasPorCobrar.php
	$atras=$_POST['atras'];
	

	mysql_query("UPDATE alquiler_renta_detalle set cheque_referencia_depositado='$cheque_referencia_depositado',cheque_banco_depositado='$cheque_banco_depositado' where codigo_factura='$codfac' and cuota_renta='$cuota_renta'",$conec);
	
	$sqlerror=mysql_error($conec);
	if(!empty($sqlerror)) { ?>
		<script language="javascript">alert("No se pudieron asignar los datos del cheque");window.location="MostrarInmueblesOcupados.php?codigo_inmueble=<?php echo $codigo_inmueble; ?>";</script>
	<?php } else { 
				if ($atras=='RentasPorCobrar') { ?>
					<script type="text/javascript">alert("Datos del deposito guardados exitosamente.");window.location="MostrarInmueblesOcupados.php?codigo_inmueble=<?php echo $codigo_inmueble; ?>&atras=RentasPorCobrar";</script>
				<?php } else { ?>
					<script type="text/javascript">alert("Datos del deposito guardados exitosamente.");window.location="MostrarInmueblesOcupados.php?codigo_inmueble=<?php echo $codigo_inmueble; ?>";</script>
					<?php }
		?>
		
	<?php } ?>
</body>
</html>