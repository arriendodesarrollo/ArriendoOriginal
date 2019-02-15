<?php session_start(); 
	if($_SESSION['TierraAlta_TipoMostrar']==NULL){
		header("location: ../index.php");  
	}else if($_SESSION['TierraAlta_TipoMostrar']=='DEPOSITARIO'){
		header("location: ../DEPOSITARIO/index.php");  
	}else if($_SESSION['TierraAlta_TipoMostrar']=='ADMIN_INVENTARIO'){
		header("location: ../ADMINISTRADOR/index.php");
	}
	include("Cabecera.php");
	$codigo_inmueble=$_REQUEST["codigo_inmueble"];
	$cons=mysql_query("SELECT * FROM alquiler_inmueble WHERE codigo_inmueble='$codigo_inmueble'",$conec);
	$dato=mysql_fetch_array($cons);
	$nfila=mysql_num_rows($cons);
?>
	<link rel="stylesheet" type="text/css" href="../css/estilos_archivos.css">
	<style type="text/css">
		.select{
			width: 40%;
			margin-left: -1%;
			box-sizing: border-box;
			font-size: 15px;
			padding: 10px;
			display:inline-block;
			border: 1px solid rgba(0,0,0,0.3);
			background: transparent;
			box-shadow: 0px 0px 2px rgba(0,0,0,0.5);	
			color: rgba(0,0,0,1);
		}
		.select option{
			color: black;
		}
		.FormModificar .btnRegistrar{
			margin-left: -45%;
			width: 40%;
			margin-right: 6%;
		}
		.FormModificar .btnBorrar{
			margin-left: 50%;
			padding: 11px;
			text-decoration: none;
			width: 38%;
			display: inline-block;
			text-align: center;
			font-size: 20px;
			font-weight: bold; 
		}
		.DivPrecio{
			border: 1px solid red;
			width: 40%;
		    
		    margin-left: -1%;
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
			position: left;
			width: 30%;
			height: 38px;
			padding-left: 10px;
			border-right: none;
			border-top: none;
			border-bottom: none;

		}
	</style>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".inmueblesLink").addClass("seleccionado");	
		});

		$(function() {
		  $("#select_tipo").change(function() {
		    if ($("#residencia").is(":selected")) {
		    	$("#tipo_residencia_inmueble").show();
		    } else {
		      	$("#tipo_residencia_inmueble").hide();
		    }

		    if ($("#localCC").is(":selected")) {
		      	$("#codigo_cc").show();
		      	$("#pisos_cc").show();
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
  		      $("#pisos_cc").hide();

		      $("#cajatexto").val('');
		    }
		  }).trigger('change');
		});
	</script>
	<?php
		if ($dato['telefono2_inmueble']==0) {
			$Telefono2 = "";
		} else {
			$Telefono2 = $dato['telefono2_inmueble'];
		}
	?>
	<div class="contenedor_archivo">
	  	<form method="post" class="FormModificar" action="Guardainmueble.php">
	  		<div class="TituloModalRegistro">Modificar inmueble</div>
	  		<div class="DivInput">
				<p>Tipo de inmueble</p>
				<select class="select" name="tipo_inmueble" id="select_tipo" required>
					<?php if ($dato['tipo_inmueble']=='Independiente') { ?>
						<option value="<?php echo $dato["tipo_inmueble"]; ?>">
		  					Local Independiente
		  				</option>
					<?php } else if ($dato['tipo_inmueble']=='Local') { ?>
		  				<option value="<?php echo $dato["tipo_inmueble"]; ?>" id="localCC">
		  					Local en Centro Comercial
		  				</option>
	  				<?php } else { ?>
	  					<option value="<?php echo $dato["tipo_inmueble"]; ?>">
		  					<?php echo $dato["tipo_inmueble"]; ?>
		  				</option>
	  				<?php } ?>
	  				<?php 
	  					$habitacion='Habitación';
	  					$residencia='Residencia';
	  					$oficina='Oficina';
	  					$local='Local';
	  					$independiente='Independiente';
	  					switch ($dato['tipo_inmueble']) {
						    case 'Habitación':
						        $hidden1='hidden';
						        break;
						    case 'Residencia':
						        $hidden2='hidden';
						        break;
						    case 'Oficina':
						        $hidden3='hidden';
						        break;
						    case 'Local':
						        $hidden4='hidden';
						        break;
						    case 'Independiente':
						        $hidden5='hidden';
						        break;
						}
	  				?>
	  				 <option <?php echo $hidden1; ?> value="<?php echo $habitacion; ?>"><?php echo $habitacion; ?></option>
	  				 <option <?php echo $hidden2; ?> id="residencia" value="<?php echo $residencia; ?>"><?php echo $residencia; ?></option>
	  				 <option <?php echo $hidden3; ?> value="<?php echo $oficina; ?>"><?php echo $oficina; ?></option>
	  				 <option <?php echo $hidden4; ?> id="localCC" value="<?php echo $local; ?>"><?php echo $local." en Centro Comercial"; ?></option>
	  				 <option <?php echo $hidden5; ?> value="<?php echo $independiente; ?>"><?php echo "Local ".$independiente; ?></option>
				</select>
			</div>
			<div class="DivInput">
				<p>Código</p>
				<input type="text" name="codigo_inmueble" maxlength="15" required value="<?php echo $dato["codigo_inmueble"]; ?>" />
			</div>

			
				<div class="DivInput" id="tipo_residencia_inmueble">
					<p>Tipo de residencia</p>
					<select class="select" name="tipo_residencia_inmueble" required>
						<?php if ($dato['tipo_residencia_inmueble']=='Casa') { ?>
							<option value="Casa">Casa</option>
			  				<option value="Apto">Apto</option>
						<?php } else { ?>
			  				<option value="Apto">Apto</option>
							<option value="Casa">Casa</option>
						<?php } ?>
					</select>
				</div>
			

				
				<div class="DivInput" id="codigo_cc">
					<p>Centro Comercial</p>
					<?php 
						$sql = "SELECT * FROM alquiler_cc ORDER BY nombre_cc ASC";
						$result = mysql_query ($sql);
						$cod_cc=$dato['codigo_cc'];
						$cons_cc=mysql_query("SELECT nombre_cc FROM alquiler_cc WHERE codigo_cc='$cod_cc'",$conec);
						$dato_cc=mysql_fetch_array($cons_cc);
						if (!$result){
						   echo "La consulta SQL contiene errores.".mysql_error();
						   exit();
						}else {
							?>
								<select class="select" name="codigo_cc" id="consulta_cc">
									<?php if ($dato['codigo_cc']==NULL) { ?>
					  					<option value="">Seleccione un Centro Comercial</option>
									<?php } else { ?>
					  					<option value="<?php echo $dato['codigo_cc'] ?>"><?php echo $dato_cc['nombre_cc']; ?></option>
										<?php
										}
											while ($row = mysql_fetch_row($result)){
							        			if ($row[1]==$dato['codigo_cc']) {
							        				
							        			} else {
								        			echo "
								  						<option value='".$row[1]."'>
								  							".$row[2]."
								  						</option>
								  				 	";
								  				 	$direccion=$row[3];
							  				 	}
							  				}
						  			echo "</select>";		
				  		} ?>	
						
				</div>
			
				<div class="DivInput" id="pisos_cc">
					<p>Piso</p>
					<input type="number" name="pisos_cc" value="<?php echo $dato['pisos_cc']; ?>" placeholder="Piso" /> 
				</div>
			
			<div class="DivInput">
				<p>Precio</p>
				

				<div class="DivPrecio">
					<input type="number" name="precio_inmueble" step="any" value="<?php echo $dato['precio_inmueble'] ?>" required placeholder="Precio del alquiler" />
					
						<?php 
							$sql_moneda = "SELECT * FROM alquiler_moneda ORDER BY nombre_moneda ASC";
							$result_moneda = mysql_query ($sql_moneda);
							if (!$result_moneda){
							   echo "La consulta SQL contiene errores.".mysql_error();
							   exit();
							}else {
								?>
									<select name="moneda_precio_inmueble" required>
					  					<option value="<?php echo $dato['moneda_precio_inmueble']; ?>"><?php echo $dato['moneda_precio_inmueble'] ?></option>
											<?php
												while ($row_moneda = mysql_fetch_row($result_moneda)){
													if ($row_moneda[1]==$dato['moneda_precio_inmueble']) {
														//no muestra nada
													} else {
									        			echo "
									  						<option value='".$row_moneda[1]."'>
									  							".$row_moneda[1]."
									  						</option>
									  				 	";
								  				 	}
								  				}
							  		echo "</select>";		
					  		} ?>	
				
				</div>
			</div>
			<div class="DivInput">
				<p>I.V.A (%)</p>
				<input type="number" name="iva_inmueble" value="<?php echo $dato['iva_inmueble']; ?>" placeholder="I.V.A (%)" /> 
			</div>
			<div class="DivInput">
				<p>Dirección</p>
				<input type="text" name="txtdireccion" maxlength="50" required value="<?php echo $dato["direccion_inmueble"]; ?>" />
			</div>
			<div class="DivInput">
				<p>Descripción detallada </p>
				<input type="text" name="txtdescripcion" maxlength="50" required value="<?php echo $dato["descripcion_inmueble"]; ?>" />
			</div>
			
			<input type="hidden" name="hidid" value="<?php echo $dato["id_inmueble"] ?>" />

			<div class="caja_botones">
				<br>
				<input type="submit" class="btnRegistrar" value="Actualizar" />
				<a href="Consultainmuebles.php" class="btnBorrar">Atrás</a>
			</div>
		</form>
		<div class="EspacioFinal"></div>
	</div>
</body>
</html>
