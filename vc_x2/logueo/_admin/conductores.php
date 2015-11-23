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
<script type="text/javascript" src="../_javascript/conductores.js"></script>
<script type="text/javascript" src="../_javascript/jquery.formatCurrency-1.4.0.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Crear Usuarios</title>
<link href="../screen.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>

<div id="container">
  
   
    
	<?php 
     include('../_template/main_menu.php');
    ?>
 <div id="content">  
<h2 class="datos_cli">Datos del Conductor</h2>


<form id="clientes" name="clientes" method="post" action="">
  <p>
    <label>* Nombres:
      <input type="text" name="nombre" id="nombre"  class="ancho"/>
    </label>
  </p>
  <p>
    <label>* Apellidos:
      <input type="text" name="apellido" id="apellido" class="ancho" />
    </label>
  </p>
     <p>
    <label>* M&oacute;vil:
      <input type="text" name="movil" id="movil" class="ancho" />
    </label>
  </p>
  <p>
    <label>* Celular/tel&eacute;fono:
      <input type="text" name="telefono" id="telefono" class="ancho"/>
    </label>
  </p>
  <p>
    <label>* Direccion:
      <input type="text" name="direccion" id="direccion" class="ancho" />
    </label>
  </p>
   <p>
    <label>* Placa:
      <input type="text" name="placa" id="placa" class="ancho" />
    </label>
  </p>
   <p>
    <label>* # Licencia :
      <input type="text" name="licencia" id="licencia" class="ancho" />
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