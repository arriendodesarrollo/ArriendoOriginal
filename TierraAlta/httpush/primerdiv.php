<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<script language="javascript" src="js/jquery-1.7.2.min.js"></script>
<script language="javascript">
var timestamp = null;
function cargar_push() 
{ 
	$.ajax({
	async:	true, 
    type: "POST",
    url: "httpush.php",
    data: "&timestamp="+timestamp,
	dataType:"html",
    success: function(data)
	{	
		var json    	   = eval("(" + data + ")");
		timestamp 		   = json.timestamp;
		mensaje     	   = json.mensaje;
		id        		   = json.id;
		status      	   = json.status;
		tipo      	   = json.tipo;
		
		if(timestamp == null)
		{
		
		}
		else
		{
			$.ajax({
			async:	true, 
			type: "POST",
			url: "mensajes.php",
			data: "",
			dataType:"html",
			success: function(data)
			{	
				$('#div'+tipo).html(data);
			}
			});	
		}
		setTimeout('cargar_push()',1000);
		    	
    }
	});		
}

$(document).ready(function()
{
	cargar_push();
});	 

</script>

</head>

<body>
	<style type="text/css">
		div{
			border: 1px solid #e3e3e3;
			padding: 10px;
			display: inline-block;
		}
	</style>
<div>
	<h1><center>div 1</center></h1>

	<div id="div1" style="width:200px; height:200px; float:left;">

	</div>
</div>



</body>
</html>