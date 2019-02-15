<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tierra Alta</title>
	<link rel="shortcut icon" type="image/x-icon" href="IMAGEN/logo_ico.png" />
	<style type="text/css">

		body{
			background-image: url(IMAGEN/4017.jpg);
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
			background-attachment: fixed !important;
		    background-position: 50% 50% !important;
			background-repeat: no-repeat;
			margin: 0;
			padding: 0;
		}
		.Titulo_SesionAdmin {
			text-align: center;
			width: 100%;
			box-sizing: border-box;
		}
		.Titulo_SesionAdmin img{
			width: 450px;
			height: 90px;
		}
		.divsesion {
		    background-color: #fff;
		    border: 1px solid #e6e6e6;
		    border-radius: 1px;
		    padding: 10px 0;
		    width: 40%;
			position:absolute;
			left: 50%;
			margin-left: -20%;
			height: 50%;
			top: 50%;
			margin-top: -12%;
			box-shadow: 0px 0px 5px #000;
			border-radius: 5px;
		}
		.formadmin {
		    display: -webkit-box;
		    display: -ms-flexbox;
		    display: flex;
		    -webkit-box-orient: vertical;
		    -webkit-box-direction: normal;
		    -ms-flex-direction: column;
		    flex-direction: column;
		}
		.inputform {
		    background: 0 0;
		    border: 1px solid #dbdbdb;
		    border-radius: 3px;
		    box-sizing: border-box;
		    color: #262626;
		    font-size: 14px;
		    padding: 9px 8px 7px;
		    -webkit-appearance: none;
		    width: 100%;
		}
		.casillasform {
		    margin: 0 40px 6px;
		}
		.formadmin input[value],.IntentarNuevo{
			position: relative;
			border: 2px solid #4cb1ff;
			color: white;
			background: #4cb1ff;
			font-size: 17px;
			box-sizing: border-box;
		    padding: 10px;
		    width: 50%;
		    left: 50%;
		    margin-left: -25%;
		    text-align: center;
		    cursor: pointer;
		    font-weight: bold;
		    margin-top: 10px;
		    display: block;
		    border-radius: 5px;
		}
		.formadmin input[value]:hover,.IntentarNuevo:hover{
			-webkit-box-shadow: 1px 1px 10px 2px rgba(0,0,0,0.3);
		    -moz-box-shadow: 1px 1px 10px 2px rgba(0,0,0,0.3);
		  	box-shadow: 1px 1px 10px 2px rgba(0,0,0,0.3);
		}
		.error,.InicioCorrecto{
			width: 80%;
			position: relative;
			font-size: 20px;
			box-sizing: border-box;
		    padding: 10px;
		    width: 80%;
		    left: 50%;
		    margin-left: -40%;
		    text-align: center;
		    font-weight: bold;
		    margin-top: 10px;
		    display: block;
		    border-radius: 5px;
		}
		.error{
			background: rgba(255, 0, 0, 0.3);
			color: rgba(0,0,0,0.7);
		}
		.InicioCorrecto{
			background: rgba(0, 255, 0,0.2);
			color: rgba(0, 0, 0,0.7);
		}
		.IntentarNuevo{
			margin-top: 40px;
			background: rgba(255,0,0,0.6);
			border: none;
			text-decoration: none;
		}
		.gif{
			height: 50px;
			width: 50px;
		}
	</style>
</head>
<body>	
<!--INICIO - CODIGO PHP INICIAR SESION-->
	<?php 
		if(isset($_POST['Entrar'])){
			include("Conexion.php");
			$conec=conectarse();
			mysql_set_charset('utf-8',$conec);
			$usuario=$_POST['usuario'];  
			$clave=($_POST['clave']);
			$cons=mysql_query("SELECT id_usuario,tipo from usuarios where usuario='$usuario' and clave='$clave'",$conec);
			$dato=mysql_fetch_array($cons);
			$nfila=mysql_num_rows($cons);
			if($nfila<1)  {
				$error=1;
			}
			$tipo=$dato['tipo'];
			$_SESSION["TierraAlta_Mostrar"]=$usuario;
			$_SESSION["TierraAlta_TipoMostrar"]=$tipo;
			$_SESSION["TierraAlta_Usuario"]=md5($usuario);
			$_SESSION["TierraAlta_Tipo"]=md5($tipo);
			$_SESSION["IDTierraAlta_Mostrar"]=$dato["id"];
		}		
	?>

	<div class="divsesion">
		<h1 class="Titulo_SesionAdmin"><img src="IMAGEN/logo_negro.jpg"></h1>
		
			<?php
				if ($error==1) {
					?>
					<span class="error">Usuario o Contraseña incorrecta</span>
					<a href="index.php" class="IntentarNuevo">Intentar de nuevo</a>
					<form  style='display:none;'>
					<?php
				}
				if(isset($_SESSION["TierraAlta_Usuario"])) { 
					if($_SESSION["TierraAlta_TipoMostrar"]=="ADMIN_PRINCIPAL") { 
						
						?>
						<span class="InicioCorrecto">Bienvenido administrador</span>
						<br><br>
						<center><img class="gif" src="IMAGEN/loader.gif"></center>
						<meta http-equiv="refresh" content="1.5;url=index_escoger.php"> 
						<p  style='display:none;'>
						<?php
						exit();

					}
					if($_SESSION["TierraAlta_TipoMostrar"]=="ADMIN_INVENTARIO") { 
						
						?>
						<span class="InicioCorrecto">Bienvenido administrador</span>
						<br><br>
						<center><img class="gif" src="IMAGEN/loader.gif"></center>
						<meta http-equiv="refresh" content="1.5;url=ADMINISTRADOR/index.php"> 
						<p  style='display:none;'>
						<?php
						exit();

					}
					if($_SESSION["TierraAlta_TipoMostrar"]=="DEPOSITARIO") {
						?>
						<span class="InicioCorrecto">Bienvenido Jefe de Deposito</span>
						<br><br>
						<center><img class="gif" src="IMAGEN/loader.gif"></center>
						<meta http-equiv="refresh" content="1.5;url=DEPOSITARIO/index.php"> 
						<p  style='display:none;'>
						<?php exit();
					}
					if($_SESSION["TierraAlta_TipoMostrar"]=="ADMIN_INMUEBLE") {
						?>
						<span class="InicioCorrecto">Bienvenido administrador</span>
						<br><br>
						<center><img class="gif" src="IMAGEN/loader.gif"></center>
						<meta http-equiv="refresh" content="1.5;url=Inmuebles/index.php"> 
						<p  style='display:none;'>
						<?php exit();
					}
				}
			?>
		
		<form class="formadmin" method="POST" action="#">		

			

			<div class="casillasform">
				<input class="inputform" name="usuario" autofocus maxlength="20" placeholder="Usuario" type="text" required />
			</div>
			<div class="casillasform">
				<input class="inputform" name="clave" placeholder="Contraseña" maxlength="20" type="password" required />
			</div>
			<input type="submit" name="Entrar" value="Entrar">
		</form>
	</div>

	
</body>
</html>