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
$conex = Conectarse();

$codigo_inmueble=$_GET["codigo_inmueble"];

$query = "DELETE from alquiler_inmueble where codigo_inmueble = '$codigo_inmueble'"; 
$result = mysql_query($query);

if ($result) {
	?>
	<script language="javascript">alert("Inmueble Eliminado");window.location="ConsultaInmuebles.php";</script>
	<?php 
} else {
	?>
	<script language="javascript">alert("No es posible eliminar el Inmueble");window.location="ConsultaInmuebles.php";</script>
	<?php 
}

 ?>