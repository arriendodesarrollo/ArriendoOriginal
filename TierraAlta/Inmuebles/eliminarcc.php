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

$codigo_cc=$_GET["codigo_cc"];

$query = "DELETE from alquiler_cc where codigo_cc = '$codigo_cc'"; 
$result = mysql_query($query);

if ($result) {
	?>
	<script language="javascript">alert("Centro Comercial Eliminado");window.location="ConsultaCentroComercial.php";</script>
	<?php 
} else {
	?>
	<script language="javascript">alert("No es posible eliminar el Centro Comercial");window.location="ConsultaCentroComercial.php";</script>
	<?php 
}

 ?>