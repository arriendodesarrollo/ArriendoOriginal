<?php session_start(); 
	include("Cabecera.php");
	if($_POST){
		$nombre_moneda=$_POST["nombre_moneda"];
		$cons=mysql_query("SELECT * FROM alquiler_moneda WHERE nombre_moneda LIKE '%$nombre_moneda%' ORDER BY nombre_moneda",$conec);
		$dato=mysql_fetch_array($cons);
		$nfila=mysql_num_rows($cons);
	} else {
		$cons=mysql_query("SELECT * FROM alquiler_moneda ORDER BY nombre_moneda ASC",$conec);
		$dato=mysql_fetch_array($cons);
		$nfila=mysql_num_rows($cons);
	}
	
?>
	<meta charset="utf-8">
	<script type="text/javascript">
		$(document).ready(function(){
			$(".monedaLink").addClass("seleccionado");
		});
	</script>
	<link rel="stylesheet" type="text/css" href="../css/estilos_archivos.css">
	<style type="text/css">
		.formSelectOrdenar{
			float: right;
			margin-bottom: 15px;
			margin-right: 4%;
			font-size: 20px;
		  	color: rgba(0,0,0,0.5);
		  	padding: 10px;
		}
		.formSelectOrdenar select{
			width: 100%;
			border: 1px solid rgba(0,0,0,0.2);
			margin-top: 5px;
			cursor: pointer;
			padding-left: 10px;
		}
		.formSelectOrdenar select option{
			border-bottom: 1px solid rgba(0,0,0,0.2);
			padding: 10px;
		}
		.seleccionado_option{
			border-left: 5px solid #3e94ec;
			background: #efefef;
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
		.DivInput{
			margin: 0;
			text-align: center;
			margin-top: 10px;
			width: 40%;
			margin-left: 6%;
			display: inline-block;
			background: #efefef;
			box-shadow: 0px 0px 2px rgba(0,0,0,0.5);	
		}
		.DivInput p{
			
			box-sizing: border-box;
			color: rgba(0,0,0,0.9);
			padding: 10px 20px;
			font-size: 18px;
			
			text-align: center;
			margin: 0;
			border-top-left-radius: 5px;
			border-bottom-left-radius: 5px;
		}
		.DivInput input{
			display: block;
			margin:0;
			width: 100%;
			box-shadow: none;
			background: white;
			text-align: center;
		}
		.form_buscar{
			margin-top: -70px;
			margin-right: 3%;
		}
		.tabla_menu{
			margin-left: -49.5%;
		}
		.tabla_menu th{
			box-sizing: border-box !important;
			padding: 10px 0px;
			text-align: center;
			font-size: 17px;
		}
		.tabla_menu th:nth-child(1){
			padding: 5px;
		}
		.tabla_menu th:nth-child(5){
			padding: 10px 5px;
		}
		.tabla_menu th:nth-child(7),.tabla_menu th:nth-child(8){
			padding: 10px;
		}
		.tabla_menu td:nth-child(10),.tabla_menu td:nth-child(11){
			padding: 10px;
		}
		.FormInsertar {
			text-align: center;
			width: 30%;
			margin-left: -15%;
			margin-top: 15%;
		}
		.FormInsertar input:nth-child(2){
			width: 80%;
			margin-left: 0%;
			margin-bottom: -15%;
		}
		.cuadroRubro{
			border: 4px solid #3e94ec;
			background: transparent;
			color: black;
			font-size: 25px;
			display: inline-block;
			padding: 10px;
			margin-left: 5%;
			margin-top: 3%;
			position: relative;
			box-sizing: border-box;
			box-shadow: 0px 0px 5px rgba(0,0,0,0.5); 
		}
		.acciones{
			text-align: center;
			margin: 0;
			margin-top: -1%;
			margin-left: -1%;
			background: rgba(0,0,0,1);
			display: none;
			padding: 5px 1px;
			width: 100%;
			top: 0;
			left: 0;
			position: absolute;
			z-index: 1;
		}

		.acciones a{
			display: inline-block;

		}
		.acciones a img{
			vertical-align: top;
			width: 30px;
			height: 30px;
			opacity: 0.7;
			border: 2px solid transparent;
			border-radius: 5px;
			padding: 5px 4px;
		}
		.acciones a img:hover{
			opacity: 1;
			border: 2px solid white;
		}
		
		.cuadroRubro:hover .acciones{
			display: block;
		}
		.cuadroR bro:hover span{
			position: absolute;
		}
	</style>
	
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
	  		<a href="pdf_moneda.php" <?php echo $disabled; ?> title="<?php echo $titulo; ?>"><img src="../IMAGEN/print-printer-tool-with-printed-paper-outlined-symbol_icon-icons.png"></a>
	  	</div>
	  	<!--INICIO - INSERTAR VENTANA MODAL-->
	  	<div id="Modal_insertar">
	  		<a href="#" class="Cerrar">x</a>
	  		<form method="post" class="FormInsertar" action="GuardaMoneda.php">
	  			<div class="TituloModalRegistro">Registrar Moneda</div>
	  			<input type="text" name="nombre_moneda" maxlength="40" min="3" required placeholder="Nombre de la moneda"  />

				<div class="caja_botones">
					<input type="submit" class="btnRegistrar" value="Guardar" />
				</div>
	  		</form>
	  	</div>
		<form class="form_buscar" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
	  		<span>Moneda</span>
			<input type="search" class="form_inputText" name="nombre_moneda" autofocus="autofocus" value="<?php echo $nombre_moneda; ?>" maxlength="20" placeholder="Buscar Moneda"/>
			<input type="submit" hidden name="btnbuscar" value="Ir" class="btnBuscar" />
		</form>

		
		<br><br>
			<?php if($nfila>0) {
				
					$i=1;
					do{
						if($i==1){
							$i=2;
							?>

							<div class="cuadroRubro">
								<div class="acciones">
									<a  href="EdicionMoneda.php?nombre_moneda=<?php echo $dato['nombre_moneda']?> " onclick="return confirm('¿Está seguro que desea Modificar este archivo?')"><img src="../IMAGEN/modificar.png" title="Modificar"></a>
									<a  href="eliminarMoneda.php?nombre_moneda=<?php echo $dato['nombre_moneda']?> " onclick="return confirm('¿Está seguro que desea Eliminar este archivo?')"><img src="../IMAGEN/eliminar_48x48.png" title="Eliminar"></a>
								</div>
								<span class="TextoRubro"><?php echo $dato['nombre_moneda']; ?></span>
							</div>
						<?php
						} else if($i==2){
							$i=1;
							?>
							<div class="cuadroRubro">
								<div class="acciones">
									<a  href="EdicionMoneda.php?nombre_moneda=<?php echo $dato['nombre_moneda']?> " onclick="return confirm('¿Está seguro que desea Modificar este archivo?')"><img src="../IMAGEN/modificar.png" title="Modificar"></a>
									<a  href="eliminarMoneda.php?nombre_moneda=<?php echo $dato['nombre_moneda']?> " onclick="return confirm('¿Está seguro que desea Eliminar este archivo?')"><img src="../IMAGEN/eliminar_48x48.png" title="Eliminar"></a>
								</div>
								<span class="TextoRubro"><?php echo $dato['nombre_moneda']; ?></span>
							</div>
						<?php
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