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
		$codigo_inmueble=$_POST["codigo_inmueble"];
		$cons=mysql_query("SELECT * FROM alquiler_inmueble WHERE codigo_inmueble LIKE '%$codigo_inmueble%' ORDER BY codigo_inmueble ASC",$conec);
		$dato=mysql_fetch_array($cons);
		$nfila=mysql_num_rows($cons);
	} else {
		$cons=mysql_query("SELECT * FROM alquiler_inmueble ORDER BY codigo_inmueble ASC",$conec);
		$dato=mysql_fetch_array($cons);
		$nfila=mysql_num_rows($cons);
	}
?>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/estilos_archivos.css">
	<style type="text/css">
		.th_estado{
			width: 200px;
		}
		#tipo_residencia_inmueble label{
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
	    #tipo_residencia_inmueble label:hover{
	      	background: rgba(76, 177, 255, 0.1); }

	    #tipo_residencia_inmueble label:before{
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
		#tipo_residencia_inmueble label:before{
			width: 14px;
		    height: 14px;
		    left: 5px;
		}
		#tipo_residencia_inmueble input[type="radio"] {
			display: none !important;
		}
		#tipo_residencia_inmueble input[type="radio"]:checked + label:before {
			display: none; }
		#tipo_residencia_inmueble input[type="radio"]:checked + label {
		    padding: 5px 15px;
		    background: #4cb1ff;
		    border-radius: 2px;
		    color: #fff;
		}
		#tipo_residencia_inmueble{
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
		.acciones a img{
			filter: invert(100%);
			-webkit-filter: invert(100%);
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
			display: inline-block;
			width: 100%;
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
			width: 65%;
			border: none;
			margin: 0;
			float: left;
		}
		.DivPrecio select{
			margin:0;
			position: left;
			width: 35%;
			height: 38px;
			padding-left: 0px;
			border-right: none;
			border-top: none;
			border-bottom: none;
			vertical-align: top;
		}
		.Clase_TipoInmueble{
			text-align: left !important;
		}
		.Clase_PrecioInmueble{
			text-align:right !important;
		}
		.iva{
			padding: 0 15px !important;
		}
		.th_precio{
			padding: 0 60px !important;
		}
		.td_codigo{
			padding: 0 !important;
		}
	</style>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".inmueblesLink").addClass("seleccionado");	
		});
	</script>
	<script type="text/javascript" src="../js/script_inmueble.js"></script>
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
	  		<a href="pdf_inmuebles.php?codigo_inmueble=<?php echo $dato['codigo_inmueble']?> " <?php echo $disabled; ?> title="<?php echo $titulo; ?>"><img src="../IMAGEN/print-printer-tool-with-printed-paper-outlined-symbol_icon-icons.png"></a>
	  	</div>
	  	<!--INICIO - INSERTAR VENTANA MODAL-->
	  	<div id="Modal_insertar">
	  		<a href="#" class="Cerrar">x</a>
	  		<form method="post" class="FormInsertar" action="Guardainmueble.php">
	  			<div class="TituloModalRegistro">Registrar Inmueble</div>	  			
				
				<script type="text/javascript">
					$(function() {
					  $("#select_tipo").change(function() {
					    if ($("#residencia").is(":selected")) {
					    	$("#tipo_residencia_inmueble").show();
					    } else {
					      	$("#tipo_residencia_inmueble").hide();
					    }

					    if ($("#localCC").is(":selected")) {
					      	$("#codigo_cc").show();
					      	$(document).ready(iniciar);
 
							function iniciar(){
							    $("#consulta_cc").change(mostrarTitulo);
							}
							 
							function mostrarTitulo(){
							    var x = $(this).val();
							    $.ajax({
							        url: "getdatos.php",
							       type: "post",
							       data: "valor="+x,
							       success: function(data){
							           $("#cajatexto").val(data);
							       }

							    });
							}
					    } else {
					      $("#codigo_cc").hide();
					      $("#cajatexto").val('');
					    }
					  }).trigger('change');
					});
				</script>
				
	  			<select required name="tipo_inmueble" id="select_tipo" class="select">
	  				<option value="">Seleccione un tipo de Inmueble</option>
	  				<option value="Habitación">Habitación</option>
	  				<option value="Residencia" id="residencia">Residencia</option>
	  				<option value="Oficina">Oficina</option>
	  				<option value="Local" id="localCC">Local en centro comercial</option>
	  				<option value="Independiente">Local Independiente</option>
	  			</select>				 
				
	  			<input type="text"   name="codigo_inmueble" maxlength="15" required placeholder="Código"  />
	  			<div id="tipo_residencia_inmueble">
	  				<div class="bloqueradio">
	                    <p>Seleccione un tipo de residencia</p>                  
	                    <input type="radio" name="tipo_residencia_inmueble" id="residencia_casa" value="Casa">
	                    <label for="residencia_casa">Casa</label>
	                    <input type="radio" name="tipo_residencia_inmueble" id="residencia_apto" value="Apto">
	                    <label for="residencia_apto">Apto</label>
                  	</div>
	  			</div>

	  			<?php 
					$sql = "SELECT * FROM alquiler_cc ORDER BY nombre_cc ASC";
					$result = mysql_query ($sql);

					if (!$result){
					   echo "La consulta SQL contiene errores.".mysql_error();
					   exit();
					}else {
						?>
						<div id="codigo_cc">
							<select class="select" name="codigo_cc" id="consulta_cc">
				  				<option value="">Seleccione un Centro Comercial</option>
							<?php
								while ($row = mysql_fetch_row($result)){
				        			echo "
				  						<option value='".$row[1]."'>
				  							".$row[2]."
				  						</option>
				  				 	";
				  				 	$direccion=$row[3];
				  				 	$pisos=$row[4];
				  				}
				  			echo "</select>";
				  			?>
							<input type="number" name="pisos_cc" placeholder="Piso" />
						</div>
					<?php }
				?>
				
				<div class="DivPrecio">
					<input type="number" step="any" name="precio_inmueble" required placeholder="Precio del alquiler" />
					

					<?php 
						$sql_moneda = "SELECT * FROM alquiler_moneda ORDER BY nombre_moneda ASC";
						$result_moneda = mysql_query ($sql_moneda);
						if (!$result_moneda){
						   echo "La consulta SQL contiene errores.".mysql_error();
						   exit();
						}else {
							?>
								<select class="select moneda" name="moneda_precio_inmueble" required>
				  					<option value="">Seleccione</option>
										<?php
											while ($row_moneda = mysql_fetch_row($result_moneda)){
								        			echo "
								  						<option value='".$row_moneda[1]."'>
								  							".$row_moneda[1]."
								  						</option>
								  				 	";
							  				}
						  		echo "</select>";		
				  		}
			  		?>
					
				</div>
					<input type="number" name="iva_inmueble" required placeholder="I.V.A (%)" />
					<input type="text" id="cajatexto" 	 name="txtdireccion" required placeholder="Dirección" />
				

				<input type="text" 	 name="txtdescripcion" maxlength="50" required placeholder="Descripción detallada" />				
				<div class="caja_botones">
					<input type="submit" class="btnRegistrar" value="Guardar" />
				</div>
				<input type="hidden" name="estado_inmueble" value="Disponible">
	  		</form>
	  	</div>
		<form class="form_buscar" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
	  		<span>Inmuebles (<?php echo $nfila ?>)</span>
			<input type="search" class="form_inputText" name="codigo_inmueble" autofocus="autofocus" value="<?php echo $codigo_inmueble; ?>" placeholder="Buscar por código" /> 
			<input type="submit" name="btnbuscar" hidden value="Ir" class="btnBuscar" />
		</form>
		<br><br>
		<table class="tabla_menu">
			
			<?php if($nfila>0) { ?>
				<tr>
					<th>Código</th>
					<th>Tipo de <br>inmueble</th>
					<th>Dirección</th>
					<th>Descripción Detallada</th>
					<th class="th_precio">Precio</th>
					<th class="iva">I.V.A (%)</th>
					<th class="th_estado">Estado</th>
					<th>Acción</th>
				</tr>
				<?php
					$i=1;
					do{
						if($i==1){
							$i=2;
							
							if ($dato['tipo_inmueble']=='Residencia') {
								$tipo_inmueble= $dato['tipo_inmueble'].": ".$dato['tipo_residencia_inmueble'];
							} else if ($dato['tipo_inmueble']=='Independiente') {
								$tipo_inmueble='Local Independiente';
							} else {
								$tipo_inmueble=$dato['tipo_inmueble'];
							}
							$codigo_cc=$dato['codigo_cc'];
							$cons_nombre_cc=mysql_query("SELECT * FROM alquiler_cc WHERE codigo_cc='$codigo_cc' ",$conec);
							$dato_nombre_cc=mysql_fetch_array($cons_nombre_cc);
							$nfila_nombre_cc=mysql_num_rows($cons_nombre_cc);
							
							if ($dato['tipo_inmueble']=='Local') {
								$nombre_cc=" en ".$dato_nombre_cc['nombre_cc'];
								$pisos_cc=" - Piso ".$dato['pisos_cc'];
							} else {
								$nombre_cc="";
								$pisos_cc="";
							}
							if ($dato['estado_inmueble']=='Ocupado') {
								$codigo_inmueble1=$dato['codigo_inmueble'];
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
							echo "<tbody>
									<tr>
										<td class='td_codigo'>".$dato['codigo_inmueble']."</td>
										<td class='Clase_TipoInmueble'>".$tipo_inmueble.$nombre_cc.$pisos_cc."</td>
										
										<td>".$dato['direccion_inmueble']."</td>
										<td>".$dato['descripcion_inmueble']."</td>
										<td class='Clase_PrecioInmueble'>".number_format($dato["precio_inmueble"], 2, ",", ".")." ".$dato['moneda_precio_inmueble']."</td>
										<td>".$dato['iva_inmueble']." % </td>
										<td>".$dato['estado_inmueble'].$estado_nombre.$rif_inquilino1."</td>
										";
										?>
										<td>
											<div class="cuadroRubro">
												<div class="acciones">
													<a  href="Edicioninmuebles.php?codigo_inmueble=<?php echo $dato['codigo_inmueble']?> " onclick="return confirm('¿Está seguro que desea Modificar este archivo?')"><img src="../IMAGEN/modificar.png" title="Modificar"></a>
													<a  href="eliminarinmuebles.php?codigo_inmueble=<?php echo $dato['codigo_inmueble']?> " onclick="return confirm('¿Está seguro que desea Eliminar este archivo?')"><img src="../IMAGEN/eliminar_48x48.png" title="Eliminar"></a>
												</div>
											</div>
										</td>
										<?php
									echo "</tr>
							</tbody>";
						} else if($i==2){							
							$i=1;
							
							if ($dato['tipo_inmueble']=='Residencia') {
								$tipo_inmueble= $dato['tipo_inmueble'].": ".$dato['tipo_residencia_inmueble'];
							} else if ($dato['tipo_inmueble']=='Independiente') {
								$tipo_inmueble='Local Independiente';
							}else {
								$tipo_inmueble=$dato['tipo_inmueble'];
							}
							$codigo_cc=$dato['codigo_cc'];
							$cons_nombre_cc=mysql_query("SELECT * FROM alquiler_cc WHERE codigo_cc='$codigo_cc' ",$conec);
							$dato_nombre_cc=mysql_fetch_array($cons_nombre_cc);
							$nfila_nombre_cc=mysql_num_rows($cons_nombre_cc);
							if (!empty($dato_nombre_cc['nombre_cc'])) {
								$nombre_cc=" en ".$dato_nombre_cc['nombre_cc'];
								$pisos_cc=" - Piso ".$dato['pisos_cc'];
							}else {
								$nombre_cc="";
								$pisos_cc="";
							}
							if ($dato['estado_inmueble']=='Ocupado') {
								$codigo_inmueble1=$dato['codigo_inmueble'];
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
							echo "<tbody>
									<tr class='tableTR2'>
										<td class='td_codigo'>".$dato['codigo_inmueble']."</td>
										<td class='Clase_TipoInmueble'>".$tipo_inmueble.$nombre_cc.$pisos_cc."</td>
										
										<td>".$dato['direccion_inmueble']."</td>
										<td>".$dato['descripcion_inmueble']."</td>
										<td class='Clase_PrecioInmueble'>".number_format($dato["precio_inmueble"], 2, ",", ".")." ".$dato['moneda_precio_inmueble']."</td>
										<td>".$dato['iva_inmueble']." % </td>
										<td>".$dato['estado_inmueble'].$estado_nombre.$rif_inquilino1."</td>
										";
										?>
										<td>
											<div class="cuadroRubro">
												<div class="acciones">
													<a  href="Edicioninmuebles.php?codigo_inmueble=<?php echo $dato['codigo_inmueble']?> " onclick="return confirm('¿Está seguro que desea Modificar este archivo?')"><img src="../IMAGEN/modificar.png" title="Modificar"></a>
													<a  href="eliminarinmuebles.php?codigo_inmueble=<?php echo $dato['codigo_inmueble']?> " onclick="return confirm('¿Está seguro que desea Eliminar este archivo?')"><img src="../IMAGEN/eliminar_48x48.png" title="Eliminar"></a>
												</div>
											</div>
										</td>
										<?php
									echo "</tr>
								</tbody>";
						}
					} while($dato=mysql_fetch_array($cons));
			} else { ?>
			<tr>
				<center><h1>No hay resultados que mostrar</h1></center>
			</tr>
			<?php } ?>
		</table>
		<div class="EspacioFinal"></div>
	</div>
</body>
</html>
