<? 
session_start();
if($_SESSION['TierraAlta_TipoMostrar']==NULL){
	header("location: index.php");  
}else if($_SESSION['TierraAlta_TipoMostrar']=='DEPOSITARIO'){
	header("location: DEPOSITARIO/index.php");  
}else if($_SESSION['TierraAlta_TipoMostrar']=='ADMIN_INMUEBLE'){
	header("location: Inmuebles/index.php");  
}else if($_SESSION['TierraAlta_TipoMostrar']=='ADMIN_INVENTARIO'){
	header("location: ADMINISTRADOR/index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tierra Alta</title>
	<link rel="shortcut icon" type="image/x-icon" href="IMAGEN/logo_ico.png"/>

	<style type="text/css">
		body{
			
		  	background-color: rgba(0, 0, 0, 0.7);
			
		}
		.BotonElegirPersona{
			position:absolute;
			background: transparent;
			color: white;
			border: 2px solid white;
			font-size: 25px;
			box-sizing: border-box;
		    padding: 15px;
		    width: 50%;
		    left: 50%;
		    margin-left: -25%;
		    text-align: center;
		    cursor: pointer;
		    font-weight: bold;
		    -webkit-transition: 0.2s;
			-moz-transition:0.2s;
			-o-transition:0.2s;
			transition:0.2s;
			margin-top: 170px;
			text-decoration: none;
		}
		.BotonElegirPersona:nth-child(2){
			margin-top: 350px;
		}
		.BotonElegirPersona:hover{
			-webkit-transition: 0.2s;
			-moz-transition:0.2s;
			-o-transition:0.2s;
			transition:0.2s;
			transform: scale(1.05);
			border-color: #4cb1ff;
		}
		img{
			vertical-align: top;
			margin-right: 10px
		}		
	</style>
</head>
<body>
	

<div id="ReservaModal">
      
      <a href="ADMINISTRADOR/index.php" class="BotonElegirPersona"><img src="IMAGEN/274892-32.png">Control de inventario</a>
      <a href="Inmuebles/index.php" class="BotonElegirPersona"><img src="IMAGEN/HOME_32x32-321.png">Control de alquiler </a>
</div>
</body>
</html>