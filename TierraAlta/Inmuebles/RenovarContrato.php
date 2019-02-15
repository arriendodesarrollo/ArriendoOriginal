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
	$rif_inquilino=$_REQUEST["rif_inquilino"];
	$nombre_inquilino=$_REQUEST["nombre_inquilino"];
	$atras=$_REQUEST['atras'];
	$codfac=$_REQUEST['codigo_factura'];
	$cons=mysql_query("SELECT * FROM alquiler_inmueble WHERE estado_inmueble='Ocupado' and codigo_inmueble='$codigo_inmueble'",$conec);
	$dato=mysql_fetch_array($cons);
	$nfila=mysql_num_rows($cons);
?>
	<link rel="stylesheet" type="text/css" href="../css/estilos_archivos.css">
	<style type="text/css">
		.hr_asignar{
			margin-top: -125px;
			width: 100%;
			opacity: 0.4;
			position: absolute;
		}
		.gastos_administrativos{
			font-size: 15px !important;
			font-weight: bold;
		}
		.ancho{
			padding-left: 0px !important;
		}
		.cuadros_asignar{
			border-right: 3px solid #e3e3e3;
			width: 49%;
			display: inline-block;
			vertical-align: top;
		}
		.quitar_borde{
			border-right: none;
		}
		.select_disabled{
		    -webkit-appearance: none;
		    color: black;
		}
		.DivInput span{
			width: 40%;
			margin-left: -1%;
			vertical-align: top;
			box-sizing: border-box;
			font-size: 17px;
			padding: 10px 0px;
			display:inline-block;
			border: 1px solid rgba(0,0,0,0.3);
			background: transparent;
			box-shadow: 0px 0px 2px rgba(0,0,0,0.5);	
			color: rgba(0,0,0,1);
		}
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
		.FormModificar{
			width: 90%;
			left: 50%;
    		margin-left: -45%;
    		margin-top: 2%;
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
		input{
			color: black;
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
			position: right;
			width: 30%;
			height: 38px;
			padding-left: 10px;
			border-right: none;
			border-top: none;
			border-bottom: none;

		}
		.periodo input{
			width: 50%;
		}
		.periodo select{
			position: right;
			width: 50%;
			height: 38px;
			text-align:center;
			padding: 0px 25px;
		}

		.DivTotalPagar{
			width: 100%;
			text-align: center;
			font-size: 50px;
			box-sizing: border-box;
			margin-top: 25%;
			background: #fff;
		}
		.DivTotalPagar span{
			font-size: 30px;
			color: rgba(0,0,0,0.7);
			
		}
		.DivTotalPagar .input_resultado{
			border: none;
			box-shadow: none;
			text-decoration: none;
			width: 80%;
			
		}
		.DivTotalPagar .mostrar_resultado,.DivTotalPagar .mostrar_resultado input{
			color: #009900;
			font-size: 50px;
			text-align: right;
			
		}
		.suma{
			position: absolute;
			width: 50%;
			right: 50%;
			top: 43%;
		}
		
	</style>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".index").addClass("seleccionado");	
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

		<script>
			function fncMultiplicar(){
				caja=document.forms["form_asignar"].elements;
				var numero1 = Number(caja["iva_precio"].value);
				var numero2 = Number(caja["tiempo_alquiler"].value);
				resultado=numero1*numero2;
				
					if(!isNaN(resultado)){
					caja["resultado"].value=numero1*numero2;
					}
				
			}
			function fncSumar(){
				caja_sumar=document.forms["form_asignar"].elements;
				var numero1_sumar = Number(caja_sumar["meses_deposito"].value);
				var numero2_sumar = Number(caja_sumar["gastos_administrativos"].value);
				var numero3_sumar = Number(caja_sumar["gastos_legales"].value);

				var numero1_monto = Number(caja_sumar["iva_precio"].value);
				numero1_sumar=(numero1_sumar*numero1_monto);
				resultado_sumar=numero1_sumar+numero2_sumar+numero3_sumar;
				
					if(!isNaN(resultado_sumar)){
					caja_sumar["resultado_suma"].value=numero1_sumar+numero2_sumar+numero3_sumar;
					}
				
			}
		</script>
	  	<form method="post" name="form_asignar" class="FormModificar" action="GuardaContrato_renovar.php">
	  		<!--INPUT PARA CAMBIAR ESTADO DE CONTRATO ANTERIOR-->
	  		<input type="hidden" name="codigo_factura_vieja" value="<?php echo $codfac; ?>">
	  		<div class="TituloModalRegistro">Renovar Contrato</div>
	  		<div class="cuadros_asignar">
		  		<div class="TituloModalRegistro">Características del inmueble</div>

		  		<div class="DivInput">
					<p>Tipo de inmueble</p>
					<select class="select select_disabled" name="tipo_inmueble" id="select_tipo" required disabled>
						<?php if ($dato['tipo_inmueble']=='Independiente') { ?>
							<option value="<?php echo $dato["tipo_inmueble"]; ?>">
			  					Local Independiente
			  				</option>
						<?php } else if ($dato['tipo_inmueble']=='Local') { ?>
			  				<option id="localCC" value="<?php echo $dato["tipo_inmueble"]; ?>">
			  					Local en Centro Comercial
			  				</option>
		  				<?php } else if ($dato['tipo_inmueble']=='Residencia') { ?>
		  					<option id="residencia" value="<?php echo $dato["tipo_inmueble"]; ?>">
			  					Residencia
			  				</option>
		  				<?php } else { ?>
		  					<option value="<?php echo $dato["tipo_inmueble"]; ?>">
			  					<?php echo $dato["tipo_inmueble"]; ?>
			  				</option>
		  				<?php } ?>
		  				
					</select>
				</div>
				<div class="DivInput">
					<p>Código</p>
					<input type="text" readonly="readonly" name="codigo_inmueble" maxlength="15" required value="<?php echo $dato['codigo_inmueble'];?>" />
				</div>
				<div class="DivInput" id="tipo_residencia_inmueble">
					<p>Tipo de residencia</p>
					<select class="select select_disabled" disabled name="tipo_residencia_inmueble" required>
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
								<select class="select select_disabled" disabled name="codigo_cc" id="consulta_cc">
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
					<p>Cantidad de Pisos</p>
					<input type="number" name="pisos_cc" disabled value="<?php echo $dato['pisos_cc']; ?>" placeholder="Piso" /> 
				</div>
				<div class="DivInput">
					<p>Precio</p>
					<div class="DivPrecio">
						<input type="number" readonly="readonly" name="monto_cuota" disabled value="<?php echo $dato['precio_inmueble'] ?>" required placeholder="Precio del alquiler" />
						<input type="hidden"  name="moneda_precio_inmueble" value="<?php echo $dato['moneda_precio_inmueble'] ?>">
						<select required name="moneda_precio_inmueble" disabled class="select_disabled">
							<?php 
								if ($dato['moneda_precio_inmueble']=='U') { 
									$moneda='US$';
								?>
									<option value="U">US$</option>
									<option value="BsF">BsF</option>
								<?php } else {
										$moneda='BsF';
									?>
									<option value="B">BsF</option>
									<option value="U">US$</option>
								<?php }
							?>	
						</select>
					</div>
				</div>
				<div class="DivInput">
					<p>I.V.A (%)</p>
					<span><?php echo $dato['iva_inmueble']; ?> %</span>
					<input type="hidden" name="iva_inmueble" disabled required value="<?php echo $dato["iva_inmueble"]; ?>" />
				</div>
				<div class="DivInput">
					<p>Precio con I.V.A</p>
					<?php 
						$iva_precio=(1+$dato['iva_inmueble']/100)*$dato['precio_inmueble'];
					?>
					<input type="text" name="" readonly="readonly" value="<?php echo number_format($iva_precio, 2, ",", ".")." ".$moneda; ?>">
					<input type="hidden" name="iva_precio"  required onKeyUp="fncMultiplicar()" value="<?php echo $iva_precio; ?>" />
				</div>
				<div class="DivInput">
					<p>Dirección</p>
					<input title="<?php echo $dato["direccion_inmueble"]; ?>" type="text" name="" readonly="readonly" value="<?php echo $dato['direccion_inmueble']; ?>">
					<input type="hidden" name="txtdireccion" readonly maxlength="50" required value="<?php echo $dato["direccion_inmueble"]; ?>"  />
				</div>
				<div class="DivInput">
					<p>Descripción detallada </p>
					<input title="<?php echo $dato["descripcion_inmueble"]; ?>" type="text" name="" readonly="readonly" value="<?php echo $dato['descripcion_inmueble']; ?>">
					<input type="hidden" name="txtdescripcion" disabled maxlength="50" required value="<?php echo $dato["descripcion_inmueble"]; ?>" />
				</div>		
				<input type="hidden" name="hidid" value="<?php echo $dato["id_inmueble"] ?>" />
			</div>
			<div class="cuadros_asignar quitar_borde">
		  		<div class="TituloModalRegistro">Datos del contrato</div>
		  		<div class="DivInput">
					<p>Inquilino</p>
					<select class="select" name="rif_inquilino" required>
						<option value='<?php echo $rif_inquilino ?>'><?php echo $nombre_inquilino; ?></option>
					</select>
				  			
						
				</div>
				<div class="DivInput">
					<p>Fecha de alquiler</p>
					<input type="date" name="fecha_contrato" required/>
				</div>
				<div class="DivInput">
					<p>Periodo de alquiler</p>
					<div class="DivPrecio periodo">
						<input type="number" name="tiempo_alquiler" onKeyUp="fncMultiplicar()" required />
						<select required name="periodo_alquiler" class="select_disabled">
							<!--<option value="">Seleccione</option>
							<option value="Diario">		Diario		</option>
							<option value="Semanal">	Semanal		</option>
							<option value="Quincenal">	Quincenal	</option>-->
							<option value="Mensual">	Meses		</option>
							<!--<option value="Bimestral">	Bimestral	</option>
							<option value="Trimestral">	Trimestral	</option>
							<option value="Semestral">	Semestral	</option>
							<option value="Anual">		Anual		</option>-->
						</select>
					</div>
				</div>
				<!--
				<div class="DivInput">
					<p>Pago de la 1ª cuota</p>
					<select class="select" name="forma_pago" required>
	  					<option value="">Forma de pago</option>
				  		<option value="Transferencia">Transferencia</option>
				  		<option value="Efectivo">Efectivo</option>
			  		</select>
				</div>-->
				<div class="DivInput">
					<p>Depósito</p>
					<input type="number" onKeyUp="fncSumar()" name="meses_deposito" required placeholder="Meses de depósito" />
				</div>
				<div class="DivInput">
					<p class="gastos_administrativos" title="Los gastos administrativos son equivalentes a un mes de renta">Gastos Administrativos</p>
					<input type="number" onKeyUp="fncSumar()" name="gastos_administrativos" required value="<?php echo $iva_precio ?>" readonly="readonly" title="Los gastos administrativos son equivalentes a un mes de renta"/>
				</div>
				<div class="DivInput">
					<p>Gastos Legales</p>
					<div class="DivPrecio">
						<input type="number" onKeyUp="fncSumar()" name="gastos_legales" required />
						<select required name="moneda_gastos_legales" class="ancho">
							<?php 
								if ($dato['moneda_precio_inmueble']=='U') { 
									$moneda='US$';
								?>
									<option value="U">US$</option>
									
								<?php } else {
										$moneda='BsF';
									?>
									<option value="B">BsF</option>
								<?php }
							?>	
						</select>
					</div>
				</div>
				<div class="DivInput">
					<p class="gastos_administrativos">Mes Muerto (Opcional)</p>
					<input type="number" name="mes_muerto" />
				</div>
				<input type="hidden" name="estado_contrato" value="Vigente">
				<div class='DivTotalPagar' title="Consiste en la multiplación de la renta mensual con IVA del inmueble por el periodo de alquiler">
					<span>Total del contrato</span><br>
					<span class="mostrar_resultado"><input type="text" class="input_resultado" readonly name="resultado"/><?php echo $moneda; ?></span>
				</div>
				<div class="DivTotalPagar suma" title="Suma de los campos: Meses de depósito, gastos administrativos y gastos legales">
					<span>Pago Inicial</span><br>
					<span class="mostrar_resultado"><input type="text" class="input_resultado" readonly name="resultado_suma"/><?php echo $moneda; ?></span>
				</div>

			</div>
			<hr class="hr_asignar">
			<div class="caja_botones">
				<br>
				<input type="submit" class="btnRegistrar" value="Guardar">
				<?php
					if ($atras=='MostrarInmueblesOcupados') { ?>
						<a href="MostrarInmueblesOcupados.php?codigo_inmueble=<?php echo $codigo_inmueble; ?>" class="btnBorrar">Atrás</a>
					<?php } else if ($atras=='ContratosPorVencer') { ?>
						<a href="ContratosPorVencer.php?codigo_inmueble=<?php echo $codigo_inmueble; ?>" class="btnBorrar">Atrás</a>
					<?php } ?>
				
			</div>
			

		</form>

		<!-- SEPARADOR DE MILES (ARREGLAR)
		<input type="text" class="form-control" id="separadorMiles" placeholder="Separador de miles" name="resultado">
		<script type="text/javascript">
			var separador = document.getElementById('separadorMiles');

			separador.addEventListener('keyup', (e) => {
			    var entrada = e.target.value.split('.').join('');
			    entrada = entrada.split('').reverse();
			    
			    var salida = [];
			    var aux = '';
			    
			    var paginador = Math.ceil(entrada.length / 3);
			    
			    for(let i = 0; i < paginador; i++) {
			        for(let j = 0; j < 3; j++) {
			            "123 4"
			            if(entrada[j + (i*3)] != undefined) {
			                aux += entrada[j + (i*3)];
			            }
			        }
			        salida.push(aux);
			        aux = '';
			       
			        e.target.value = salida.join('.').split("").reverse().join('');
			    }
			}, false);
		</script>-->
		<div class="EspacioFinal"></div>
	</div>
</body>
</html>
