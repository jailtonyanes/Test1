 
 <?php
  include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="../_javascript/jquery.js"></script>
<script type="text/javascript" src="../_javascript/mercancia.js"></script>
<link href="../screen.css" rel="stylesheet" type="text/css" media="all" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mercanc&iacute;a</title>
</head>

<body>
<div id="container">
<?php
 include('../_template/main_menu.php');
?>
<div id="content">
<h2>Ingresar Mercanc&iacute;a</h2>
<form id="calzado" name="calzado" method="post" action="">
  
<p>
    <label>* Tipo de mercacn&iacute;a:
      <input type="text" name="mercancia" id="mercancia" class="ancho" />
    </label>
  </p>

  <p>
    <label>
      <input type="button" name="guardar" id="guardar" value="Guardar" class="guarda" />
    </label>
  </p>
</form>
</div>
</div>
</body>
</html>