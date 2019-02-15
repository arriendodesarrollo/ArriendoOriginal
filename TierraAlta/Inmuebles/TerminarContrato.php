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
	
	$codigo_inmueble=$_REQUEST['codigo_inmueble'];
	$codfac=$_REQUEST['codigo_factura'];

	mysql_query("UPDATE alquiler_inmueble set estado_inmueble='Disponible' where codigo_inmueble='$codigo_inmueble'",$conec);
	mysql_query("UPDATE alquiler_renta set estado_contrato='Terminado' where codigo_factura='$codfac'",$conec);
	
	$sqlerror=mysql_error($conec);
	if(!empty($sqlerror)) { ?>
		<script language="javascript">alert("Error al Terminar Contrato");window.location="index.php";</script>
	<?php } else { ?>
					<script type="text/javascript">alert("Contrato Terminado");window.location="index.php";</script>
				<?php }
		?>
</body>
</html>