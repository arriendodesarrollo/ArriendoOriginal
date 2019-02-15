<?php session_start();
	include("../Conexion.php");
	$conec=Conectarse();
	if(!$conec) { ?>
		<meta charset="utf-8">
		<script language="javascript"> alert("ERROR: Falla en la Conexión Con el Servidor");</script>
	<?php exit(); }

	$rif_inquilino=$_POST["rif_inquilino"];
	$nombre=$_POST["txtnombre"];
	$telefono1=$_POST["txttelefono1"];
	$telefono2=$_POST["txttelefono2"];
	$correo=$_POST["txtcorreo"];
	$direccion=$_POST["txtdireccion"];
	$id=$_POST["hidid"];
	if($id==NULL) {
	$sql=mysql_query("SELECT rif_inquilino FROM alquiler_inquilino WHERE rif_inquilino='$rif_inquilino'",$conec);
	$nfila=mysql_num_rows($sql);
	if($nfila>0) { ?>
	<script language="javascript">alert("Ya existe el inquilino");window.location="Consultainquilinos.php";</script>
	<?php exit(); }
	mysql_query("INSERT INTO alquiler_inquilino VALUES ('$id','$rif_inquilino','$nombre','$telefono1','$telefono2','$correo','$direccion')",$conec);
	$sqlerror=mysql_error($conec);
	if(!empty($sqlerror)) { ?>
	<script language="javascript">alert("No se pudo registrar el inquilino");window.location="Consultainquilinos.php";</script>
	<?php }
	else { ?>
	<script type="text/javascript">alert("Inquilino Registrado");window.location="Consultainquilinos.php";</script>
	<?php } }
	else 
	{
	$sql=mysql_query("SELECT rif_inquilino FROM alquiler_inquilino WHERE id_inquilino<>'$id' and rif_inquilino='$rif_inquilino'",$conec);
	$nfila=mysql_num_rows($sql);
	if($nfila>0) { ?>
	<script language="javascript">alert("Ya existe otro inquilino con el mismo numero de cedula");window.location="Consultainquilinos.php";</script>
	<?php exit(); }
	$sql=mysql_query("SELECT rif_inquilino FROM alquiler_inquilino WHERE id_inquilino='$id'",$conec);
	$dato=mysql_fetch_array($sql);
	mysql_query("UPDATE alquiler_inquilino SET rif_inquilino='$rif_inquilino',nombre_inquilino='$nombre',telefono1_inquilino='$telefono1',telefono2_inquilino='$telefono2',correo_inquilino='$correo',direccion_inquilino='$direccion' WHERE id_inquilino='$id'",$conec);
	if(!($dato["rif_inquilino"]==$rif_inquilino))
		//para hacer el despacho
	//mysql_query("UPDATE ventas SET rif_inquilino='$rif_inquilino' WHERE rif_inquilino='".$dato['rif_inquilino']."'",$conec);
	$sqlerror=mysql_error($conec);
	if(!empty($sqlerror)) { ?>
	<script language="javascript">alert("No se pudo actualizar el inquilino");window.location="Consultainquilinos.php";</script>
	<?php }
	else { ?>
	<script type="text/javascript">alert("Inquilino Actualizado");window.location="Consultainquilinos.php";</script>
<?php  }  } ?>
</body>
</html>