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
		$nombre_inquilino=$_POST["nombre_inquilino"];
		$cons=mysql_query("SELECT * FROM alquiler_inquilino WHERE nombre_inquilino LIKE '%$nombre_inquilino%' ORDER BY rif_inquilino ASC",$conec);
		$dato=mysql_fetch_array($cons);
		$nfila=mysql_num_rows($cons);
	} else {
		$cons=mysql_query("SELECT * FROM alquiler_inquilino ORDER BY rif_inquilino ASC",$conec);
		$dato=mysql_fetch_array($cons);
		$nfila=mysql_num_rows($cons);
	}
?>
	<link rel="stylesheet" type="text/css" href="../css/estilos_archivos.css">
	<style type="text/css">
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
		.td_telefono{
			width: 100px;
		}
	</style>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".inquilinoLink").addClass("seleccionado");	
		});
	</script>
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
	  		<a href="pdf_inquilinos.php?rif_inquilino=<?php echo $dato['rif_inquilino']?> " <?php echo $disabled; ?> title="<?php echo $titulo; ?>"><img src="../IMAGEN/print-printer-tool-with-printed-paper-outlined-symbol_icon-icons.png"></a>
	  	</div>
	  	<!--INICIO - INSERTAR VENTANA MODAL-->
	  	<div id="Modal_insertar">
	  		<a href="#" class="Cerrar">x</a>
	  		<form method="post" class="FormInsertar" action="Guardainquilino.php">
	  			<div class="TituloModalRegistro">Registrar Inquilino</div>
	  			<input type="text"   name="rif_inquilino" maxlength="20" required placeholder="Rif"  />
				<input type="text"   name="txtnombre"  	maxlength="30" required placeholder="Razón Social" />
				<input type="number" name="txttelefono1" maxlength="20" 	 required placeholder="Teléfono 1" />
				<input type="number" name="txttelefono2" maxlength="20"  	placeholder="Teléfono 2 (Opcional)" />
				<input type="text" 	 name="txtcorreo"	maxlength="50" required placeholder="Correo" />
				<input type="text" 	 name="txtdireccion" maxlength="50" required placeholder="Dirección" />
				
				<div class="caja_botones">
					<input type="submit" class="btnRegistrar" value="Guardar" />
				</div>
	  		</form>
	  	</div>
		<form class="form_buscar" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
	  		<span>Inquilinos</span>
			<input type="search" class="form_inputText" name="nombre_inquilino" autofocus="autofocus" value="<?php echo $nombre_inquilino; ?>" placeholder="Buscar inquilino" /> 
			<input type="submit" name="btnbuscar" hidden value="Ir" class="btnBuscar" />
		</form>
		<br><br>
		<table class="tabla_menu">
			<?php if($nfila>0) { ?>
				<tr>
					<th>Rif</th>
					<th>Razón Social</th>
					<th>Teléfono</th>
					<th>Dirección</th>
					<th>Correo</th>
					<th>Inmuebles Alquilados</th>
					<th>Acción</th>
				</tr>
				<?php
					$i=1;
					do{
						if($i==1){
							$Telefono1 = $dato['telefono1_inquilino'];
							$area1 = substr($Telefono1, 0, 4);
							$numero1 = substr($Telefono1, 4, 16);
							$Telefono1 = $area1 . '-' . $numero1;
							if ($dato['telefono2_inquilino']==0) {
								$Telefono2 = "";
							} else {
								$Telefono2 = $dato['telefono2_inquilino'];
								$area2 = substr($Telefono2, 0, 4);
								$numero2 = substr($Telefono2, 4, 16); //el maximo permito para los telefonos es 20 numeros
								$Telefono2 = "<br>".$area2 . '-' . $numero2;
							}
							$rif_inquilino=$dato['rif_inquilino'];
							$sql_inmueble = "SELECT * FROM alquiler_renta WHERE rif_inquilino='$rif_inquilino' and estado_contrato='Vigente'";
							$result_inmueble = mysql_query ($sql_inmueble);

							$i=2;
							echo "<tbody>
									<tr>
										<td>".$dato['rif_inquilino']."</td>
										<td>".$dato['nombre_inquilino']."</td>
										<td class='td_telefono'>".$Telefono1.$Telefono2."</td>
										<td>".$dato['direccion_inquilino']."</td>
										<td>".$dato['correo_inquilino']."</td>";
										if($result_inmueble>0) {
											echo "<td>";
											while ($row_inmueble = mysql_fetch_row($result_inmueble)){
							    				echo $row_inmueble[1]."<br>";
											} 
										} 

										echo "</td>";
										?>
										<td>
											<div class="cuadroRubro">
												<div class="acciones">
													<a  href="Edicioninquilino.php?rif_inquilino=<?php echo $dato['rif_inquilino']?> " onclick="return confirm('¿Está seguro que desea Modificar este archivo?')"><img src="../IMAGEN/modificar.png" title="Modificar"></a>
													<a  href="eliminarinquilino.php?rif_inquilino=<?php echo $dato['rif_inquilino']?> " onclick="return confirm('¿Está seguro que desea Eliminar este archivo?')"><img src="../IMAGEN/eliminar_48x48.png" title="Eliminar"></a>
												</div>
											</div>
										</td>
										<?php
									echo "</tr>
							</tbody>";
						} else if($i==2){
							$Telefono1 = $dato['telefono1_inquilino'];
							$area1 = substr($Telefono1, 0, 4);
							$numero1 = substr($Telefono1, 4, 16);
							$Telefono1 = $area1 . '-' . $numero1;
							if ($dato['telefono2_inquilino']==0) {
								$Telefono2 = "";
							} else {
								$Telefono2 = $dato['telefono2_inquilino'];
								$area2 = substr($Telefono2, 0, 4);
								$numero2 = substr($Telefono2, 4, 16); //el maximo permito para los telefonos es 20 numeros
								$Telefono2 = "<br>".$area2 . '-' . $numero2;
							}
							$rif_inquilino=$dato['rif_inquilino'];

							$sql_inmueble2 = "SELECT * FROM alquiler_renta WHERE rif_inquilino='$rif_inquilino' and estado_contrato='Vigente'";
							$result_inmueble2 = mysql_query ($sql_inmueble2);

							$i=1;
							echo "<tbody>
									<tr>
										<td>".$dato['rif_inquilino']."</td>
										<td>".$dato['nombre_inquilino']."</td>
										<td class='td_telefono'>".$Telefono1.$Telefono2."</td>
										<td>".$dato['direccion_inquilino']."</td>
										<td>".$dato['correo_inquilino']."</td>";
										if($result_inmueble2>0) { 
											echo "<td>";
											while ($row_inmueble2 = mysql_fetch_row($result_inmueble2)){
							    				echo $row_inmueble2[1]."<br>";
											}
											
										} else {
											echo "No";
										}
										echo "</td>";
										?>
										<td>
											<div class="cuadroRubro">
												<div class="acciones">
													<a  href="Edicioninquilino.php?rif_inquilino=<?php echo $dato['rif_inquilino']?> " onclick="return confirm('¿Está seguro que desea Modificar este archivo?')"><img src="../IMAGEN/modificar.png" title="Modificar"></a>
													<a  href="eliminarinquilino.php?rif_inquilino=<?php echo $dato['rif_inquilino']?> " onclick="return confirm('¿Está seguro que desea Eliminar este archivo?')"><img src="../IMAGEN/eliminar_48x48.png" title="Eliminar"></a>
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
