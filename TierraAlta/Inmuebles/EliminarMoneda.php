<?php 
include("../Conexion.php");
$conex = Conectarse();

$nombre_moneda=$_GET["nombre_moneda"];

$query = "DELETE from alquiler_moneda where nombre_moneda = '$nombre_moneda'"; 
$result = mysql_query($query);

if ($result) {
	?>
	<script language="javascript">alert("Moneda Eliminada");window.location="ConsultarMoneda.php";</script>
	<?php 
} else {
	?>
	<script language="javascript">alert("No es posible eliminar la moneda");window.location="ConsultarMoneda.php";</script>
	<?php 
}

 ?>