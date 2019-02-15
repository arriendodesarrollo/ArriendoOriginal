<?php 
include("../Conexion.php");
$conex = Conectarse();

$id=$_GET["id_usuario"];

$query = "delete from usuarios where id_usuario = '$id'"; 
$result = mysql_query($query);

if ($result) {
	?>
	<script language="javascript">alert("Usuario Eliminado");window.location="usuarios.php";</script>
	<?php 
} else {
	?>
	<script language="javascript">alert("No es posible eliminar el Usuario");window.location="usuarios.php";</script>
	<?php 
}

 ?>