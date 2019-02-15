
<?php 
include("../Conexion.php");
$conec=Conectarse();
if(!$conec) { ?>
<meta charset="utf-8">
<script language="javascript"> alert("ERROR: Falla en la Conexión Con el Servidor");</script>
<?php exit(); }
$usuario=$_POST["txtusuario"];
$clave=$_POST["txtclave"];
$cedula=$_POST["txtcedula"];
$correo=$_POST["txtcorreo"];
$tipo=$_POST["txttipo"];
$id=$_POST["hidid"];

if($id==NULL) {
$sql=mysql_query("SELECT id_usuario from usuarios where id_usuario='$id'",$conec);
$nfila=mysql_num_rows($sql);
if($nfila>0) { ?>
<script language="javascript">alert("YA EXISTE EL USUARIO");window.location="usuarios.php";</script>
<?php exit(); }
mysql_query("INSERT into usuarios values ('$id','$usuario','$clave','$cedula','$correo','$tipo')",$conec);
$sqlerror=mysql_error($conec);
if(!empty($sqlerror)) { ?>
<script language="javascript">alert("NO SE PUDO REGISTRAR EL USUARIO");window.location="usuarios.php";</script>
<?php }
else { ?>
<script type="text/javascript">alert("Usuario Registrado");window.location="usuarios.php";</script>
<?php }
}
else
{
$sql=mysql_query("SELECT id_usuario from usuarios where id_usuario<>'$id' and cedula_usuario='$cedula'",$conec);
$nfila=mysql_num_rows($sql);
if ($nfila>0) { ?>
<script language="javascript">alert("YA EXISTE OTRO USUARIO CON LA MISMA CEDULA");window.location="usuarios.php";</script>
<?php exit(); }
$sql=mysql_query("SELECT usuario from usuarios where id_usuario<>'$id' and usuario='$usuario'",$conec);
$nfila=mysql_num_rows($sql);
if ($nfila>0) { ?>
<script language="javascript">alert("YA EXISTE OTRO PERSONA CON EL MISMO USUARIO");window.location="usuarios.php";</script>
<?php exit(); }
$sql=mysql_query("SELECT id_usuario from usuarios where id_usuario='$id'",$conec);
$dato=mysql_fetch_array($sql);
mysql_query("UPDATE usuarios set id_usuario='$id',usuario='$usuario',clave='$clave',cedula_usuario='$cedula',correo_usuario='$correo',TIPO='$tipo' where id_usuario='$id'",$conec);
if(!($dato["ID"]==$id)) {
mysql_query("UPDATE usuarios set id_usuario='$id' where id_usuario='".$dato['id_usuario']."'",$conec);}
$sqlerror=mysql_error($conec);
if(!empty($sqlerror)) { ?>
<script language="javascript">alert("NO SE PUDO ACTUALIZAR EL USUARIO");window.location="usuarios.php";</script>
<?php }
else { ?>
<script type="text/javascript">alert("Usuario Actualizado");window.location="usuarios.php";</script>
<?php  }  } ?>
</body>
</html>