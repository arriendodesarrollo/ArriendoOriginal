<?php
//conexion a la base de datos
include("../conexion.php"); 
$conec=Conectarse();

//consulta a la tabla "alquiler_renta_detalle"
$sql = "SELECT GROUP_CONCAT(cuota_renta SEPARATOR ', ') FROM alquiler_renta_detalle GROUP BY fecha_cuota_pagada, hora_cuota_pagada;";
$result = mysql_query ($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<!--si la consulta es correcta comienza el siguiente IF-->
<?php
    if($result>0) {
        while ($row = mysql_fetch_row($result)){
                //Obtenemos la primera columna, el GROUP_CONCAT
                $cuotas = $row[0];
                echo "Cuotas: ".$cuotas."<br>";
            }

        }
    
?>