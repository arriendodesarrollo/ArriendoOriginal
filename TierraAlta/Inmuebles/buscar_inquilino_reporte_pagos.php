<?php
      include('../Conexion.php');
      $con=Conectarse();
  
      $buscar = $_POST['b'];

      if(!empty($buscar)) {
            $sql = mysql_query("SELECT * FROM alquiler_inquilino WHERE nombre_inquilino LIKE '%".$buscar."%' LIMIT 10" ,$con);
              
            $contar = @mysql_num_rows($sql);

            
            if($contar == 0){
                  echo "<center><h4>No se han encontrado resultados para: ".$b."</h4></center>";
            }else{
               
              while($row=mysql_fetch_array($sql)){
                $nombre = $row['nombre_inquilino'];
                $rif_inquilino = $row['rif_inquilino'];               
              ?>
                  <a href="ReportePagos.php?Nombre=Nombre&nombre_inquilino=<?php echo $nombre?>&rif_inquilino=<?php echo $rif_inquilino ?>"> <?php echo $nombre." - ".$rif_inquilino ?></a>

                <?php
                
            }
        }
      }

    
  
?>