	<!DOCTYPE html>
	<html lang="es">
	<head>
	    <meta charset="UTF-8">
	    <title>Textos</title>
	    <script src="https://code.jquery.com/jquery-2.1.4.js"></script> 
	    <style type="text/css">
	    	.oculto1{
	    		display: none;
	    	}
	    </style>
	</head>
	<body>

	<div>
	    <div class="info1">
	        <button type="button">Click Me!</button>
	    </div>
	    <div class="oculto1">
	          Lorem ipsum dolor sit amet.
	    </div>
	</div>


	<script type="text/javascript">
	    jQuery(document).ready(function(){
	        	$('.info1').on('click',function(){
	            	$('.oculto1').slideToggle('fast');
	            });
	        }); 
	</script>

	</body>
	</html>