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
		$sql=mysql_query("SELECT codigo_inmueble,precio_inmueble FROM alquiler_inmueble WHERE id_inmueble='$id'",$conec);
		$dato=mysql_fetch_array($sql);
		$precio_inmueble_viejo=$dato['precio_inmueble'];
		//-----------------------------------------------------------------//
		//CONSULTA DEL ESTADO DE PAGO DEL CONTRATO (SOLVENTE ó VENCIDO)
		$sql_renta=mysql_query("SELECT * from alquiler_renta WHERE codigo_inmueble='$codigo_inmueble' and estado_contrato='Vigente'",$conec);
		$dato_renta=mysql_fetch_array($sql_renta);
		$codfac=$dato_renta['codigo_factura'];
		$rif_inquilino=$dato_renta['rif_inquilino'];

		$sql_detalle=mysql_query("SELECT * from alquiler_renta_detalle WHERE codigo_factura='$codfac' and estado_cuota='Pendiente'",$conec);
		$dato_detalle=mysql_fetch_array($sql_detalle);


		$fecha0 = $dato_renta['fecha_contrato'];
		$timestamp = strtotime($fecha0);
		$fecha= date('d/m/Y', $timestamp);

		$fecha_con_mes_muerto0 = $dato_renta['fecha_contrato_con_mes_muerto'];
		$timestamp2 = strtotime($fecha_con_mes_muerto0);
		$fecha_con_mes_muerto= date('d/m/Y', $timestamp2);

		$hora = $dato_renta['hora_contrato']; 
		$horaAM_PM =date('h:i:sa', strtotime($hora));

		//FUNCION PARA SUMAR MES A LA FECHA
		function addMonths($date,$months) {
		  $orig_day = $date->format("d");
		  $date->modify("+".$months." months");
		  while ($date->format("d")<$orig_day && $date->format("d")<5) {
		    $date->modify("-1 day");
		  }
		}
		if ($dato_detalle['cuota_renta']==NULL) {
			$cuota_renta=0;
		} else {
			$cuota_renta=$dato_detalle['cuota_renta'];
		}
		$cuotas_pendientes=$dato_renta['tiempo_alquiler']-$cuota_renta;

		$nuevafecha_calculo1 =  strtotime ($fecha_con_mes_muerto0);
		$nuevafecha_calculo10 = date ( 'Y-m-d' , $nuevafecha_calculo1 );

		$d = new DateTime($nuevafecha_calculo10);
		addmonths($d,$cuota_renta);
		$nuevafecha_d= $d->format("Y-m-d");
		$nuevafecha_d1=$d->format("d/m/Y");

		date_default_timezone_set('America/Caracas');
		$fecha_diario=date("Y-m-d",time());
		$timestamp_diario = strtotime($fecha_diario);

		if (($cuotas_pendientes)==0){
			$estado_pago='Solvente';
			echo "<span class='span_estado_cuota solvente'>".$estado_pago."</span>";
		} else if ($fecha_diario>=$nuevafecha_d) {
			$estado_pago='Vencida';
			echo "<span class='span_estado_cuota vencido'>".$estado_pago."</span>";
		} else {
			$estado_pago='Solvente';
			echo "<span class='span_estado_cuota solvente'>".$estado_pago."</span>";
			mysql_query("INSERT INTO alquiler_renta_detalle values ('$codfac','$codigo_inmueble','$cuota_renta_pasada','','','Pendiente','$precio_inmueble_viejo','$moneda_monto_cuota_pasada','$forma_pago_pasada','$datos_transferencia_pasada','$procedencia_cheque_pasada','$datos_cheque_pasada','$cheque_banco_depositado_pasada','$cheque_referencia_depositado_pasada','$monto_abono_pasada','$detalles_transferencia_pasada','$detalles_cheque_pasada')",$conec);
		}

		//-----------------------------------------------------------------//

		//MODIFICAR INMUEBLE
		mysql_query("UPDATE alquiler_inmueble SET codigo_inmueble='$codigo_inmueble',tipo_inmueble='$tipo_inmueble',tipo_residencia_inmueble='$tipo_residencia_inmueble',codigo_cc='$codigo_cc',pisos_cc='$pisos_cc',direccion_inmueble='$direccion',precio_inmueble='$precio_inmueble',moneda_precio_inmueble='$moneda_precio_inmueble',iva_inmueble='$iva_inmueble',descripcion_inmueble='$descripcion' WHERE id_inmueble='$id'",$conec);
		/*
		if(!($dato["codigo_inmueble"]==$codigo_inmueble))
		//para hacer el despacho
		//mysql_query("UPDATE ventas SET codigo_inmueble='$codigo_inmueble' WHERE codigo_inmueble='".$dato['codigo_inmueble']."'",$conec);
		
		$sqlerror=mysql_error($conec);
		if(!empty($sqlerror)) { ?>
			<script language="javascript">alert("No se pudo actualizar el inmueble");window.location="Consultainmuebles.php";</script>
		<?php } else { ?>
			<script type="text/javascript">alert("Inmueble Actualizado");window.location="Consultainmuebles.php";</script>
		<?php  }
		*/
	} ?>
</body>
</html>