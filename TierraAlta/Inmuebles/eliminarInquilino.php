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

$rif_inquilino=$_GET["rif_inquilino"];

$query = "DELETE from alquiler_inquilino where rif_inquilino = '$rif_inquilino'"; 
$result = mysql_query($query);

if ($result) {
	?>
	<script language="javascript">alert("Inquilino Eliminado");window.location="Consultainquilinos.php";</script>
	<?php 
} else {
	?>
	<script language="javascript">alert("No es posible eliminar el inquilino");window.location="Consultainquilinos.php";</script>
	<?php 
}

 ?>