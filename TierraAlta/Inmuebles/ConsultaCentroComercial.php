<?php session_start();
	if($_SESSION['TierraAlta_TipoMostrar']==NULL){
		header("location: ../index.php");  
	}else if($_SESSION['TierraAlta_TipoMostrar']=='DEPOSITARIO'){
		header("location: ../DEPOSITARIO/index.php");  
	}else if($_SESSION['TierraAlta_TipoMostrar']=='ADMIN_INVENTARIO'){
		header("location: ../ADMINISTRADOR/index.php");
	}
	include("Cabecera.php");
	if($_POST){
		$nombre_cc=$_POST["nombre_cc"];
		$cons=mysql_query("SELECT * FROM alquiler_cc WHERE nombre_cc LIKE '%$nombre_cc%' ORDER BY nombre_cc ASC",$conec);
		$nfila=mysql_num_rows($cons);
		
	} else {
		$cons=mysql_query("SELECT * FROM alquiler_cc ORDER BY nombre_cc ASC",$conec);
		$nfila=mysql_num_rows($cons);
		
	}
?>
	<link rel="stylesheet" type="text/css" href="../css/estilos_archivos.css">
	<style type="text/css">
		#tipo_residencia_cc label{
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
		    margin: 0px 7% 10px 7%;
			padding: 5px 15px 5px 30px;
		}
	    #tipo_residencia_cc label:hover{
	      	background: rgba(76, 177, 255, 0.1); }

	    #tipo_residencia_cc label:before{
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
		#tipo_residencia_cc label:before{
			width: 14px;
		    height: 14px;
		    left: 5px;
		}
		#tipo_residencia_cc input[type="radio"] {
			display: none !important;
		}
		#tipo_residencia_cc input[type="radio"]:checked + label:before {
			display: none; }
		#tipo_residencia_cc input[type="radio"]:checked + label {
		    padding: 5px 15px;
		    background: #4cb1ff;
		    border-radius: 2px;
		    color: #fff;
		}
		#tipo_residencia_cc{
			display: inline-block;
			box-sizing: border-box;
		    width: 40%;
		    margin-left: 6%;
		    margin-top: 15px;
		    border: 1px solid rgba(0,0,0,0.3);
		    box-shadow: 0px 0px 2px rgba(0,0,0,0.5);
		    vertical-align: top;
		}
		.bloqueradio p{
			text-align: center;
			color: rgba(0,0,0,0.5);
			margin: 10px 0;
		}
		.FormInsertar .btnRegistrar{
			margin-left: 30%;
		}
		.form_buscar{
			margin-top: -70px;
			margin-right: 1%;
		}
		.tabla_menu{
			margin-left: -47.5%;
		}
		.tabla_menu th{
			box-sizing: border-box !important;
			padding: 10px 0px;
			text-align: center;
			font-size: 17px;
		}
		
		.tabla_menu td{
			padding: 10px;
		}
		.acciones{
			width: 150px;
			margin-top: -10px;
			margin-left: -20px;
		}
		.acciones a img{
			filter: invert(100%);
			-webkit-filter: invert(100%);
			border: 2px solid transparent;
			width: 30px;
			height: 30px;
			padding: 3px;
			display: inline-block;
		}
		.acciones a img:hover{
			border: 2px solid white;
		
		}
		hr{
			padding: 0;
			margin: 3px;
			opacity: 0.3;
		}
		.select{
			width: 40%;
			margin-left: 6%;
			margin-top: 15px;
			box-sizing: border-box;
			font-size: 15px;
			padding: 10px;
			display:inline-block;
			border: 1px solid rgba(0,0,0,0.3);
			background: transparent;
			box-shadow: 0px 0px 2px rgba(0,0,0,0.5);	
			color: rgba(0,0,0,0.5);
		}
		.select option{
			color: black;
		}
		#codigo_cc{
			background: rgb(240, 240, 240);
			display: inline-block;
			margin-top: 10px;
			padding-bottom: 15px;
			
		}
		.DivPrecio{
			border: 1px solid red;
			width: 40%;
		    margin-left: 6%;
		    margin-top: 15px;
		    box-sizing: border-box;
		    font-size: 15px;
		    display: inline-block;
		    border: 1px solid rgba(0,0,0,0.3);
		    background: transparent;
		    box-shadow: 0px 0px 2px rgba(0,0,0,0.5);
		}
		.DivPrecio input{
			width: 70%;
			border: none;
			margin: 0;
			float: left;
		}
		.DivPrecio select{
			position: right;
			width: 30%;
			height: 38px;
			padding-left: 10px;
			border-right: none;
			border-top: none;
			border-bottom: none;

		}
		.Clase_Tipocc{
			text-align: left !important;
		}
		.Clase_Preciocc{
			text-align:right !important;
		}

		/*ESTILOS INMUEBLES DESPLEGABLES*/
		.div_pagar_cuota{
			color: rgba(0,0,0,0.5);
			text-decoration: none;
			font-size: 20px;
			padding: 20px;
			text-align: center;
			display: inline-block;
			vertical-align: top;
			-webkit-user-select: none;
		    -moz-user-select: none;
		    -khtml-user-select: none;
		    -ms-user-select:none;
		    text-decoration: underline;
		}
		.div_pagar_cuota_seleccionado,.div_pagar_cuota:hover{
			color: #3e94ec;
			cursor: pointer;
		}
		.img_pagar{
			display: none;
			margin: 0;
			margin-top: -10px;
		}
		tr .CuadroInmueblesCC{
			border-top: 2px solid #3e94ec;
			border-bottom: 2px solid #3e94ec;
			padding: 0 !important;
			margin-top: -20px;
			background: white !important;
		}
		.Table {  
            display: table;
            width: 100%;
            background-color:#f5f5f5;
            vertical-align: middle;
  		} 
        .Heading {  
            display: table-row;  
            font-weight: bold;  
            text-align: center;  
            vertical-align: middle;
            border-top: 1px solid #ddd;
  		}  
  
        .Row         {  
            display: table-row;  
            vertical-align: middle;
  		}  
  
        .Cell {  
            display: table-cell;  
            border-bottom: 1px solid #ddd;
            padding: 0px 10px;
            vertical-align: middle;
  		}
  		.Title {			
  			display: table-caption;
  			text-align: center;  
  			font-size: 25px;
  			font-weight: bold;
  			padding: 10px;
  			background-color:#f5f5f5;
        } 
  		.BotonImprimir{
		    text-decoration: none;
		    color: white;
		    font-size: 17px;
		    box-sizing: border-box;
		    padding: 10px;
		    position: absolute;
		    width: 15%;
		    margin-left: 38%;
		    margin-top: 7px;
		    text-align: center;
		    cursor: pointer;
		    font-weight: bold;
			background: #4cb1ff;
			border: 2px solid #4cb1ff;
			margin-bottom: 0;
		}
		.BotonImprimir:hover{
		    -webkit-box-shadow: 1px 1px 10px 2px rgba(0,0,0,0.3);
		       -moz-box-shadow: 1px 1px 10px 2px rgba(0,0,0,0.3);
		  			box-shadow: 1px 1px 10px 2px rgba(0,0,0,0.3);
		}
	</style>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".ccLink").addClass("seleccionado");	
		});
	</script>
	<script type="text/javascript" src="../js/script_cc.js"></script>
	<div class="contenedor_archivo">
		<div class="divInsertar">
	  		<a href="#Modal_insertar" title="Agregar">+</a>
	  		<?php 
	  			if (!$nfila){
					$disabled='onclick="return false;"';
					$titulo="No hay resultados para imprimir";
				} else {
					$titulo="Imprimir";
				}
			?>
	  		<a href="pdf_cc.php?codigo_cc=<?php echo $dato['codigo_cc']?> " <?php echo $disabled; ?> title="<?php echo $titulo; ?>"><img src="../IMAGEN/print-printer-tool-with-printed-paper-outlined-symbol_icon-icons.png"></a>
	  	</div>
	  	<!--INICIO - INSERTAR VENTANA MODAL-->
	  	<div id="Modal_insertar">
	  		<a href="#" class="Cerrar">x</a>
	  		<form method="post" class="FormInsertar" action="Guardacc.php">
	  			<div class="TituloModalRegistro">Registrar Centro Comercial</div>
	  			<input type="text"   name="codigo_cc" 			maxlength="15" required placeholder="Código"  />
				<input type="text" 	 name="txtnombre" 			maxlength="50" required placeholder="Nombre" />
				<input type="text" 	 name="txtdireccion" 		maxlength="50" required placeholder="Dirección" />
				<input type="number" name="pisos_cc" 		    maxlength="4"  required	placeholder="Pisos" />
				<input type="number" name="cantidad_locales_cc" maxlength="5"  required placeholder="Cantidad de locales" />
				<input type="number" name="txttelefono1" 		maxlength="20" required placeholder="Teléfono 1" />
				<input type="number" name="txttelefono2" 		maxlength="20" 		 	placeholder="Teléfono 2 (Opcional)" />
				<div class="caja_botones">
					<input type="submit" class="btnRegistrar" value="Guardar" />
				</div>
	  		</form>
	  	</div>
		<form class="form_buscar" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
	  		<span>Centro Comercial</span>
			<input type="search" class="form_inputText" name="nombre_cc" autofocus="autofocus" value="<?php echo $nombre_cc; ?>" placeholder="Buscar centro comercial" /> 
			<input type="submit" name="btnbuscar" hidden value="Ir" class="btnBuscar" />
		</form>
		<br><br>
		<table class="tabla_menu">
			<?php if($nfila>0) { ?>
				<tr>
					<th>Código</th>
					<th>Nombre</th>
					<th>Dirección</th>
					<th>Tamaño</th>
					<th>Teléfono</th>
					<th>Acción</th>
				</tr>
	<?
		$i=1;
		while($dato = mysql_fetch_array($cons)){
			if ($dato['cantidad_pisos_cc']>1) {
				$pisos_cc=$dato['cantidad_pisos_cc']." Pisos, ";
			} else {
				$pisos_cc=$dato['cantidad_pisos_cc']." Piso, ";
			}
			$cantidad_locales_cc=$dato['cantidad_locales_cc']." Locales";

			$Telefono1 = $dato['telefono1_cc'];
			$area1 = substr($Telefono1, 0, 4);
			$numero1 = substr($Telefono1, 4, 16);
			$Telefono1 = $area1 . '-' . $numero1;
			if ($dato['telefono2_cc']==0) {
				$Telefono2 = "";
			} else {
				$Telefono2 = $dato['telefono2_cc'];
				$area2 = substr($Telefono2, 0, 4);
				$numero2 = substr($Telefono2, 4, 16); //el maximo permito para los telefonos es 20 numeros
				$Telefono2 = "<br>".$area2 . '-' . $numero2;
			}
			$codigo_cc_enviar=$dato['codigo_cc'];
			echo "<tbody>
					<tr>
						<td>".$dato['codigo_cc']."</td>
						<td>".$dato['nombre_cc']."</td>
						<td>".$dato['direccion_cc']."</td>
						<td>".$pisos_cc.$cantidad_locales_cc."</td>
						<td>".$Telefono1.$Telefono2."</td>
						";
						$i_inmueble=1;
						?>
						<td>
							<div class="cuadroRubro">
								<div class="acciones">
									<a style="cursor: pointer"><img id="Div<? echo $dato[codigo_cc]; ?>-inmuebles_cc" src="../IMAGEN/SEARCH_48x48-32.png" title="Ver Locales"></a>
									<a  href="Edicioncc.php?codigo_cc=<?php echo $dato['codigo_cc']?> " onclick="return confirm('¿Está seguro que desea Modificar este archivo?')"><img src="../IMAGEN/modificar.png" title="Modificar"></a>
									<a  href="eliminarcc.php?codigo_cc=<?php echo $dato['codigo_cc']?> " onclick="return confirm('¿Está seguro que desea Eliminar este archivo?')"><img src="../IMAGEN/eliminar_48x48.png" title="Eliminar"></a>
								</div>
							</div>
						</td>
						<?php
					echo "</tr>
			</tbody>";
			
	?>
		  	
		    
		    	
			<?
				$cons_inmueble_cc = mysql_query("SELECT * FROM alquiler_inmueble  WHERE codigo_cc ='{$dato[codigo_cc]}'",$conec);
				$nfila_inmueble_cc=mysql_num_rows($cons_inmueble_cc);

				echo "<tr class='tr_CuadroInmuebleCC'><td id='mostrar_inmuebles_cc".$i."' class='CuadroInmueblesCC' style='display: none' colspan='6'>
						
						<div class='Table'>  
							<div class='Title'>
								Locales
					        </div>
					        <div class='Heading'>
					        	
						        <div class='Cell'><p>Código</p></div>
								<div class='Cell'><p>Piso</p></div>  
								<div class='Cell'><p>Descripción Detallada</p></div>
								<div class='Cell'><p>Precio</p></div>
								<div class='Cell'><p>I.V.A (%)</p></div>
								<div class='Cell'><p>Estado</p></div>
							</div>  ";
					while($dato_inmueble_cc = mysql_fetch_array($cons_inmueble_cc)){ 
				       				
									$pisos_cc=$dato_inmueble_cc['pisos_cc'];
									
									if ($dato_inmueble_cc['estado_inmueble']=='Ocupado') {
										$codigo_inmueble1=$dato_inmueble_cc['codigo_inmueble'];
										$cons_estado_inmueble=mysql_query("SELECT rif_inquilino FROM alquiler_renta WHERE codigo_inmueble='$codigo_inmueble1' and estado_contrato='Vigente' ",$conec);
										$dato_estado_inmueble=mysql_fetch_array($cons_estado_inmueble);
										$rif_inquilino1=$dato_estado_inmueble['rif_inquilino'];

										$cons_estado_inmueble_inquilino=mysql_query("SELECT nombre_inquilino FROM alquiler_inquilino WHERE rif_inquilino='$rif_inquilino1' ",$conec);
										$dato_estado_inmueble_inquilino=mysql_fetch_array($cons_estado_inmueble_inquilino);
										$estado_nombre=" por:<br>".$dato_estado_inmueble_inquilino['nombre_inquilino']."<br>";
									} else {
										$estado_nombre='';
										$rif_inquilino1='';
									}

									if (empty($dato_inmueble_cc['codigo_inmueble'])) {
										echo "<span>No hay resultados.</span>";
									} else {
								       	echo "

								       		
											  
										        <div class='Row'>
										            <div class='Cell'>
										                <p>".$dato_inmueble_cc['codigo_inmueble']."</p>  
										            </div>  
										  
										            <div class='Cell'>
										  				<p>".$pisos_cc."</p>  
										            </div>  
										  
										            <div class='Cell'>
										  				<p>".$dato_inmueble_cc['descripcion_inmueble']."</p>  
										            </div>  

										            <div class='Cell'>
										  				<p>".number_format($dato_inmueble_cc["precio_inmueble"], 2, ",", ".")." ".$dato_inmueble_cc['moneda_precio_inmueble']."</p>  
										            </div>

										            <div class='Cell'>
										  				<p>".$dato_inmueble_cc['iva_inmueble']." % </p>  
										            </div> 

										            <div class='Cell'>
										  				<p>".$dato_inmueble_cc['estado_inmueble'].$estado_nombre.$rif_inquilino1."</p>  
										            </div> 
										        </div>  
											  
											
										";
									}
					}
					?>
				 <a href="pdf_inmuebles_cc.php?codigo_cc=<?php echo $codigo_cc_enviar?>" class="BotonImprimir">Imprimir locales</a>
				 <?php echo "<br><br><br></div></td></tr>";
		    ?>
		   
		    <script type="text/javascript">
		    	$(document).ready(function(){
		    		<?php if ($nfila_inmueble_cc) { ?>
					$('#Div<? echo $dato[codigo_cc]; ?>-inmuebles_cc').click(function () {
					      $('#mostrar_inmuebles_cc<?php echo $i ?>').slideToggle('fast');
					});
					<?php } ?>
				});
		    </script>
			<? 
			$i++;
		}
	

	} else { ?>
			<tr>
				<center><h1>No hay resultados que mostrar</h1></center>
			</tr>
			<?php } ?>
	</table>
	<div class="EspacioFinal"></div>
</div> 
