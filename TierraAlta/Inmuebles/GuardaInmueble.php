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

	$codigo_inmueble=$_POST["codigo_inmueble"];
	$tipo_inmueble=$_POST["tipo_inmueble"];
	$tipo_residencia_inmueble=$_POST["tipo_residencia_inmueble"];
	$pisos_cc=$_POST["pisos_cc"];
	$precio_inmueble=$_POST["precio_inmueble"];
	$moneda_precio_inmueble=$_POST["moneda_precio_inmueble"];
	$iva_inmueble=$_POST["iva_inmueble"];
	$direccion=$_POST["txtdireccion"];
	$descripcion=$_POST["txtdescripcion"];
	$codigo_cc=$_POST["codigo_cc"];
	$estado_inmueble=$_POST['estado_inmueble'];
	$id=$_POST["hidid"];

	if($id==NULL) {
		$sql=mysql_query("SELECT codigo_inmueble FROM alquiler_inmueble WHERE codigo_inmueble='$codigo_inmueble'",$conec);
		$nfila=mysql_num_rows($sql);
		if($nfila>0) { ?>
			<script language="javascript">alert("Ya existe el inmueble");window.location="Consultainmuebles.php";</script>
			<?php exit();
		}
		mysql_query("INSERT INTO alquiler_inmueble VALUES ('$id','$codigo_inmueble','$tipo_inmueble','$tipo_residencia_inmueble','$precio_inmueble','$moneda_precio_inmueble','$iva_inmueble','$direccion','$descripcion','$codigo_cc','$pisos_cc','$estado_inmueble')",$conec);
		$sqlerror=mysql_error($conec);
		if(!empty($sqlerror)) { ?>
			<script language="javascript">alert("No se pudo registrar el inmueble");window.location="Consultainmuebles.php";</script>
		<?php } else { ?>
			<script type="text/javascript">alert("Inmueble Registrado");window.location="Consultainmuebles.php";</script>
		<?php }
	} else {
		$sql=mysql_query("SELECT codigo_inmueble FROM alquiler_inmueble WHERE id_inmueble<>'$id' and codigo_inmueble='$codigo_inmueble'",$conec);
		$nfila=mysql_num_rows($sql);
		if($nfila>0) { ?>
			<script language="javascript">alert("Ya existe otro inmueble con el mismo codigo");window.location="Consultainmuebles.php";</script>
			<?php exit();
		}
		$sql=mysql_query("SELECT codigo_inmueble FROM alquiler_inmueble WHERE id_inmueble='$id'",$conec);
		$dato=mysql_fetch_array($sql);
		mysql_query("UPDATE alquiler_inmueble SET codigo_inmueble='$codigo_inmueble',tipo_inmueble='$tipo_inmueble',tipo_residencia_inmueble='$tipo_residencia_inmueble',codigo_cc='$codigo_cc',pisos_cc='$pisos_cc',direccion_inmueble='$direccion',precio_inmueble='$precio_inmueble',moneda_precio_inmueble='$moneda_precio_inmueble',iva_inmueble='$iva_inmueble',descripcion_inmueble='$descripcion' WHERE id_inmueble='$id'",$conec);
		if(!($dato["codigo_inmueble"]==$codigo_inmueble))
		//para hacer el despacho
		//mysql_query("UPDATE ventas SET codigo_inmueble='$codigo_inmueble' WHERE codigo_inmueble='".$dato['codigo_inmueble']."'",$conec);
		$sqlerror=mysql_error($conec);
		if(!empty($sqlerror)) { ?>
			<script language="javascript">alert("No se pudo actualizar el inmueble");window.location="Consultainmuebles.php";</script>
		<?php } else { ?>
			<script type="text/javascript">alert("Inmueble Actualizado");window.location="Consultainmuebles.php";</script>
		<?php  }
	} ?>
</body>
</html>