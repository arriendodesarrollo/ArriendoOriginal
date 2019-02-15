<?php 
	$valor = $_POST['valor'];
 
	function obtenerTitulo($valor){
	   	include("../Conexion.php");
		$conec=Conectarse();
		$sql=mysql_query("SELECT * FROM alquiler_cc WHERE codigo_cc='$valor' ",$conec);
		$r=mysql_fetch_array($sql);
		
	   	return $r['direccion_cc'];
	}
	 
	echo obtenerTitulo($valor);

 ?>