<?php 
	session_start();
	if($_SESSION['TierraAlta_TipoMostrar']==NULL){
		header("location: ../index.php");  
	}else if($_SESSION['TierraAlta_TipoMostrar']=='DEPOSITARIO'){
		header("location: ../DEPOSITARIO/index.php");  
	}else if($_SESSION['TierraAlta_TipoMostrar']=='ADMIN_INVENTARIO'){
		header("location: ../ADMINISTRADOR/index.php");
	}
include("../Conexion.php");
$conec = Conectarse();

$codfac=$_REQUEST["codigo_factura"];
$codigo_inmueble=$_REQUEST['codigo_inmueble'];
$atras=$_REQUEST["atras"];

$query = "DELETE from alquiler_renta where codigo_factura = '$codfac' and estado_contrato='Vigente'"; 
$result = mysql_query($query);

$query_detalle = "DELETE from alquiler_renta_detalle where codigo_factura = '$codfac'"; 
$result_detalle = mysql_query($query_detalle);

$query_inmueble = "UPDATE alquiler_inmueble set estado_inmueble='Disponible' where codigo_inmueble='$codigo_inmueble'"; 
$result_inmueble = mysql_query($query_inmueble);

if ($atras=='InmueblesOcupados') {
	$link="InmueblesOcupados.php";
}

if ($result) {
	?>
	<script language="javascript">alert("Contrato Eliminado");window.location="<?php echo $link; ?>";</script>
	<?php 
} else {
	?>
	<script language="javascript">alert("No es posible eliminar el Contrato");window.location="<?php echo $link; ?>";</script>
	<?php 
}

 ?>