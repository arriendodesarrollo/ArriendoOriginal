<?php session_start(); 
	include("Cabecera.php");
	if(($_POST) || ($_REQUEST)){
		$busq=$_POST["input_reporte"];	
		$campo=$_POST["tiempo"];
		$moneda=$_POST["moneda"];
		$nombre=$_REQUEST['Nombre'];
		$rif_inquilino=$_REQUEST['rif_inquilino'];

		

		date_default_timezone_set('America/Caracas');
		$ano=date('Y');
		$semana=date('W');
		$mes=date('m');
		$dias=date('t');
		if (!$campo==NULL) {
			$Mensaje="No hay resultados que mostrar";
		}
		if($campo=="Diario"){
			$fechaini=date("Y-m-d");
			$fechafin=date("Y-m-d");
		}
		if($campo=="Semanal"){
			$fechaini=date("Y-m-d",strtotime($ano.'W'.str_pad($semana,2,'0',STR_PAD_LEFT)));
			$fechafin=date("Y-m-d",strtotime($fechaini.'6 day'));
		}
		if($campo=="Mensual"){
			if(($mes==1) || ($mes==3) || ($mes==5) || ($mes==7) || ($mes==8) || ($mes==10) || ($mes==12)) {
				$fechaini=date("Y-m-d",strtotime("01-".$mes."-".$ano));
				$fechafin=date("Y-m-d",strtotime("31-".$mes."-".$ano));
			}
			if(($mes==4) || ($mes==6) || ($mes==9) || ($mes==11)) {
				$fechaini=date("Y-m-d",strtotime("01-".$mes."-".$ano));
				$fechafin=date("Y-m-d",strtotime("30-".$mes."-".$ano));
			}
			if($mes==2) {
				if (((fmod($ano,4)==0) and (fmod($ano,100)!=0)) or (fmod($ano,400)==0)) {
					$fechaini=date("Y-m-d",strtotime("01-02-".$ano));
					$fechafin=date("Y-m-d",strtotime("29-02-".$ano));
				} else {
					$fechaini=date("Y-m-d",strtotime("01-02-".$ano));
					$fechafin=date("Y-m-d",strtotime("28-02-".$ano));
				}
			}
		}

		if($campo=="Semestral"){
			if(($mes>1) && ($mes<7)){
				$fechaini=date("Y-m-d",strtotime("01-01-".$ano));
				$fechafin=date("Y-m-d",strtotime("30-06-".$ano));
			} else if(($mes>6) && ($mes<13)){
				$fechaini=date("Y-m-d",strtotime("01-07-".$ano));
				$fechafin=date("Y-m-d",strtotime("31-12-".$ano));
			}
		}

		if($campo=="Anual"){
			$fechaini=date("Y-m-d",strtotime("01-01-".$ano));
			$fechafin=date("Y-m-d",strtotime("31-12-".$ano));
		}
		if($campo=="Rango"){
			$fechaini=date("Y-m-d",strtotime($_POST["txtfechaini"]));
			$fechafin=date("Y-m-d",strtotime($_POST["txtfechafin"]));
		}
		if($busq=="pagos"){
			$cons=mysql_query("SELECT * FROM alquiler_renta_detalle WHERE fecha_cuota_pagada>='$fechaini' AND fecha_cuota_pagada<='$fechafin' and moneda_monto_cuota='$moneda' and monto_cuota>0 ORDER BY (fecha_cuota_pagada and hora_cuota_pagada) ASC",$conec);
			$dato=mysql_fetch_array($cons);
			$nfila=mysql_num_rows($cons);

			
			
			
		}
		//PENDIENTE
		if(!empty($nombre)){

		
			$cons_renta=mysql_query("SELECT codigo_factura FROM alquiler_renta WHERE rif_inquilino='$rif_inquilino' ",$conec);
			$dato_renta=mysql_fetch_array($cons_renta);
			$nfila_renta=mysql_num_rows($cons_renta);
			if ($nfila_renta) {
				# code...
			}
		}	
	}
	
	if (isset($_POST['Buscar'])) { ?>
		<script type="text/javascript">
			$(document).ready(function(){
				$(".form_reporte").hide();				
			});
		</script>
	
	<?php }
?>
<link rel="stylesheet" type="text/css" href="../css/estilos_archivos.css">
<style type="text/css">
	.td_total{
		text-align: left !important;
		font-weight: bold;
		font-size: 20px;
	}
	.cuadroPrincipal{
		display: none !important;
	}
	.tituloSpan{
		position: absolute;
		left: 22%;
		margin-top: 8%;
		padding: 7px 30px;
		font-weight: bold;
		font-size: 30px;
		color: rgba(0,0,0,0.5);
	}
	.titulo_rango_fechas{
		border-top: 1px solid rgba(0,0,0,0.2);
		margin-top: 5px;
		font-size: 20px;
		display: block;
		text-align: center;

	}
	.titulo_rango_fechas1{
		position: absolute;
		left: 24.2%;
		top: 23.8%;
		border-top: 1px solid rgba(0,0,0,0.1);
		text-align: center;
		width: 20%;
		font-size: 20px;
		color: rgba(0,0,0,0.5) !important;
		font-weight: bold;
	}
	
	.tablaArticulos{
		background: white;
		border-radius:3px;
		border-collapse: collapse;
		height: auto;
		padding:5px;
		box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
		width: 76%;
		float: right;
		margin-right: 52%;
		margin-top: 15%;
	}
	
	.BotonImprimir, .BotonRegresar{
	    display: inline-block;
	    text-decoration: none;
	    position: absolute;
	    color: white;
	    font-size: 17px;
	    box-sizing: border-box;
	    padding: 10px;
	    width: 10%;
	    top: 17%;
	    text-align: center;
	    cursor: pointer;
	    font-weight: bold;
	}
	.BotonImprimir{
		background: #4cb1ff;
		border: 2px solid #4cb1ff;
		left: 55%;
	}
	.BotonRegresar{
		border: 2px solid rgba(255,0,0,0.4);
		background: transparent;
		color: rgba(255,0,0,0.4);
		right: 3%;
	}
	.BotonImprimir:hover, .BotonRegresar:hover{
	    -webkit-box-shadow: 1px 1px 10px 2px rgba(0,0,0,0.3);
	       -moz-box-shadow: 1px 1px 10px 2px rgba(0,0,0,0.3);
	  			box-shadow: 1px 1px 10px 2px rgba(0,0,0,0.3);
	}

	.form_reporte{
		margin-top: 20%;
		width: 73%;
		position: absolute;
		right: 0;
		margin-right: 3%;
		border: 1px solid rgba(0,0,0,0.2);
		padding: 0px 10px 10px 10px;
		text-align: center;

		-webkit-box-shadow: 1px 1px 10px 2px rgba(0,0,0,0.3);
	       -moz-box-shadow: 1px 1px 10px 2px rgba(0,0,0,0.3);
	  		    box-shadow: 1px 1px 10px 2px rgba(0,0,0,0.3);
	}
	.margen_form{
		top: -11%;
		z-index: 1;
		background: white;
	}
	
	.form_reporte h2{
		color: rgba(0,0,0,0.9);
	}
	.form_reporte select{
		border: 1px solid rgba(0,0,0,0.2);
		margin-top: 5px;
		cursor: pointer;
		padding-left: 10px;
		margin-right: 4%;
	}
	.form_reporte span{
		margin-right: 7%;

	}
	.form_reporte select option{
		border-bottom: 1px solid rgba(0,0,0,0.2);
		padding: 10px;
	}
	.cuadroRubro{
		
		background: transparent;
		text-decoration: none;
		color: rgba(0,0,0,0.5);
		font-size: 23px;
		display: inline-block;
		padding: 10px;
		margin-left: 1%;
		position: relative;
		box-sizing: border-box;
		
	}
	.cuadroRubro:hover{
		color: #3e94ec;
		background: rgba(0,0,0,0.1);
		border-radius: 5px;
	}
	.TextoLargo{
		
		display: inline-block;
		width: 150px;

	}
	.TextoLargo1{
		display: inline-block;
		width: 200px;
	}
	.atras_rango,.atras_rango1{
	    display: inline-block;
	    text-decoration: none;
	    position: absolute;
	    color: white;
	    font-size: 17px;
	    box-sizing: border-box;
	    padding: 10px;
	    width: 10%;
	    top: -48%;
	    text-align: center;
	    cursor: pointer;
	    font-weight: bold;
		border: 2px solid rgba(255,0,0,0.4);
		background: transparent;
		color: rgba(255,0,0,0.4);
		right: 0;
		z-index: 2;

	}
	.atras_rango{
		background: white;
		position: relative;
		width: 100%;
	}
	.div_atras_rango{
		padding: 40px;
		background: white;
		z-index: 1;
		position: absolute;
		top: -65%;
		right: -4%;
		width: 100px;
	}
	.atras_rango1{
		margin-top: 29.5%;
		right: 3%;
		z-index: -1;
	}
	.margen_rango2{
		top:-95%;
	}
	.DivFechasRango{
		width: 51%;
		display: inline-block;
		margin-right: 4%;
		width: 100%;
	}
	.DivFechasRango span{
		display: inline-block;
		margin-right: -1%;
		padding: 10px 15px;
		background: #efefef;
		width: 15%;
		text-align: center;
		margin-top: 2%;

	}
	.DivFechasRango input {
		padding: 10px;
		margin-right: 5%;
	}
	.BotonRango{
	    display: inline-block;
	    text-decoration: none;
	    color: white;
	    font-size: 17px;
	    box-sizing: border-box;
	    border-radius: 5px;
	    margin-top: 2%;
	    text-align: center;
	    cursor: pointer;
	    font-weight: bold;
	    background: #4cb1ff;
		border: 2px solid #4cb1ff;
		width: 150px;
	}
	
	.BotonRango:hover{
	    -webkit-box-shadow: 1px 1px 10px 2px rgba(0,0,0,0.3);
	       -moz-box-shadow: 1px 1px 10px 2px rgba(0,0,0,0.3);
	  			box-shadow: 1px 1px 10px 2px rgba(0,0,0,0.3);
	}
	.EspacioFinal1{
		padding: 30px;
		width: 80%;
		float: right;
	}
	.NoHayResultado{
		position: absolute;
		top: 30%;
		right: 0;
		text-align: center;
		width: 78%;
	}
	/*estilos buscador proveedores*/
	.nombre_cliente{
		display: inline-block;
		width: 300px;
		position: relative;
		padding: 10px 20px 0px 20px;
		cursor: pointer;
		box-shadow: 1px 1px 15px rgba(0,0,0,0.2);
		transition: 0.5s;
		height: 35px;
	}
	.nombre_cliente:hover,.nombre_cliente:hover input{
		background: #efefef;
		transition: 0.5s;
	}
	.nombre_cliente input{
		font-size: 18px;
		border: none;
		transition: 0.5s;
		padding: 12px 10px;
		width: 100%;
		vertical-align: top;
		top: 0;
		left: 0;
		position: absolute;
	}
	.nombre_cliente img{
		width: 20px;
		height: 20px;
		float: right;
		-webkit-filter: invert(100%);
		filter: invert(100%);
	}
	.nombre_cliente_seleccionado{
		background: #efefef;
		border-top-left-radius: 5px;
		border-top-right-radius: 5px;
		height: 35px;
		z-index: 1;
		transition: 0.5s !important;
		box-shadow: 1px 1px 15px rgba(0,0,0,0.5);
	}
	#resultado{
		position:absolute;
		width: 340px;
		max-height: 300px;
		overflow-y: auto;
		overflow-x: hidden;
		left: 0%;
		z-index: 1;
		background: rgba(255,255,255,1);
		box-shadow: 0px 5px 15px rgba(0,0,0,0.7);
		top: 100%;
	}
	#resultado a{
		font-size: 16px;
		width: 100%;
		border: none;
		border-bottom: 1px solid rgba(0,0,0,0.2);
		padding: 10px;
		transition: 0.5s;
		display: inline-block;	
		text-decoration: none;
		color: black;
		text-align: left;
	}
	.botonCliente{
		background: transparent;
		position: absolute;
		margin-left:-99%;
		width: 100% !important;
		border: none !important;
		cursor: pointer;
	}
	#resultado .botonCliente:hover,#resultado a:hover{
		background: rgba(0,0,0,0.1);
		transition: 0.5s;
	}
	.oculto{
		display: none;
	}
	td,th{
		text-align: center;
	}

	/*ESTILOS INPUT RADIO*/
	#CuadroMoneda label{
	    display: inline-block;
	    cursor: pointer;
	    color: #4cb1ff;
	    position: relative;
	    font-size: 1em;
	    border-radius: 5px;
	    -webkit-transition: all 0.3s ease;
	    -o-transition: all 0.3s ease;
	    transition: all 0.3s ease;
	    text-align: center;
	    margin: 0px 0px 10px 0px;
		padding: 5px 15px 5px 30px;
	}
    #CuadroMoneda label:hover{
      	background: rgba(76, 177, 255, 0.1); }

    #CuadroMoneda label:before{
		content: "";
		display: inline-block;
		width: 17px;
		height: 17px;
		position: absolute;
		left: 10px;
		border-radius: 50%;
		background: none;
		border: 3px solid #4cb1ff;
  	}
	#CuadroMoneda label:before{
		width: 14px;
	    height: 14px;
	    left: 5px;
	}
	#CuadroMoneda input[type="radio"] {
		display: none !important;
	}
	#CuadroMoneda input[type="radio"]:checked + label:before {
		display: none; }
	#CuadroMoneda input[type="radio"]:checked + label {
	    padding: 5px 15px;
	    background: #4cb1ff;
	    border-radius: 2px;
	    color: #fff;
	}
	#CuadroMoneda{
		display: inline-block;
		box-sizing: border-box;
	    width: 100%;
	    vertical-align: top;
	}
	.bloqueradio p{
		text-align: center;
		color: rgba(0,0,0,0.5);
		margin: 10px 0;
	}
	h2{
		color: rgba(0,0,0,0.5) !important;
	}
</style>

<script type="text/javascript">
	$(document).ready(function(){
		$(".reportesLink").addClass("seleccionado");	
	});


	/*CONSULTA EN TIEMPO REAL*/
	 $(document).ready(function(){
	        var consulta;
	        //hacemos focus al campo de búsqueda
	        $("#busqueda").focus();
	                                                                                                     
	        //comprobamos si se pulsa una tecla
	        $("#busqueda").keyup(function(e){
	                                      
	              //obtenemos el texto introducido en el campo de búsqueda
	              consulta = $("#busqueda").val();
	              //hace la búsqueda                                                                                  
	              $.ajax({
	                    type: "POST",
	                    url: "buscar_inquilino_reporte_pagos.php",
	                    data: "b="+consulta,
	                    dataType: "html",
	                    beforeSend: function(){
	                    //imagen de carga
	                    $("#resultado").html("<p align='center'><img src='../IMAGEN/loader.gif' /></p>");
	                    },
	                    error: function(){
	                    alert("Error petición ajax");
	                    },
	                    success: function(data){                                                    
	                    $("#resultado").empty();
	                    $("#resultado").append(data);                                                             
	                    }
	              });                                                                         
	        });                                                     
	});        
</script>
	<?php if ($campo=="Rango") { ?>
		<span class="tituloSpan">Reporte de Pagos
			<?php if ($nfila>0) { 

				$timestamp1_titulo = strtotime($fechaini);
				$fechaini_formateada= date('d/m/Y', $timestamp1_titulo);

				$timestamp2_titulo = strtotime($fechafin);
				$fechafin_formateada= date('d/m/Y', $timestamp2_titulo);
				
				?>
				<span class="titulo_rango_fechas"><?php echo $fechaini_formateada; ?> hasta <?php echo $fechafin_formateada; ?></span>
			<?php } ?>
		</span>
	<?php } else if ($campo=="Nombre") {
					$EnviarNombre="Nombre";
					
	?>
					<span class="tituloSpan">Reporte de Pagos</span>

		  <?php } else { ?>
  		<span class="tituloSpan">Reporte de Pagos
  			<?php if (!empty($campo)) { ?>
  				<span class="titulo_rango_fechas"><?php echo $campo; ?></span>
  			<?php } ?>
  		</span>
  	<?php } ?>
  	<?php if ($nombre):
		$rif_proveeodores_1=$dato['rif_proveedores'];
		$cons_proveedores1=mysql_query("SELECT nombre_proveedores FROM proveedores WHERE rif_proveedores='$rif_proveeodores_1'",$conec);
		$dato_proveedores1=mysql_fetch_array($cons_proveedores1);
		?>
		<span class="titulo_rango_fechas1"><?php echo $dato_proveedores1['nombre_proveedores']; ?></span>
  	<?php endif ?>
		
	<?php if ($nfila==NULL) { ?>
		<script type="text/javascript">
		    function autoSubmit()
		    {
		        var a=document.forms["theForm"]["moneda"].value;
		        var b=document.forms["theForm"]["tiempo"].value;
		        if (a==null || a=="",b==null || b=="")
		        {
		            alert("Please Fill All Required Field");
		            return false;
		        } else{
		        	var formObject = document.forms['theForm'];
			    	formObject.submit();
		        }
		    }
		</script>
		
		<div class="form_reporte">
		<form method="POST" action="#" name='theForm'>
			<?php if ($campo==NULL) {
		
		//INPUT RADIO MONEDAS
		$sql_moneda = "SELECT * FROM alquiler_moneda ORDER BY nombre_moneda ASC";
		$result_moneda = mysql_query ($sql_moneda);
		if($result_moneda>0) {
			echo '<div id="CuadroMoneda">
				<div class="bloqueradio">
	            	<h2>Seleccione una moneda</h2>';
	            	$i_moneda=1;
					while ($row_moneda = mysql_fetch_row($result_moneda)){
						echo '<input type="radio" name="moneda" required id="id_moneda'.$i_moneda.'" value="'.$row_moneda[1].'">
		            	<label for="id_moneda'.$i_moneda.'">'.$row_moneda[1].'</label>';
		            	$i_moneda++;
					}
				echo "</div>
			</div>";	
		} else{
			echo "No se encuentra ninguna moneda registrada";
		}
		?>
		
			
			<input type="hidden" name="input_reporte" value="pagos">

			<h2>Seleccione un tipo de reporte</h2>
			<div id="CuadroMoneda">
				<div class="bloqueradio">
					<input type="radio" name="tiempo" id="id_moneda_diario" required value="Diario" onChange="autoSubmit()"/>
		        	<label for="id_moneda_diario">Diario</label>

		        	<input type="radio" name="tiempo" id="id_moneda_semanal" required value="Semanal" onChange="autoSubmit()"/>
		        	<label for="id_moneda_semanal">Semanal</label>

		        	<input type="radio" name="tiempo" id="id_moneda_Mensual" required value="Mensual" onChange="autoSubmit()"/>
		        	<label for="id_moneda_Mensual">Mensual</label>

		        	<input type="radio" name="tiempo" id="id_moneda_Semestral" required value="Semestral" onChange="autoSubmit()"/>
		        	<label for="id_moneda_Semestral">Semestral</label>

		        	<input type="radio" name="tiempo" id="id_moneda_Anual" required value="Anual" onChange="autoSubmit()"/>
		        	<label for="id_moneda_Anual">Anual</label>

		        	<input type="radio" name="tiempo" id="id_moneda_Rango" required value="Rango" onChange="autoSubmit()"/>
		        	<label for="id_moneda_Rango">Rango de fecha</label>
		        </div>
		    </div>
		
		</form>         

		<?php } ?>
		<?php if ($campo=="Rango") { ?>
			<script type="text/javascript">
				$(document).ready(function(){
					$(".form_reporte").addClass("margen_form");
					$(".BotonRegresar").hide();
				});
			</script>
			<h2>Seleccione rango de fecha</h2>
			<div class="div_atras_rango">
			<a href="ReportePagos.php" class="atras_rango">Atrás</a>
			</div>
			<div class="DivFechasRango">
				<form method="POST" action="#">
					<input type="hidden" name="moneda" value="<?php echo $moneda; ?>">
					<input type="hidden" name="input_reporte" value="pagos">
					<input type="hidden" name="tiempo" value="Rango">
					<span>Fecha Inicial</span>
					<input type="date" name="txtfechaini" max="<?php echo date("d-m-Y") ?>" value="<?php echo date("d-m-Y") ?>" />

					<span>Fecha Final</span>
					<input type="date" name="txtfechafin" max="<?php echo date("d-m-Y") ?>" value="<?php echo date("d-m-Y") ?>" /> 
					<br><input type="submit" class="BotonRango" name="Buscar" value="Buscar">
				</form>
			</div>
		<?php }
		if ($campo=="Nombre") { ?>
			<script type="text/javascript">
				$(document).ready(function(){
					$(".form_reporte").addClass("margen_form");
				});
			</script>
			<div class="div_atras_rango  margen_rango2">
			<a href="ReportePagos.php" class="atras_rango">Atrás</a>
			</div>
			<h2>Seleccione un Inquilino</h2><br>
			<div class="nombre_cliente">
				<form action="#" method="post">
					<input type="search" autocomplete="off" id="busqueda" placeholder="Nombre del inquilino"/>
					<input type="submit" name="btnbuscar" value="Ir" class="btnBuscar" hidden/>
					<img class="usuario_imagen" src="../IMAGEN/ic_keyboard_arrow_down_white_36dp.png">
				</form>
				<div id='resultado'></div>
			</div>
		<?php } ?>
		<input type="submit" hidden value="Buscar" />
	</div>
	<?php } ?>
	<?php if($nfila>0) { ?>
		<?php if (!empty($_POST['txtfechaini'])) {
			$txtfechafin=$_POST['txtfechafin'];
			$txtfechaini=$_POST['txtfechaini'];
		}
		if ($Nombre) {
			$EnviarNombre='Nombre';
		}
		?>

		<a href="pdf_ReportePagos.php?txtfechaini=<?php echo $txtfechaini ?>&txtfechafin=<?php echo $txtfechafin ?>&input_reporte=pagos&tiempo=<?php echo $campo ?>&moneda=<?php echo $moneda; ?>" title="Imprimir" class="BotonImprimir">Imprimir</a>
		
		
		<a href="ReportePagos.php" class="BotonRegresar">Atrás</a>
		<table class='tablaArticulos'>

			<tr>
				<th>Nº Contrato</th>
				<th>Inquilino</th>
				<th>Código del Inmueble</th>
				<th>Pago</th>
				<th>Fecha</th>
				<th>Monto</th>
			</tr>
			<?php
				do{	
					$codigo_factura_pagos=$dato['codigo_factura'];
					$hora_cuota_pagada=$dato['hora_cuota_pagada'];

					$cons_renta=mysql_query("SELECT rif_inquilino FROM alquiler_renta WHERE codigo_factura='$codigo_factura_pagos' ",$conec);
					$dato_renta=mysql_fetch_array($cons_renta);
					$rif_inquilino_pagos=$dato_renta['rif_inquilino'];

					$cons_inquilino=mysql_query("SELECT nombre_inquilino FROM alquiler_inquilino WHERE rif_inquilino='$rif_inquilino_pagos' ",$conec);
					$dato_inquilino=mysql_fetch_array($cons_inquilino);

					//consulta de cuotas unidas
					$sql1 = "SELECT GROUP_CONCAT(cuota_renta SEPARATOR ', ') FROM alquiler_renta_detalle WHERE codigo_factura='$codigo_factura_pagos' and hora_cuota_pagada='$hora_cuota_pagada' GROUP BY fecha_cuota_pagada, hora_cuota_pagada;";
					$result1 = mysql_query ($sql1);
					//consulta de cuotas unidas
					$row1 = mysql_fetch_row($result1);
	                //Obtenemos la primera columna, el GROUP_CONCAT
	                $cuotas = $row1[0];
					
					$moneda_consulta=$dato['moneda_monto_cuota'];
					?>

					<tr>
						<td><?php echo $dato['codigo_factura']?></td>
						<td><?php echo $dato_inquilino['nombre_inquilino']." <br>".$rif_inquilino_pagos; ?></td>
						<td><?php echo $dato['codigo_inmueble']?></td>
						<td><?php echo "Nº de cuota: ".$cuotas."<br>Abono: ".number_format($dato['monto_abono'], 2, ",", ".")." ".$moneda_consulta;?></td>
						

						<td>
							<?php
								$fecha0 = $dato['fecha_cuota_pagada'];
								$timestamp = strtotime($fecha0);
								$fecha= date('d/m/Y', $timestamp);
								echo $fecha;

								
							?>
						</td>



						<td>
							<?php
								$suma_abono_cuota=$dato['monto_cuota']+$dato['monto_abono'];
								echo number_format($suma_abono_cuota, 2, ",", ".")." ".$moneda_consulta;
							?>
						</td>
						
					</tr>
					<?php
						$total=$total+$dato['monto_cuota']+$dato['monto_abono'];
					?>
				<?php } while($dato=mysql_fetch_array($cons)); ?>
				<td colspan="5" class="td_total">Total</td>
				<td colspan="1" align="center"><b><?php echo number_format($total, 2, ",", ".")." ".$moneda_consulta; ?></td>
	<?php } else { ?>
			<h1 class="NoHayResultado"><?php echo $Mensaje; ?></h1>

			<?php if ($campo=="Rango") { ?>
				<a href="ReportePagos.php" class="atras_rango1">Atrás</a>
				<h1 class="NoHayResultado"><?php echo $Mensaje; ?></h1>	
			<?php } elseif ($campo=='Semanal' or $campo=='Mensual') { ?>
				<a href="ReportePagos.php" class="atras_rango1">Atrás</a>
				<h1 class="NoHayResultado"><?php echo $Mensaje; ?></h1>	
				<script type="text/javascript">
					$(document).ready(function(){
						$(".BotonRegresar").hide();
						$(".form_reporte").hide();
					});
				</script>
			<?php }

			if ($campo=="Diario") { ?>
				<script type="text/javascript">
					$(document).ready(function(){
						$(".BotonRegresar").hide();
						$(".form_reporte").hide();
					});
				</script>
				<a href="ReportePagos.php" class="atras_rango1">Atrás</a>
				<h1 class="NoHayResultado"><?php echo $Mensaje; ?></h1>	
			<?php } 
			
			if ($Nombre && empty($nfila)) { ?>
				<script type="text/javascript">
					$(document).ready(function(){
						$(".form_reporte").hide();
						$(".BotonRegresar").hide();	
					});
				</script>
		
				<a href="ReportePagos.php" class="atras_rango1">Atrás</a>
				<h1 class="NoHayResultado">No hay resultados que mostrar</h1>	
			<?php } ?>
	<?php } ?>
		</table>
	

<div class="EspacioFinal1"></div>
</body>
</html>
<!--PROGRAMA DESARROLLADO Y TERMINADO POR RAUL ESCALONA, 11/09/2017-->