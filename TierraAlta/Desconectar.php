<?php
  session_start();
  unset($_SESSION["PARADAXMOSTRAR"]);
  unset($_SESSION["PARADAXTIPOMOSTRAR"]);
  unset($_SESSION["PARADAXUSUARIO"]);
  unset($_SESSION["PARADAXTIPO"]);
  session_destroy();
?> <script type="text/javascript"> window.location="Index.php";</script>
<?php  exit();
?>