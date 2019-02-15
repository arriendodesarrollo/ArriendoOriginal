<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
	<style type="text/css">
		form{
			border: 1px solid gray;
			display: inline-block;
			padding: 15px;
			text-align: center;
		}
		input{
			display: block;
			padding: 10px;
			margin-bottom: 10px;
		}
	</style>
	<form action="insertar.php" method="post">
		<input type="text" name="mensaje" placeholder="Despacho" />
		<input type="hidden" value="1" name="tipo" />
		<input type="submit" value="enviar" />
	</form>
	<form action="insertar1.php" method="post">
		<input type="text" name="mensaje" placeholder="Compras" />
		<input type="hidden" value="2" name="tipo" />
		<input type="submit" value="enviar" />
	</form>
</body>
</html>