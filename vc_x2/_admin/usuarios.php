<?php
   session_start();
  if(!isset($_SESSION['user_authorized'])) header("Location: ../index.php");
  include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="../_javascript/jquery.js"></script>
<script type="text/javascript" src="../_javascript/usuarios_sis.js"></script>
<script type="text/javascript" src="../_javascript/jquery.formatCurrency-1.4.0.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Crear Categor&iacute;as</title>
<link href="../screen.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>

<div id="container">
  
   
    
	<?php 
     include('../_template/main_menu.php');
    ?>
 <div id="content">  
<h2 class="datos_cli">Crear Categor&iacute;as</h2>


<form id="clientes" name="clientes" method="post" action="">
  <p>
    <label>* Nombre:
      <input type="text" name="categoria_nombre" id="categoria_nombre"  class="ancho"/>
    </label>
  </p>
  
 
  <p>
    <label>
      <input type="button" name="guardar" id="guardar" value="Guardar"  class="guarda"/>
    </label>
  </p>
</form>


</div>
</div>
</body>
</html>