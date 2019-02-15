<?php 
function Conectarse() 
{ 
   if(!(@$conec=mysql_connect("localhost","root","masterkey"))) 
   { 
   ?>
   <script language="javascript"> alert("ERROR: Conectando a la base de datos");window.location="Index.php";</script>
   <?php
   exit();  	
   } 
   if(!mysql_select_db("TierraAlta",$conec)) 
   {    
   ?>
   <script language="javascript"> alert("ERROR: al Buscar la base de datos");window.location="Index.php";</script> 
   <?php
   exit();  	
   } 
   @mysql_query("SET NAMES 'utf8'",$conec);
   return $conec; 
} 
?>