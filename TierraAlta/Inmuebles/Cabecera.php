<?php
	if($_SESSION['TierraAlta_TipoMostrar']==NULL){
		header("location: ../index.php");  
	}else if($_SESSION['TierraAlta_TipoMostrar']=='DEPOSITARIO'){
		header("location: ../DEPOSITARIO/index.php");  
	}else if($_SESSION['TierraAlta_TipoMostrar']=='ADMIN_INVENTARIO'){
		header("location: ../ADMINISTRADOR/index.php");
	}		
include("../Conexion.php");
$conec=Conectarse();
if (!$conec) { ?>
<script language="javascript"> alert("ERROR: Falla en la Conexión Con el Servidor");</script>
<?php exit(); } ?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Administrador - Tierra Alta</title>
	<meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">
	<link rel="shortcut icon" type="image/x-icon" href="../IMAGEN/logo_ico.png"/>
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/script.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/estilos_admin.css">



</head>

<body>
	<!--Cabecera-->
	<header class="headerCabecera">
		<div class="TituloAdministrador">ADMINISTRADOR</div>
		<nav class="navegador">
			<div id="fecha"></div>
			<div class="datos_usuario">
				<img class="usuario_imagen" src="../IMAGEN/ic_person_black_36dp1.png">
				<img class="usuario_imagen" src="../IMAGEN/ic_keyboard_arrow_down_white_36dp.png">
			</div>
			<div id="MenuDatosUsuario" style="display:none">
				<p onclick="window.location='usuarios.php'"><?php echo strtoupper($_SESSION["TierraAlta_Mostrar"])." "; ?></p>
				
				<?php if($_SESSION["TierraAlta_TipoMostrar"]=="ADMIN_PRINCIPAL") { ?>
					<p onclick="window.location='../index_escoger.php'">Cambiar de sistema</p>
				<?php } ?>
		    	<p onclick="window.location='../Desconectar.php'">Cerrar Sesión</p>
		    	
			</div>
		</nav>
	</header>

	<!--Seccion 1-->
	<section class="seccion1">
		<div class="cuadroMenu">
			<li class="index">
				<a href="index.php" id="Principal">
					<img src="../IMAGEN/HOME_32x32-321.png">
					<span class="MenuTexto">Control de Alquiler</span>
				</a>
			</li>
		    
		    <li class="inquilinoLink">
		    	<a  href="ConsultaInquilinos.php">
		    		<img src="../IMAGEN/ic_person_black_36dp1.png">
		    		<span class="MenuTexto" id="idTexto">Inquilinos</span>
		    	</a>
		    </li>
		    <li class="ccLink">
		    	<a href="ConsultaCentroComercial.php">
		    		<img src="../IMAGEN/ic_location_city_white_48dp.png">
		    		<span class="MenuTexto" id="idTexto">Centro Comercial</span>
		    	</a>
		    </li>
		    
		    <li class="inmueblesLink">
		    	<a href="ConsultaInmuebles.php">
		    		<img src="../IMAGEN/ic_store_white_48dp.png">
		    		<span class="MenuTexto" id="idTexto">Inmuebles</span>
		    	</a>
		    </li>
		    <li class="monedaLink">
		    	<a href="ConsultarMoneda.php">
		    		<img src="../IMAGEN/moneda.png">
		    		<span class="MenuTexto" id="idTexto">Moneda</span>
		    	</a>
		    </li>
		    <li class="contratosLink">
		    	<a href="historial_contratos.php">
		    		<img src="../IMAGEN/FILE - TEXT_48x48-32.png">
		    		<span class="MenuTexto" id="idTexto">Historial de Contratos</span>
		    	</a>
		    </li>
		    <li  class="reportesLink">
		    	<a href="ReportePagos.php">
		    		<img src="../IMAGEN/ic_beenhere_white_48dp.png">
		    		<span class="MenuTexto" id="idTexto">Reportes de Pagos</span>
		    	</a>
		    </li>
			<li>
				<a href="#" id="MenuAdministracion">
					<img src="../IMAGEN/SETTINGS_32x32-321.png">
					<span class="MenuTexto">Administración</span>
					<div>
						<img id="flechaAdministracion" src="../IMAGEN/ic_keyboard_arrow_left_white_36dp.png">
					</div>
				</a>
			</li>
			<div id="SubMenuAdministracion" style="display:none">
				
		    	<?php 
					if ($_SESSION['TierraAlta_TipoMostrar']=='ADMIN_PRINCIPAL') { ?>
						<a class="SubMenuAdminLink2" href="usuarios.php">Usuarios</a>
				<?php } else { ?>
					<a class="SubMenuAdminLink2" href="usuarios.php">Mi Usuario</a>
				<?php }
				 ?>
		    	<a class="SubMenuAdminLink1" href="desarrollador.php">Desarrollador</a>
			</div>
			<div class="EspacioFinal"></div>
		</div>
	</section>
	<section class="seccion2">
		<div class="cuadroPrincipal">
			
		</div>
	</section>