<?php
include("clases/conect.php");
$mensaje = $_POST['mensaje'];
$tipo = $_POST['tipo'];

$timestamp = date("Y-m-d H:i:s");

$q = "INSERT INTO mensajes2 values ('','$mensaje','$timestamp','$tipo')";
$res = mysql_query($q) or die (mysql_error());
header("Location: form.php");
?>