<?php session_start();
	include("../Conexion.php");
	$conec=Conectarse();
	if(!$conec) { ?>
		<meta charset="utf-8">
		<script language="javascript"> alert("ERROR: Falla en la Conexión Con el Servidor");</script>
	<?php exit(); }

	$codigo_cc=$_POST["codigo_cc"];
	$nombre=$_POST["txtnombre"];
	$direccion=$_POST["txtdireccion"];
	$pisos_cc=$_POST["pisos_cc"];
	$cantidad_locales=$_POST['cantidad_locales_cc'];
	$telefono1=$_POST["txttelefono1"];
	$telefono2=$_POST["txttelefono2"];
	
	$id=$_POST["hidid"];
	if($id==NULL) {
	$sql=mysql_query("SELECT codigo_cc FROM alquiler_cc WHERE codigo_cc='$codigo_cc'",$conec);
	$nfila=mysql_num_rows($sql);
	if($nfila>0) { ?>
	<script language="javascript">alert("Ya existe el Centro Comercial");window.location="ConsultaCentroComercial.php";</script>
	<?php exit(); }
	mysql_query("INSERT INTO alquiler_cc VALUES ('$id','$codigo_cc','$nombre','$direccion','$pisos_cc','$cantidad_locales','$telefono1','$telefono2')",$conec);
	$sqlerror=mysql_error($conec);
	if(!empty($sqlerror)) { ?>
	<script language="javascript">alert("No se pudo registrar el Centro Comercial");window.location="ConsultaCentroComercial.php";</script>
	<?php }
	else { ?>
	<script type="text/javascript">alert("Centro Comercial Registrado");window.location="ConsultaCentroComercial.php";</script>
	<?php } }
	else 
	{
	$sql=mysql_query("SELECT codigo_cc FROM alquiler_cc WHERE id_cc<>'$id' and codigo_cc='$codigo_cc'",$conec);
	$nfila=mysql_num_rows($sql);
	if($nfila>0) { ?>
	<script language="javascript">alert("Ya existe otro Centro Comercial con el mismo codigo");window.location="ConsultaCentroComercial.php";</script>
	<?php exit(); }
	$sql=mysql_query("SELECT codigo_cc FROM alquiler_cc WHERE id_cc='$id'",$conec);
	$dato=mysql_fetch_array($sql);
	mysql_query("UPDATE alquiler_cc SET codigo_cc='$codigo_cc',nombre_cc='$nombre',direccion_cc='$direccion',cantidad_pisos_cc='$pisos_cc',cantidad_locales_cc='$cantidad_locales',telefono1_cc='$telefono1',telefono2_cc='$telefono2' WHERE id_cc='$id'",$conec);
	if(!($dato["codigo_cc"]==$codigo_cc))
		//para hacer el despacho
	//mysql_query("UPDATE ventas SET codigo_cc='$codigo_cc' WHERE codigo_cc='".$dato['codigo_cc']."'",$conec);
	$sqlerror=mysql_error($conec);
	if(!empty($sqlerror)) { ?>
	<script language="javascript">alert("No se pudo actualizar el Centro Comercial");window.location="ConsultaCentroComercial.php";</script>
	<?php }
	else { ?>
	<script type="text/javascript">alert("Centro Comercial Actualizado");window.location="ConsultaCentroComercial.php";</script>
<?php  }  } ?>
</body>
</html>