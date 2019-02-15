<?php session_start();
	include("../Conexion.php");
	$conec=Conectarse();
	if(!$conec) { ?>
		<meta charset="utf-8">
		<script language="javascript"> alert("ERROR: Falla en la Conexión Con el Servidor");</script>
	<?php exit(); }
	
	$nombre_moneda=$_POST["nombre_moneda"];
	$id=$_POST["hidid"];
	if($id==NULL) {
		$sql=mysql_query("SELECT nombre_moneda FROM alquiler_moneda WHERE nombre_moneda='$nombre_moneda'",$conec);
		$nfila=mysql_num_rows($sql);
		if($nfila>0) { ?>
			<script language="javascript">alert("Ya existe esta moneda.");window.location="ConsultarMoneda.php";</script>
		<?php exit(); }
		mysql_query("INSERT into alquiler_moneda values ('$id','$nombre_moneda')",$conec);
		$sqlerror=mysql_error($conec);
		if(!empty($sqlerror)) { ?>
			<script language="javascript">alert("No es posible registrar la moneda");window.location="ConsultarMoneda.php";</script>
		<?php } else { ?>
			<script type="text/javascript">alert("Moneda Registrada");window.location="ConsultarMoneda.php";</script>
		<?php } 
	} else {
		$sql=mysql_query("SELECT nombre_moneda FROM alquiler_moneda WHERE id_moneda<>'$id' and nombre_moneda='$nombre_moneda'",$conec);
		$nfila=mysql_num_rows($sql);
		if ($nfila>0) { ?>
			<script language="javascript">alert("Existe otra moneda con el mismo nombre.");window.location="ConsultarMoneda.php";</script>
		<?php exit(); }
		
		$sql=mysql_query("SELECT nombre_moneda FROM alquiler_moneda WHERE id_moneda='$id'",$conec);
		$dato=mysql_fetch_array($sql);
		mysql_query("UPDATE alquiler_moneda SET nombre_moneda='$nombre_moneda' WHERE id_moneda='$id'",$conec);
		if(!($dato["nombre_moneda"]==$nombre_moneda)) {
			if(!empty($sqlerror)) { ?>
				<script language="javascript">alert("No es posible actualizar la moneda");window.location="ConsultarMoneda.php";</script>
			<?php } else { ?>
				<script type="text/javascript">alert("Moneda Actualizada");window.location="ConsultarMoneda.php";</script>
			<?php  }
		} else { ?>
				<script type="text/javascript">alert("Moneda Actualizada");window.location="ConsultarMoneda.php";</script>
		<?php }
	} ?>
</body>
</html>